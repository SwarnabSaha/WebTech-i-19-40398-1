<?php  
require_once 'controller/productinfo.php';

$products = fetchAllproducts();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>BuyingPrice</th>
			<th>SellingPrice</th>
			<th>Profit</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $i => $product): ?>
			<tr>
				<td><a href="showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Name'] ?></a></td>
				<td><?php echo $product['BuyingPrice'] ?></td>
				<td><?php echo $product['SellingPrice'] ?></td>
				<td><?php echo $product['SellingPrice']-$product['BuyingPrice'] ?></td>
				<td><a href="editproduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="controller/deleteproduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>