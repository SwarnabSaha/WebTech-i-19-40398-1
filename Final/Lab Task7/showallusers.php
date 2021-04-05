<?php  
require_once 'controller/userinfo.php';

$users = fetchAllusers();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="css/style.css">
	<style>
		.info{

			margin-left: 300px;
			margin-right: 300px;
		}
		table {
			margin-left: 140px;
            border-collapse: collapse;
            width: 100%;
            font-size: 20px;
}
		th, td{
            text-align: center;
            padding: 8px;
		}
		tr:nth-child(even) {background-color: silver;}
		th {
  background-color: black;
  color: white;
}
h1{
margin-left: 320px;
font-weight: bold;
font-size: 50px; 
text-align: center;
}
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 60px;
  bottom: 0px;
  height: inherit;
}
    </style>


</head>
<body>

<div><?php include 'controller/Head.php';?></div>

<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>
  <h2 class="w3-bar-item"><b>Dashboard</b></h2>
  <a class="w3-bar-item w3-button w3-hover-black" href="addreciptionist.php">Add Reciptionist</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="addlab.php">Add Lab</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="showallusers.php">Show All Reciptionist & Lab</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="userlogin.php">Logout</a>
  <div style="margin-top: 335px;"><?php include 'controller/footer.php';?></div><hr>
</nav>

<?php 
session_start();

if (empty($_SESSION['username'])) {
    header("location:userlogin.php");
    
}

else{
    echo "<div style='float: right';>"." Logged in as ".$_SESSION['username']." | ";
    echo "<a href='Dashboard.php'>Dashboard</a> | " ;
    echo "<a href='UserLogin.php'>Logout</a>" ;
    echo "</div><br><hr>";
   
}

 ?>
 
    <form class="info" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
      <h1>All User Information</h1><br>
<table>
	<thead>
		<tr>

		<th>Name</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>Date of Birth</th>
		<th>Password</th>
		<th>Gender</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $i => $user): ?>
			<tr>
				<td><a href="showuser.php?id=<?php echo $user['ID'] ?>"><?php echo $user['Name'] ?></a></td>
				<td><?php echo $user['Address'] ?></td>
		<td><?php echo $user['PhoneNumber'] ?></td>
		<td><?php echo $user['Birthday'] ?></td>
		<td><?php echo $user['Password'] ?></td>
		<td><?php echo $user['Gender'] ?></td>
<td><a href="editproduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="controller/deleteproduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
				
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</form>

</body>
</html>