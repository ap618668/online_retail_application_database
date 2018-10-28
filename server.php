<?php
session_start();


// initializing variables for card
$cardno = "";
$bankname = "";
$number = "";
$date = "";

// initializing variables for customer

$username = "";
$email    = "";
$errors = array();
$address = "";
$fname = "";
$lname = "";
$x = rand();
$choice = "";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'shopping');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $fname = mysqli_real_escape_string($db,$_POST['fname']);
  $lname = mysqli_real_escape_string($db,$_POST['lname']);
  $address = mysqli_real_escape_string($db,$_POST['address']);


  // receive all input values from the form for card_details
  $cardno = mysqli_real_escape_string($db, $_POST['cardno']);
  $bankname = mysqli_real_escape_string($db, $_POST['bankname']);
  $number = mysqli_real_escape_string($db,$_POST['number']);
  $date = mysqli_real_escape_string($db,$_POST['date']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($cardno)) { array_push($errors, "cardno is required"); }
  if (empty($bankname)) { array_push($errors, "Bankname is required"); }
  if (empty($number)) { array_push($errors, "CVV is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }


  // first check the database to make sure
  // a user does not already exist with the same username and/or email

  $customer_check_query = "SELECT * FROM customer WHERE uname='$username' OR email_id='$email' LIMIT 1";
  $result = mysqli_query($db, $customer_check_query);
  $customer = mysqli_fetch_assoc($result);

  if ($customer) { // if user exists
    if ($customer['uname'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($customer['email_id'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  $card_details_check_query = "SELECT * FROM card_details WHERE card_no='$cardno'";
  $result1 = mysqli_query($db, $card_details_check_query);
  $card_details = mysqli_fetch_assoc($result1);

  if ($card_details) { // if user exists
    if ($card_details['card_no'] === $cardno) {
      array_push($errors, "Card NO. already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO customer (c_id,uname, email_id, password,e_name,l_name,address)
  			  VALUES('$x','$username', '$email','$password','$fname','$lname', '$address')";
  	mysqli_query($db, $query);
  //	$_SESSION['username'] = $username;
  //	$_SESSION['success'] = "You are now logged in";
  //	header('location: index.php');
    $query1 = "INSERT INTO card_details (card_no,bank_name,CVV,VTD,c_id)
          VALUES('$cardno','$bankname', '$number','$date','$x')";
    mysqli_query($db, $query1);
    $_SESSION['card_no'] = $cardno;
    $_SESSION['success'] = "Your Card and personal details are updated";
    header('location: index.php');
  }
}

// ...


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = $password;
  	$query = "SELECT * FROM customer WHERE uname='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//...
$uname = "";
if (isset($_POST['image'])) {
  $choice = mysqli_real_escape_string($db, $_POST['choice']);
  $uname = mysqli_real_escape_string($db, $_POST['uname']);

  if (empty($choice)) { array_push($errors, "choice is required"); }
  if (empty($uname)) { array_push($errors, "choice is required"); }

  $product_check_query = "SELECT * FROM product WHERE p_id='$choice'";
  $result2 = mysqli_query($db, $product_check_query);
  $product = mysqli_fetch_assoc($result2);

  if ($product) { // if user exists
    if ($product['p_id'] === $choice) {
      $_SESSION['p_id'] = $choice;
      header('location: index.php');
    }
  }
  $query3 = "INSERT INTO buys (p_id,username)
        VALUES('$choice', '$uname')";
  mysqli_query($db, $query3);

}

?>
