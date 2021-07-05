
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gadget Hub</title>
    <link rel="stylesheet" href="firstmaster.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#121212">
   <a class="navbar-brand" href="first.php">
     <img src="logo.svg" width="160" height="40" alt="" loading="lazy">
       </a>
  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <form action="phpSearchno.php" method="post" class="form-inline my-2 my-lg-0">
      <input id="search" name="search" class="form-control mr-sm-2" type="search" placeholder="Search for product, brands and more" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0 btn btn-outline-info" type="submit">Search</button>
    </form>
  </div>
  <ul class="nav justify-content-end navbar-nav mr-auto">
    <li type="button" class="nav-item active">
      <a class="nav-link" href="Login.php">Login<span class="sr-only">(current)</span></a>
    </li>
    <li type="button" class="nav-item active">
        <a class="nav-link">Cart<span class="sr-only">(current)</span></a>
    </ul>
</nav>
<h1 class="h1 text-center display-4 mt-5">PRODUCT DETAILS</h1>
   <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <table class="table">
        <?php
          $conn = new mysqli("localhost", "root", "", "e_commerce");
          if ($conn->connect_errno) {
          echo "Failed to connect to MySQL: " . $conn->connect_error;
          exit();
          }
          $query = "SELECT * FROM category";
          $query_run = mysqli_query($conn,$query);
 
          while ($row = mysqli_fetch_assoc($query_run)) {?>
            <tr>
              <td><?php echo"<a href='$row[Image]'> <img src='".$row['Image']."' height='130' width='180'></a>";?></td>
                <td><?php echo"
                 <p><b>Type:</b> ".$row['Ca_Name']." </p>
                 <p><b>Details:</b> ".$row['Ca_Details']."</p>
                 <p><b>Price:</b> ₹".$row['Ca_Price']."</p>";?></td>
                  <td><button class="btn btn-warning" disabled>Buy Now</button>
                  <p><small>Login to Buy</small></p>
                </td>
                 </tr><?php
             }
            ?>
      </table>
    </form>
   </div>
</body>
</html>
