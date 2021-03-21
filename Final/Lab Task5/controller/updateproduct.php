<?php  
require_once '../model/model.php';


if (isset($_POST['updateproduct'])) {
	$data['name'] = $_POST['name'];
	$data['buyingprice'] = $_POST['buyingprice'];
	$data['sellingprice'] = $_POST['sellingprice'];
	// $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);;

  if (updateproduct($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../showproduct.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>