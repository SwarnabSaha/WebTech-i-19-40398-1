<?php  
require_once '../model/model.php';


if (isset($_POST['create'])) {
	$data['name'] = $_POST['name'];
	$data['address'] = $_POST['address'];
	$data['phonenum'] = $_POST['phonenum'];
	$data['dob'] = $_POST['dob'];
	$data['gender'] = $_POST['gender'];
    $data['pass'] = $_POST['pass'];

  if (addreciptionist($data)) {
  	echo 'Successfully added!!';
  }
  else if (addlab($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>