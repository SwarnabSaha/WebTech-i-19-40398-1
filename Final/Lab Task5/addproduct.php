<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/createproduct.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="buyingprice">Buying Price:</label><br>
  <input type="number" id="buyingprice" name="buyingprice"><br>
  <label for="sellingprice">Selling Price:</label><br>
  <input type="number" id="sellingprice" name="sellingprice"><br>
  <input type="checkbox" name="display" value="Display">
  <label for="display">Display</label><br><br>
  <input type="submit" name = "createproduct" value="Save">
</form> 

</body>
</html>

