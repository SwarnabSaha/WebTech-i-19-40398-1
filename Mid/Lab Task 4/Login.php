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
$usernameErr = $passwordErr="";
$username = $password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//UserName
  if (empty($_POST["username"])) {
    $usernameErr = "*UserName is required";
  } else {
         $username = test_input($_POST["username"]);
         if (!preg_match("/[a-zA-Z.-_]/",$username)){
         $usernameErr = "*Only letters,period,dash & underscore allowed";
         $username="";
     }
         elseif (strlen($username) < 2) {
         $usernameErr= "*Must contain two characters";
         $username="";
     }
         else {
         $username = test_input($_POST["username"]);
     }
}

if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
  } else {
    $password = test_input($_POST["password"]);
    if(strlen($password)<8){
    $passwordErr = "*Must not be less than eight (8) characters";
    $password = "";
  }
  
   else if (!preg_match("/[@, #, $,  %]/",$password)) {
      $passwordErr ="*Password must contain at least one of the special characters (@, #, $,  %)";
      $password = "";
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

<h2>Login</h2>
<form action="Dashboard.php" method="post">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  User Name: <input type="text" name="username">
  <span class="error"> <?php echo $usernameErr;?></span>
  <br><br>
  Password : <input type="text" name="password">
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>
<input type="checkbox" name="remember"> Remember me
<br><br>
<input type="submit" name="submit" value="Submit"> 
<a href ="forget password.php">Forget Password? </a>
  </form>


  <?php include 'foot.php';?>
</body>
</html>