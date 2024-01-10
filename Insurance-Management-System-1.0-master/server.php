<?php
session_start();
?>
<!--=======User Policy Registration=======-->
<?php
require 'connect.php';


?>
<!--=======End User Policy Registration=======-->
<!--=======User Sign Up/ Registration=========-->
<?php
// REGISTER USER
$uname='';
$umail='';
$pass1='';
$pass2='';
$errors=array();

if (isset($_POST['usubmit'])) {
// receive all input values from the form
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$umail = mysqli_real_escape_string($conn, $_POST['umail']);
$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($uname)) { array_push($errors, "Username is required"); }
if (empty($umail)) { array_push($errors, "Email is required"); }
if (empty($pass1)) { array_push($errors, "Password is required"); }
if ($pass1 != $pass2) {
array_push($errors, "The two passwords do not match");
};
// first check the database to make sure
// a user does not already exist with the same username and/or email
$sql = "SELECT * FROM users WHERE username='$uname' OR email='$umail' LIMIT 1";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
if ($user) { // if user exists
if ($user['email'] === $umail) {
array_push($errors, "Email already exists");
}
};
if ($user) { // if user exists
  if ($user['username'] === $uname) {
  array_push($errors, "Username already exists");
  }
  };
// Finally, register user if there are no errors in the form
if (count($errors) == 0) {

$query = "INSERT INTO users (username, email, password)
VALUES('$uname', '$umail', '$pass1')";
$retval=mysqli_query($conn, $query);
  if(!$retval){
    die ('error'. mysqli_error($conn));
  }
  $_SESSION['uname'] = $uname;
  	$_SESSION['success'] = "You are now logged in";  
header('location: index.php');
}
}
?>
<!--======End User Sign Up/ Registration======-->
