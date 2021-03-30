<?php 
session_start();

if (empty($_SESSION['username'])) {
    header("location:userlogin.php");
    
}

else{
    echo "<div style='float: right';>"." Logged in as ".$_SESSION['username']." | ";
    echo "<a href='UserLogin.php'>Logout</a>" ;
    echo "</div><br><br><hr><br>";
   
}

 ?>