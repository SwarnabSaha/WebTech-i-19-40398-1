<html>
<body>
<?php include 'loggedin.php';?>
<h1>Welcome <?php echo $_POST["username"]; ?></h1><br>
<?php 
     echo '
     <a href="Information.php" class="active">View Profile</a><br>
     <a href="Login.php" class="active">Edit Profile</a><br>
     <a href="Profile picture.php" class="active">Change Profile Picture</a><br>
     <a href="Change psw.php" class="active">Change Password</a><br>
     <a href="Login.php" class="active">Log Out</a><br>';
     

?>

<?php include 'foot.php';?>
</body>
</html>