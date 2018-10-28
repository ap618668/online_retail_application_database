<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
    <div class="input-group">
      <label>First name</label>
      <input type="text" name="fname" value="">
    </div>
    <div class="input-group">
      <label>Last Name</label>
      <input type="text" name="lname" value="">
    </div>
    <div class="input-group">
      <label>Address</label>
      <input type="text" name="address">
    </div>
    <div class="input-group">
      <h2>Enter Your card details: </h2>
    </div>
    <div class="input-group">
  	  <label>Card No</label>
  	  <input type="text" name="cardno">
  	</div>
  	<div class="input-group">
  	  <label>Bank Name</label>
  	  <input type="text" name="bankname">
  	</div>
  	<div class="input-group">
  	  <label>CVV</label>
  	  <input type="text" name="number">
  	</div>
  	<div class="input-group">
  	  <label>VTD</label>
  	  <input type="text" name="date">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
