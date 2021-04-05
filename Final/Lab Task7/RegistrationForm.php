<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="css/style2.css">
    <style>
        .error {
    color: #FF0000;
    font-size: 14px;  }
    body{
    background-image: url(sources/bg.jpg);
    background-repeat: no-repeat;
    background-size: 1600px 790px;
      }
      b{
       color: white;
       font-size: 18px;

      }
    </style>
</head>

<body>
 <div><?php include 'controller/Head.php';?></div>

    <?php
$flag=1;
$nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
$username = $password = "";
$userNameErr = $passErr = $confirmpassErr = $confirmpass = "";
$message = '';  
$error = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
    $flag=0;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "*Only letters white space, period & dash allowed";
      $name ="";
      $flag=0;
    }
    else if (str_word_count($name)<2) {
      $nameErr = "*At least two words needed";
      $name ="";
      $flag=0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Invalid email format";
      $email ="";
      $flag=0;
    }
  }

  if (empty($_POST["birthday"])) {
    $dobErr = "*Date of birth is required";
    $flag=0;
  } else {
    $dob = test_input($_POST["birthday"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "*Select gender";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["username"])) {
    $userNameErr = "*Username is required";
    $flag=0;
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "*Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
      $flag=0;
    }
    else if (strlen($username)<2) {
      $userNameErr = "*At least two charecters needed";
      $username ="";
      $flag=0;
    }
  }
  
  if (empty($_POST["Password"])) {
    $passErr = "*Password is required";
    $flag=0;
  } else {
    $password = test_input($_POST["Password"]);
    if (strlen($password)<8) {
      $passErr = "*Password must be 8 charecters";
      $password ="";
      $flag=0;
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) {
      $passErr = "*Password must contain at least one of the special characters (@, #, $,%)";
      $password ="";
      $flag=0;
    }
  }
  if (empty($_POST["confirmpass"])) {
    $confirmpassErr = "*Retype The Current Password";
    $flag=0;
  } else {
    $confirmpass = test_input($_POST["confirmpass"]);
    if (!strcmp($password, $confirmpass)==1) {
      $confirmpassErr = "*Password & Retyped Password Must be Same!";
      $confirmpass ="";
      $flag=0;
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
    
    <div class="form">
    <form action="controller/registration.php" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <h2>REGISTRATION</h2><hr><br>
            
            <a>Name:</a> <input type="text" name="name" placeholder="Enter Your Name">
            <span class="error"> <?php echo $nameErr;?></span>
          <br><br>
            <a>E-mail:</a> <input type="text" name="email" placeholder="Enter your Email">
            <span class="error"> <?php echo $emailErr;?></span>
            <br><br>
            
            <a>User Name:</a> <input type="text" name="username" placeholder="Enter Your Username">
            <span class="error"> <?php echo $userNameErr;?></span>
            <br><br>
            
            <a>Password:</a> <input type="Password" name="Password" placeholder="Enter Your Password">
            <span class="error"> <?php echo $passErr;?></span>
            <br><br>
            
            <a>Confirm Password:</a> <input type="Password" name="confirmpass" placeholder="Retype Your Password">
            <span class="error"> <?php echo $confirmpassErr;?></span>
            <br><br>
            
            
                <a>Gender:</a>
                <b>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Other
                <span class="error"> <?php echo $genderErr;?></span></b>
                <br><br>
            
            
                <a>Date Of Birth:</a>
                <input type="date" name="birthday">
                <span class="error"> <?php echo $dobErr;?></span>
                <br><br>
            
            <br>
            <hr>
            
            <input type="submit" name="registration" value="Submit"> <input type="reset" value="Reset">
       
    </form>
    </div>
  
    <?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
</div>
</body>

</html>