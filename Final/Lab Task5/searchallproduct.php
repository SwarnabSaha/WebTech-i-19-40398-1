
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Product_id</th>
			<th>Product_name</th>
			<th>Product_BuyingPrice</th>
			<th>Product_SellingPrice</th>
			<th>Product_Profit</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedProducts as $i => $product): ?>
			<tr>
				<td><a href="../showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['ID'] ?></a></td>
				<td><?php echo $product['Name'] ?></td>
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