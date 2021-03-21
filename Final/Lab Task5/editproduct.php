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

 <form action="controller/updateproduct.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $product['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="buyingprice">BuyingPrice:</label><br>
  <input value="<?php echo $product['BuyingPrice'] ?>" type="number" id="buyingprice" name="buyingprice"><br>
  <label for="sellingprice">SellingPrice:</label><br>
  <input value="<?php echo $product['SellingPrice'] ?>" type="number" id="sellingprice" name="sellingprice"><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
<input type="checkbox" name="display" value="Display">
  <label for="display">Display</label><br><br>
  <input type="submit" name = "updateproduct" value="Save">
</form> 

</body>
</html>

