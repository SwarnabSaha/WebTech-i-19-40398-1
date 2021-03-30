<!DOCTYPE HTML>  
<html>
<head>
  <title></title>
<style>
  h2{  font-style: bold;
       font-size: 40px;
       text-align: center; }
  form{ padding-top: 120px;
        text-align: center;
        font-size: 20px;}
  input{
       height: 20px;
       border: 2px solid #ddd;
       border-radius: 2px;
       padding: 4px;
       background-color: #fff;
       box-shadow: inset 1px 1px 3px rgba(0,0,0,0.1);
  }
    input[type="submit"] {
    padding: 0px 20px;
    background-color: green;
    border: 2px;
    color: #fff;
    border-radius: 2px;
    margin-bottom: 4px;
}
  span{ font-size: 20px;
        text-align: center;  
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
<hr>

<form method="post" style="border: 5px;margin-left: 285px;margin-right: 285px;border-style: solid;border-color: black;padding: 1em;" enctype="multipart/form-data"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<h2>Login</h2>
  <hr>
  UserName: <input type="text" size= "30" name="username" placeholder="Enter your name" >
  <span class="error">&nbsp; &nbsp;<br><?php echo $usernameErr;?></span>
  <br><br>

  Password: &nbsp;&nbsp;<input type="password" size="30" name="password" placeholder="Enter your password" >
  <span class="error">&nbsp;&nbsp;<br> <?php echo $passwordErr;?></span>
  <br>
  <input type="checkbox"  name="save" >Remember me<br><br>
  <hr>
  <input type="submit" name="submit" value="Submit" size="30">&nbsp;<a href="RecoveryPassword.php" class="active">Forgot password?</a>  
</form>
<div><?php include 'controller/footer.php';?></div>

</div>
</body>
</html>