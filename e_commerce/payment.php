<?php
$conn = new mysqli("localhost", "root", "", "e_commerce");
if($conn->connect_errno){
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
$requestType = $_SERVER['REQUEST_METHOD'];
if ($requestType == 'POST'){
  $Name = $_POST['Name'];
  $C_Email=$_POST['C_Email'];
  $Address = $_POST['Address'];
  $Card_Name = $_POST['Card_Name'];
  $Card_No = $_POST['Card_No'];
  $Exp_Date = $_POST['Exp_Date'];
  $CVV = $_POST['CVV'];
  $Phone = $_POST['Phone'];
  $query =  "INSERT INTO orders(Name,C_Email,Address,Card_Name,Card_No,Exp_Date,CVV,Phone) VALUES('" . $Name . "', '" . $C_Email . "', '" . $Address . "', '" . $Card_Name . "','" . $Card_No . "','" . $Exp_Date . "','" . $CVV . "','" . $Phone . "')";
  $res = $conn->query($query);
  $Card_Noo = mysqli_real_escape_string($conn,$_POST['Card_No']);
                $CVVv = mysqli_real_escape_string($conn,$_POST['CVV']);
          
                $sql = "SELECT * FROM card WHERE Card_No = '$Card_Noo' and CVV = '$CVVv'";
                $result = mysqli_query($conn,$sql);
                $sqll = mysqli_fetch_array($result,MYSQLI_ASSOC);
                if ($sqll && $res) {
                  header("location: thankyou.php");
              }
              else{
                  ?>
                  <script>
                      alert("Payment Failed");
                  </script>
          <?php
              }
          }
?>
<html>
<head>
<title>Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 225%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=email] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>


<h2>Checkout Form</h2>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="Name" placeholder="Full Name" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="C_Email" placeholder="example@gmail.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="Address" placeholder="Address" required>
            <label for="ad"><i class="fa fa-phone"></i> Phone Number</label>
            <input type="number" id="ad" name="Phone" placeholder="Phone Number" required>
          
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-credit-card" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-paypal" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="Card_Name" placeholder="Name on Card" required>
            <label for="ccnum">Credit card number</label>
            <input type="number" id="ccnum" name="Card_No" placeholder="Credit card number" required>
            <div class="row">
            <div class="col-50">
            <label for="expmonth">Exp Date</label>
            <input type="text" id="expmonth" name="Exp_Date" placeholder="Exp Date" required>
            </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="number" id="cvv" name="CVV" placeholder="CVV" required>
              </div>
              
            </div>
          </div>
          
        </div>
       
        <input type="submit" value="Continue to checkout" class="btn btn-success">
        
      </form>
    </div>
  </div>
</div>
<button class="btn btn-success" style="width: 150px; position:fixed; top: 10px; right:20px" onclick="window.location.href='cart.php'">Back To Cart</button>
</body>
</html>
