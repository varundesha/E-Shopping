<?php
$conn = new mysqli("localhost", "root", "", "e_commerce");
if ($conn->connect_errno) {
echo "Failed to connect to MySQL: " . $conn->connect_error;
exit();
}
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel='stylesheet' href='style.css' type='text/css' media='all' />
</head>
<body>
<a href="addcart.php"><input style="width: 120px; position:fixed; top: 20px; left:20px;"  class="btn btn-success" type="submit"  value="BACK HOME"></a>
  <a href="supplier.php"><input style="width: 125px; position:fixed; top: 20px; right:20px;" class="btn btn-success" type="submit"  value="SUPPLIER INFO"></a>
<div class="container">
<h1 class="h1 text-center display-4 mt-5">CART ITEMS</h1> 
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	

<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["Image"]; ?>' width="180" height="130" /></td>
<td><?php echo $product["Ca_Details"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "₹".$product["Ca_Price"]; ?></td>
<td><?php echo "₹".$product["Ca_Price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["Ca_Price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="10" align="right">
<strong>TOTAL: <?php echo "₹".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<a href="payment.php"><input style="width: 400px;height:35px; position:fixed; right:580px;"  class="btn btn-success" type="submit" value="PAYMENT"></a>

<br /><br />
</div>
</body>
</html>
