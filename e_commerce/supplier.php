<?php
          $conn = new mysqli("localhost", "root", "", "e_commerce");
          if ($conn->connect_errno) {
          echo "Failed to connect to MySQL: " . $conn->connect_error;
          exit();
          }
          $query = "SELECT * FROM supplier";
          $query_run = mysqli_query($conn,$query);?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="supp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Supplier Info</title>
</head>
<body class="background">
<center>
<div class="back">
<img src="logo.svg" width="300" height="150" alt="" loading="lazy">
</div>
<div class="container">
<br><br><br><br>
<div class="bod">
  <?php while ($row = mysqli_fetch_assoc($query_run)) {?>
    <?php echo"
<p><b>Name:</b> ".$row['S_Name']." </p>
 <p><b>Phone Number:</b> ".$row['S_Phone']."</p>
 <p><b>Address:</b> ".$row['S_Address']."</p>";}?>
 </div>
</div>
</center>
<br><br><br><br><br>
<a href="cart.php"><input class="btn btn-success" type="button" value="BACK TO CART"></a>
</body>
</html>