<?php  
require_once 'controller/productinfo.php';

$product = fetchproduct($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Name</th>
		<th>BuyingPrice</th>
		<th>SellingPrice</th>
	</tr>
	<tr>
		<td><a href="showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Name'] ?></a></td>
		<td><?php echo $product['BuyingPrice'] ?></td>
		<td><?php echo $product['SellingPrice'] ?></td>
		<td><a href="controller/deleteproduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
	</tr>

</table>


</body>
</html>