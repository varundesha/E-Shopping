<?php

session_start();
$con = mysqli_connect("localhost","root","","e_commerce");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `category` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$Ca_Details = $row['Ca_Details'];
$code = $row['code'];
$Ca_Price = $row['Ca_Price'];
$Image = $row['Image'];

$cartArray = array(
	$code=>array(
	'Ca_Details'=>$Ca_Details,
	'code'=>$code,
	'Ca_Price'=>$Ca_Price,
	'quantity'=>1,
	'Image'=>$Image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>Gadget Hub</title>


<link rel='stylesheet' href='firstmaster.css' type='text/css' media='all' />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#121212">
   <a class="navbar-brand" href="addcart.php">
     <img src="logo.svg" width="160" height="40" alt="" loading="lazy">
   </a>
   <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <form action="searchaddcart.php" method="post" class="form-inline my-2 my-lg-0">
      <input id="search" name='search' class="form-control mr-sm-2" type="search" placeholder="Search for product, brands and more" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0 btn btn-outline-info" type="submit">Search</button>
    </form>
   </div>
    <ul class="nav justify-content-end navbar-nav mr-auto">

    

    <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sort By
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="addcart.php">Featured</a></li>
                  <li><a class="dropdown-item" href="lowtohigh.php">Price:Low To High</a></li>
                  <li><a class="dropdown-item" href="hightolow.php">Price:High To Low</a></li>
                  <li><a class="dropdown-item" href="newest.php">Newest Added</a></li>
                </ul>
              </li>

    <li type="button" class="nav-item active">
      <a class="nav-link" href="first.php">Sign Out<span class="sr-only">(current)</span></a>
     <li type="button" class="nav-item active">
      <a href="cart.php" class="nav-link">Cart<span class="sr-only">(current)</span></a>
    </ul>
  </nav>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <div class="container">
  <h1 class="h1 text-center display-4 mt-5">PRODUCT DETAILS</h1>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

  
  <form action="" method="POST" enctype="multipart/form-data">
  <table class="table">

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<table class="table">
<?php
}
$con = new mysqli("localhost", "root", "", "e_commerce");
          $res=mysqli_query($con,"CALL viewcat()") or die("query fail:" .mysqli_error());
          while ($row = mysqli_fetch_array($res)) {?>
  <form method="POST" action="" enctype="multipart/form-data">
 <input type="hidden" name="code" value="<?php echo"".$row['code'].""?>">
 <td><?php echo"<a href='$row[Image]'> <img src='".$row['Image']."' height='130' width='180'></a>";?></td>
 <td>
  <input type="hidden" name="Ca_Id" value="<?php echo"".$row['Ca_Id'].""; ?>" min="1" step="1" >
  <p><b>Type:</b><?php echo" ".$row['Ca_Name']."";?></p>
  <input type="hidden" name="Ca_Name" value="<?php echo"".$row['Ca_Name'].""; ?>" min="1" step="1" >
  <p><b>Details:</b><?php echo" ".$row['Ca_Details']."";?></p>
  <p><b>Price:</b><?php echo" ₹".$row['Ca_Price']."</p>";?>
  <input type="hidden" name="Ca_Price" value="<?php echo" ".$row['Ca_Price'].""; ?>"></td>
  <td><button class="btn btn-warning" name="submit">Buy Now</button></td>
  </tr>
  </form>
     </div>

     <?php        
    } 
              
      
mysqli_close($con);
?>


</div>

<br /><br />
</table>
</form>

</div>

</body>
</html>