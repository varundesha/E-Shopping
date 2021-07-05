<html>
	<head>
  <link rel="stylesheet" href="firstmaster.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Gadget Hub</title>
  </head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#121212">
   <a class="navbar-brand" href="first.php">
     <img src="logo.svg" width="160" height="40" alt="" loading="lazy">
   </a>
   <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <form action="phpSearchno.php" method="post" class="form-inline my-2 my-lg-0">
      <input id="search" name='search' class="form-control mr-sm-2" type="search" placeholder="Search for product, brands and more" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0 btn btn-outline-info" type="submit">Search</button>
    </form>
   </div>
    <ul class="nav justify-content-end navbar-nav mr-auto">
    <li type="button" class="nav-item active">
      <a class="nav-link" href="Login.php">Login<span class="sr-only">(current)</span></a>
     <li type="button" class="nav-item active">
      <a  class="nav-link">Cart<span class="sr-only">(current)</span></a>
    </ul>
  </nav>

	
	<div class="container">
	<table class="table">
	
<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "e_commerce";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from category where Ca_Name like '%$search%' or Ca_Details like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){?>
  <h1 class="h1 text-center display-4 mt-5">PRODUCT DETAILS</h1>
<?php while($row = $result->fetch_assoc() ){?>
	<tr>
              <td><?php echo"<a href='$row[Image]'> <img src='".$row['Image']."' height='130' width='180'></a>";?></td>
                <td>
                 <p name="Ca_Name"><b>Type:</b><?php echo" ".$row['Ca_Name']."";?></p>
                 <p><b>Details:</b><?php echo" ".$row['Ca_Details']."";?></p>
                 <p name="Ca_Price"><b>Price:</b><?php echo" ₹".$row['Ca_Price']."</p>";?></td>
                 <td><button class="btn btn-warning" disabled>Buy Now</button>
                  <p><small>Login to Buy</small></p></td>
    </tr><?php
}
} else {?><center>
<br>
<img src="sorry.jpeg">
<br><br>
  <?php echo nl2br("<h2>Sorry, no results found!</h2>\n <h4>Please check the spelling or Try searching for something else
   </h4>");?></center>
<?php }
	


$conn->close();

?>
</table>
</div>
</body>

</html>