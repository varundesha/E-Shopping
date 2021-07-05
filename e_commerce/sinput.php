<?php
$conn = new mysqli("localhost", "root", "", "e_commerce");
if($conn->connect_errno){
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
$requestType = $_SERVER['REQUEST_METHOD'];
if ($requestType == 'POST'){
  $Ca_Id = $_POST['id'];
  $Ca_Name = $_POST['product'];
  $code = $_POST['code'];
  $Ca_Details= $_POST['details'];
  $Ca_Price = $_POST['price'];
  $Image = $_FILES["file"]["name"]; 
  $tempname = $_FILES["file"]["tmp_name"];     
  $folder = "Images/".$Image; 
  $query =  "INSERT INTO category VALUES('" . $Ca_Id . "', '" . $Ca_Name . "','" . $code . "', '" . $Ca_Details . "', '" . $Ca_Price . "', '".$folder. "')";
  $data=mysqli_query($conn,$query);
  if (move_uploaded_file($tempname, $folder))  { 
    $msg = "Image uploaded successfully"; 
}else{ 
    $msg = "Failed to upload image"; 
} 
  if ($data) {
    ?>
    <script>
    alert("Details Uploaded Succesfully")
    </script>
    <?php
        }
        else{
            ?>
            <script>
                alert("Error Accoured While Uploading Details");
            </script>
            <?php
                }
              }
     ?>
     
  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="supplier.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Insert Items</title>
</head>
<body class="ek">
 <a href="slogin.php"><input type="submit" value="Sign out"></a>
 <a href="cusdetails.php"><input id="sub"type="submit" value="Customer Info"></a>
<center>
<a id="center1"><img src="logo.svg" width="260" height="170"></a><br>
<a href="sdelete.php"><input type="submit" value="Delete Item"></a>
<a href="update.php"><input type="submit" value="Update Item"></a>
</center>
<div class="container">
<form action="" method="POST" enctype="multipart/form-data"><br>
<h3>Enter The Product Details</h3>
<label for="id">Product ID</label><br>
<input type="text" name="id" id="" placeholder="Product ID"><br>
<label for="product">Enter Category Name</label><br>
<input type="text" name="product" id="" placeholder="Category Name"><br>
<label for="code">Enter code</label><br>
<input type="text" name="code" id="" placeholder="code"><br>
<label for="details">Enter The Product Details</label><br>
<textarea name="details" id="" cols="100" rows="3"></textarea><br><br>
<label for="price">Enter the Price</label><br>
<input type="text" name="price" id="" placeholder="Price"><br><br>
<input type="file" value="Choose File" name="file"><br><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>
