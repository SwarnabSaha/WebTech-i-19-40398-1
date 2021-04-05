<!DOCTYPE HTML>  
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/style.css">
<style>
    .error {
    color: #FF0000;
    font-size: 14px;  }
    body{
    background-image: url(sources/bg.jpg);
    background-repeat: no-repeat;
    background-size: 1600px 790px;
      }
      .box{
        margin-top: 250px;
        padding: 75px;
        max-width: 400px ;
      }
</style>
</head>
<body>  
<div><?php include 'controller/Head.php';?></div>
<?php

// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "<span style='color: red;font-size: 15px'>*Username is required</span>";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "<span style='color: red;font-size: 15px'>*Only letters, white space, period & dash is allowed</span>";
      $username = "";
          }
       else if(strlen($username)<2)
          {
           $usernameErr = "<span style='color: red;font-size: 15px'>*User Name must contain at least two (2) characters </span>";
           $username = "";

          }
     }


  if (empty($_POST["password"])) {
    $passwordErr = "<span style='color: red;font-size: 15px'>*Password is required.</span>";
  } else {
    $password = test_input($_POST["password"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php 
$msg = " ";
session_start();

$uname="admin";
$pwd="1234";

if (isset($_POST['username'])) {
  if ($username==$uname && $password==$pwd) {
    $_SESSION['username'] = $uname;

    header("location:Dashboard.php");
  }
  else {
   
    $msg="username or password invalid";
    //echo "<script>alert('username or pass incorrect!')</script>";
  }

}

?>

<div class="box">
<form method="post" enctype="multipart/form-data"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<h2>Login</h2>
  <hr>
  <br>
  <a>UserName:</a> <input type="text" size= "30" name="username" placeholder="Enter your name" >
  <span class="error">&nbsp; &nbsp;<br><?php echo $usernameErr;?></span>

  <a>Password:</a> &nbsp;&nbsp;<input type="password" size="30" name="password" placeholder="Enter your password" >
  <span class="error">&nbsp;&nbsp;<br> <?php echo $passwordErr;?></span>
  <input type="checkbox"  name="save" ><a>Remember me</a><br><br>
  <hr>
  <input type="submit" name="submit" value="Submit" size="30">&nbsp;<a href="RecoveryPassword.php" class="active">Forgot password?</a>  
</form></div>
</body>
</html>