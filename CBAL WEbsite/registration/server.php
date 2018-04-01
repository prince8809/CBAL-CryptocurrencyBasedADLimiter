<?php
session_start();

// initializing variables
$domainname = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $domainname = mysqli_real_escape_string($db, $_POST['domainname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($domainname)) { array_push($errors, "domainname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same domainname and/or email
  $user_check_query = "SELECT * FROM users WHERE domainname='$domainname' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['domainname'] === $domainname) {
      array_push($errors, "domainname already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (domainname, email, password) 
  			  VALUES('$domainname', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['domainname'] = $domainname;
    $_SESSION['success'] = "Thank you for registering with us. We will shorty send you a confirmation mail after which you can continue to use our extension.";  
    header('location: index.php');
  }
}
  ?>
