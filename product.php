<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}

/* The grid: Four equal columns that floats next to each other */
.column {
    float: left;
    width: 25%;
    padding: 10px;
}

/* Style the images inside the grid */
.column img {
    opacity: 0.8;
    cursor: pointer;
}

.column img:hover {
    opacity: 1;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* The expanding image container */
.container {
    position: relative;
    display: none;
}

/* Expanding image text */
#imgtext {
    position: absolute;
    bottom: 15px;
    left: 15px;
    color: white;
    font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
    position: absolute;
    top: 10px;
    right: 15px;
    color: white;
    font-size: 35px;
    cursor: pointer;
}
.button {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Online Retail Pro</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="product.php">Home</a></li>
        <li><a href="index.php?logout='1'">Log Out</a></li>
      </ul>
    </div>
  </nav>

<div style="text-align:center">
  <h2>Currently we have these items to buy</h2>
  <p>Click on the images below to buy a product</p>
</div>

<!-- The four columns -->
<div class="row">
  <div class="column">
     <img src="laptop.jpg" alt="laptop">
     <button type="submit" name="img1" class="button">Product 1</button>
  </div>

  <div class="column">
    <img src="fan.jpg" alt="Snow" style="width:100%">
    <button type="submit" name="img2" class="button" onclick="myfunc(this)">Product 2</button>
  </div>
  <div class="column">
    <img src="ac.jpg" alt="Mountains" style="width:100%">
    <button type="submit" name="img3" class="button">Product 3</button>
  </div>
  <div class="column">
    <img src="fridge.jpg" alt="Lights" style="width:100%">
    <button type="submit" name="img4" class="button">Product 4</button>
  </div>
</div>
<div class="row">
  <form action="product.php" method="post">
    <div class="input-group">
      <label>Enter your choice</label>
      <input type="text" name="choice" placeholder=" 1 or 2 or 3 or 4">
    </div>
    <div class="input-group">
      <label>Your Username</label>
      <input type="text" name="uname">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="image">BUY</button>
    </div>
  </form>

</div>

</body>
</html>
