<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<div class="menu">
<?php include 'menu.php';?>
</div>
<?php
// define variables and set to empty values
$flag=1;
$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $dobErr = $genderErr = "";
$name = $email = $username = $password = $confirmpassword = $dob = $gender = "";
$message = '';  
$error = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Name
  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
    $flag=0;
  } else {
         $name = test_input($_POST["name"]);
         if (!preg_match("/[a-zA-Z-.]/",$name)){
         $nameErr = "*Only letters,period,dash allowed";
         $flag=0;
     }
         elseif (str_word_count($name) < 2) {
         $nameErr= "*Must contain two words";
         $flag=0;
     }
         else {
         $name = test_input($_POST["name"]);
         
     }
}
//Email
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format(Example:anything@example.com)";
        $flag=0;
    }
  }
  //User Name
  if (empty($_POST["username"])) {
    $usernameErr = "*User Name is required";
    $flag=0;
  } else {
         $username = test_input($_POST["username"]);
         if (!preg_match("/[a-zA-Z-.]/",$username)){
         $usernameErr = "*Only letters,period,dash allowed";
         $flag=0;
     }
         elseif (str_word_count($username) < 2) {
         $usernameErr= "*Must contain two words";
         $flag=0;
     }
         else {
         $username = test_input($_POST["username"]);
        
     }
}
// password
  if (empty($_POST["password"])) {
    $passwordErr = "Password field is required";
    $flag=0;
  } else {
     $password = test_input($_POST["password"]);
     if(strlen($password)<8){
     $passwordErr = "Must not be less than eight (8) characters";
     $password = "";
     $flag=0;
  }
  
     elseif (!preg_match("/[@, #, $,  %]/",$password)) {
       $passwordErr ="Password must contain at least one of the  special characters (@, #, $,  %)";
       $password = "";
       $flag=0;
    }
     else {
         $password = test_input($_POST["password"]);
        
     }
    
   }
//confirm password
if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "Confirm password field is required";
    $flag=0;
  } else {
      $confirmpassword = test_input($_POST["confirmpassword"]);
      if(strlen($confirmpassword)<8){
      $confirmpasswordErr = "Must not be less than eight (8) characters";
      $confirmpassword = "";
      $flag=0;
  }
  elseif (!preg_match("/[@, #, $,  %]/",$confirmpassword)) {
      $confirmpasswordErr ="Password must contain at least one of the special characters (@, #, $,  %)";
      $confirmpassword = "";
    $flag=0;
    }

  elseif (!strcmp($confirmpassword, $password)==0) {
        $confirmpasswordErr = "Password must match with the Confirm Password!";
        $confirmpassword = "";
        $flag=0;
            }
            else {
         $confirmpassword = test_input($_POST["confirmpassword"]);
         
     }
     }
//Gender
  if (empty($_POST["gender"])) {
    $genderErr = "*Gender is required";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
    
  }
//Date of Birth
  if (empty($_POST["birthday"])) {
    $dobErr = "Date of birth is required";
    $flag=0;
  } else {
    $dob = test_input($_POST["birthday"]);
  }

 if ($flag==1) {
  if(isset($_POST["submit"]))  
    {
  if(file_exists('Information.json'))
    {
      $current_data = file_get_contents('Information.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'name'           =>     $_POST['name'],
                 'email'          =>     $_POST["email"],
                 'username'       =>     $_POST["username"],
                 'password'       =>     $_POST["confirmpassword"],  
                 'gender'         =>     $_POST["gender"],  
                 'dateOfBirth'    =>     $_POST["birthday"]   
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('Information.json', $final_data))  
            {  
                 $message = "Data Recorded Successfully";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';  
        }  
    }
 }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Registration</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  Name: <input type="text" name="name">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>

  User Name: <input type="text" name="username">
  <span class="error"> <?php echo $usernameErr;?></span>
  <br><br>

  Password : 
  <input type="text" size= "30" name="password" placeholder="Enter your password" >
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>

  Confirm Password : 
  <input type="text" size= "30" name="confirmpassword" placeholder="Confirm your password" >
  <span class="error"> <?php echo $confirmpasswordErr;?></span>
  <br><br>

  Gender:
  <input type="radio" name="gender" value="Male">Male
  <input type="radio" name="gender" value="Female">Female
  <input type="radio" name="gender" value="Other">Other
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>

  Date of Birth: 
  <input type="date" name="birthday">
  <span class="error">* <?php echo $dobErr;?></span>

  <br><br>

  <input type="submit" name="submit" value="Submit">  
  <input type="reset" name="reset" value="Reset">  
  </form>

<?php include 'foot.php';?>
</body>
</html>