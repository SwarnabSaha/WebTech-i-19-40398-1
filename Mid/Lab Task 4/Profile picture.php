<!DOCTYPE html>
<html>
<head>

<style>
.avatar {
  width: 10%;
  border-radius: 15%;
}
</style>
</head>
<body>
	<?php include 'loggedin.php';?>
	<h2>Profile Picture</h2>
	<img src="img_avatar.png" alt="Avatar" class="avatar">
<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>


</body>
</html>