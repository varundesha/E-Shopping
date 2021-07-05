<?php
$conn = new mysqli("localhost", "root", "", "e_commerce");
if($conn->connect_errno){
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
$requestType = $_SERVER['REQUEST_METHOD'];
if ($requestType == 'POST'){
  $F_Name = $_POST['F_Name'];
  $L_Name = $_POST['L_Name'];
  $C_Email=$_POST['C_Email'];
  $C_Password = $_POST['C_Password'];
  $C_Phone = $_POST['C_Phone'];
  $query =  "INSERT INTO customer VALUES('" . $F_Name . "', '" . $L_Name . "', '" . $C_Email . "', '" . $C_Password . "', '" . $C_Phone . "')";
  $res = $conn->query($query);
  if ($res) {
header("location: Login.php");
?>
<?php
    }
    else{
        ?>
        <script>
            alert("Error Occurred While Creating Account");
        </script>
        <?php
            }
          }
 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign UP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="firstmaster.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  </head>
  <body class="ek">
    <center>
      <a id="center" href="first.php"><img src="logo.svg" width="260" height="170"></a>
      <div class="only1">
        <br><br>
        <h3>Welcome to Gadget Hub!</h3>
        <form method="POST" class="signup" action="">
          <label for="F_Name">First Name:</label><br>
          <input id="button1"  type="text" name="F_Name" placeholder="First Name" required><br>
          <label for="L_Name">Last Name:</label><br>
          <input id="button1" type="text" name="L_Name" placeholder="Last Name" required><br>
          <label id="email1" for="C_Email">Email id:</label><br>
          <input id="button1" type="email" name="C_Email" placeholder="Email@id.com"required><br>
          <label id="pas" for="password">Password:</label><br>
          <input id="button1" type="password" name="C_Password" placeholder="Password" required><br>
          <label id="mob" for="mobile">Mobile Number:</label><br>
          <input id="button1" type="text" name="C_Phone" placeholder="Mobile Number" required><br><br>
          <div class="sub1">
            <input id="submit1" type="submit" name="" value="Signup"><br>
          </div>
          <p></p>
          <p id="sign">Already have an account?<a id="p" href="Login.php">Click here</a></p>
        </form>
      </div>
      </center>
</body>
</html>

