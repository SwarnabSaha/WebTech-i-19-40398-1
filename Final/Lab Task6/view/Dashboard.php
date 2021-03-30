<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

    <div><?php include 'controller/Head.php';?></div>
<header>
<?php 
session_start();

if (empty($_SESSION['username'])) {
    header("location:userlogin.php");
    
}

else{
    echo "<div style='float: right';>"." Logged in as ".$_SESSION['username']." | ";
    echo "<a href='userlogin.php'>Logout</a>" ;
    echo "</div><br><br><hr><br>";
   
}

 ?>
</header>
<table action =" " style="width:100%; border: 2px solid black;">
  <tr style="border: 2px solid black;">
    <th style="border: 2px solid black;">

    	Dashboard<hr>
    	<div style="float: left; text-align: left;margin-left: 60px;">
    	<li> <a href="addreciptionist.php">Add Reciptionist</a></li><br><br>
    	<li><a href="addlab.php">Add Lab</a></li><br><br>
        <li><a href="showallusers.php">Show All Reciptionist & Lab</a></li><br><br>
    	<li><a href="userlogin.php">Logout</a></li><br><br>
    </div>
    </th>
    <th style="border: 1px black;"><?php if (isset($_SESSION['username'])) {
	echo "<div style= 'margin-right: 850px;font-size: 30px;'> Welcome ".$_SESSION['username']."</div>";

}

?>

</th>
  </tr> 
</table>

<div><?php include 'controller/footer.php';?></div><hr>

</body>
</html>