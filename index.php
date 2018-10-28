<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Online Retail Pro</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="product.php">Products</a></li>
        <li><a href="index.php?logout='1'">Log Out</a></li>
      </ul>
    </div>
  </nav>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p font-family: 'Quicksand', sans-serif;>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>

    <!-- Buyed prodeuct details -->
    <?php  if (isset($_SESSION['p_id'])) : ?>
    	<p font-family: 'Quicksand', sans-serif;>The product with id <strong><?php echo $_SESSION['p_id']; ?> is buyed by you.</strong></p>
    <?php endif ?>
</div>

</body>
</html>
