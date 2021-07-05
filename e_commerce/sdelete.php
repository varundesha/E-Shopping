<?php
$conn = new mysqli("localhost", "root", "", "e_commerce");
if($conn->connect_errno){
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
$requestType = $_SERVER['REQUEST_METHOD'];
if ($requestType == 'POST'){
    $query = "DELETE FROM category WHERE Ca_Id='".$_POST['Ca_Id']."' ";
    $res = $conn->query($query);
    if ($res) {
        ?>
        <script>
                    alert("Item deleted succesfully");
                </script>
        <?php
            }
            else{
                ?>
                <script>
                    alert("Unable to delete the item");
                </script>
                <?php
                    }
                }
         ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Items</title>
    <link rel="stylesheet" href="supplier.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="ek">
<a href="slogin.php"><input type="submit" value="Sign out"></a>
<a href="cusdetails.php"><input id="sub"type="submit" value="Customer Info"></a>
<center>
<a id="center1"><img src="logo.svg" width="260" height="170"></a><br>
<a href="sinput.php"><input type="submit" value="Insert Item"></a>
<a href="update.php"><input type="submit" value="Update Item"></a>
</center>
    <div class="container">
        <br>
        <h3>Enter The Product ID That Needs To Be Deleted</h3><br>
        <form method="post">
            <label for="Ca_Id">Product ID</label><br>
            <input type="text" name="Ca_Id" id="" placeholder="Product ID"><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>