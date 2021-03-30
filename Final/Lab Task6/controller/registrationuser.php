<?php
  require_once '../model/model.php';
if ($flag==1) {
  if(isset($_POST["submit"]))  
    {
 
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['birthday'] = $_POST['birthday'];
  $data['gender'] = $_POST['gender'];
  $data['username'] = $_POST['username'];
  $data['Password'] = $_POST['Password'];
  $data['confirmpass'] = $_POST['confirmpass'];


 if (RegistrationForm($data)) {
    echo 'Successfully added!!';
  }
    }
    else {
  echo 'You are not allowed to access this page.';
}
}
?>
