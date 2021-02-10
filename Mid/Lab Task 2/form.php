<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $birthErr = $genderErr = $degreeErr = $bloodgroupErr = "";
$name = $email = $birthDate = $birthMonth = $birthYear = $gender = $bloodgroup = $degree1 = $degree2 = $degree3 = $degree4="";
$i=1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Name
  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
  } else {
         $name = test_input($_POST["name"]);
         if (!preg_match("/[a-zA-Z-.]/",$name)){
         $nameErr = "*Only letters,period,dash allowed";
     }
         elseif (str_word_count($name) < 2) {
         $nameErr= "*Must contain two words";
     }
         else {
         $name = test_input($_POST["name"]);
     }
}
//Email
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
  } else {
    $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format(Example:anything@example.com)";
    }
  }
//Date of Birth
  if (empty($_POST["birthDate"]) || empty($_POST["birthMonth"]) || empty($_POST["birthYear"])) {
      $birthErr = "*Date Month and Year is required";
  } else {
    $birthDate=test_input($_POST["birthDate"]);
    $birthMonth=test_input($_POST["birthMonth"]);
    $birthYear=test_input($_POST["birthYear"]);
    if(!is_numeric($birthDate))
    {
      $birthErr="*Please input Numeric Date";
    }
      elseif(!is_numeric($birthMonth))
      {
          $birthErr="*Please input Numeric month";
      }
        elseif(!is_numeric($birthYear))
        {
          $birthErr="*Please input Numeric Year";
        }
          elseif($birthDate>31 || $birthDate<1)
          {
              $birthErr=" *Input Date between 1 to 31";
          }
              elseif($birthMonth>12 || $birthMonth<1)
              {
                  $birthErr=" *Input Month between 1 to 12";
              }
                  elseif($birthYear>1998 || $birthYear<1953)
                  {
                    $birthErr=" *Input Year between 1953 to 1998";
                  }
              }
//Gender
  if (empty($_POST["gender"])) {
    $genderErr = "*Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
//Degree
  if(empty($_POST["SSC"]) && empty($_POST["HSC"]) && empty($_POST["BSc"]) && empty($_POST["MSc"]))
  {
    $degreeErr="*Degree is required";
  }
else {
  if(!empty($_POST["SSC"]))
  {
    $i=$i+1;
    $degree1=test_input($_POST["SSC"]);
  }
  if(!empty($_POST["HSC"]))
  {
    $i=$i+1;
      $degree2=test_input($_POST["HSC"]);
  }
  if(!empty($_POST["BSc"]))
  {
    $i=$i+1;
    $degree3=test_input($_POST["BSc"]);
  }
  if(!empty($_POST["MSc"]))
  {
    $i=$i+1;
    $degree4=test_input($_POST["MSc"]);
  }
  if($i<3)
  {
    $degreeErr="*At least two is required";
  }
}
//Blood Group
    if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "*Blood is required";
  } else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Name: <input type="text" name="name">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>

  Date of Birth: 
  <input type="text" size="1" placeholder="dd" name="birthDate" value="<?php $birthDate; ?>"> /
  <input type="text" size="1" placeholder="mm" name="birthMonth" value="<?php $birthMonth; ?>"> /
  <input type="text" size="2" placeholder="yyyy" name="birthYear" value="<?php $birthYear; ?>">
  <span class="error"> <?php echo $birthErr;?></span>
  <br><br>

  Gender:
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Other">Other
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>

  Degree:
  <input type="checkbox"  name="SSC" value="SSC">SSC
  <input type="checkbox" name="HSC" value="HSC">HSC
  <input type="checkbox" name="Bsc" value="Bsc">BSc
  <input type="checkbox" name="Msc" value="Msc">MSc
  <span class="error"> <?php echo $degreeErr;?></span>
  <br><br>

  Blood Group:
  <select id="bloodgroup" name="bloodgroup"><option value="">Select any one</option>
  <option value="O-">O-</option>
  <option value="O+">O+</option>
  <option value="A-">A-</option>
  <option value="A+">A+</option>
  <option value="B-">B-</option>
  <option value="B+">B+</option>
  <option value="AB-">AB-</option>
  <option value="AB+">AB+</option>
  </select><span class="error"> <?php echo $bloodgroupErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  
  </form>

<?php
echo "<h2>Your Input:</h2>";
echo "Name:".$name;
echo "<br>";
echo "E-mail:".$email;
echo "<br>";
echo "Date of Birth:". $birthDate."/". $birthMonth."/". $birthYear;
echo "<br>";
echo "Gender:". $gender;
echo "<br>";
echo "Degree:" . $degree1." ".$degree2." ".$degree3." ".$degree4;
echo "<br>";
echo "Blood Group:". $bloodgroup;
?>
</body>
</html>