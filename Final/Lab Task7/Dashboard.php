<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="css/style.css">
<style>
     table{
      margin-left: 250px;
      width: 83%; 
      border: 2px solid black;
     }  
     tr{
        border: 2px solid black;
     }
     th{
        border: 1px black;
     }


</style>
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
    echo "</div><br><hr>";
   
}

 ?>
 
</header>
<table>
  <tr>
        <th><?php if (isset($_SESSION['username'])) {
	echo "<div style= 'margin-left:500px; margin-right: 50px;font-size: 30px;'> Welcome ".$_SESSION['username']."</div>";

}

?>

</th>
  </tr> 
</table>
<div><?php include 'controller/dashboarddesign.php';?></div><hr>


</body>
</html>