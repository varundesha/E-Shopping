<?php
 $conn = mysqli_connect("localhost","root","","e_commerce");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
        }
        $sql="SELECT * FROM details ";
          $query_run = mysqli_query($conn,$sql);?>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Customer Details</title>
              <link rel='stylesheet' href='master.css' type='text/css' media='all' />
              <link rel="preconnect" href="https://fonts.gstatic.com">
              <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
          </head>
          <body class="ak">
              <center>
          <a id="center" href="sinput.php"><img src="logo.svg" width="260" height="170"></a>
          <div class="tb">
              <table border="2">
              <thead>
              <th>Email Id</th>
              <th>Name</th>
              <th>Phone Number</th>
              <th>Signup Date and Time</th>
              </thead>
              <tr>
              <?php
              while ($row = mysqli_fetch_assoc($query_run)) { echo"
               <td>".$row['C_Email']."</td>
                <td> ".$row['F_Name']." 
                  ".$row['L_Name']."</td>
                <td>".$row['C_Phone']."</td>
                <td>".$row['DateTimes']."
                 ";?></td>
              </tr>
              <?php } ?>
              </tabel>
              </div>
              </center>
          </body>
          </html>

