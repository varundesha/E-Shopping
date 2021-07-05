<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'e_commerce');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $C_Email = mysqli_real_escape_string($db,$_POST['C_Email']);
      $C_Password = mysqli_real_escape_string($db,$_POST['C_Password']);

      $sql = "SELECT * FROM customer WHERE C_Email = '$C_Email' and C_Password = '$C_Password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if ($row) {
          header("location: addcart.php");
          ?>
  <?php
      }
      else{
          ?>
          <script>
              alert("Failed to Login");
          </script>
  <?php
      }
  }
  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="firstmaster.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body class="ek">
    <center>
    <div class="open">
      <a id="center" href="first.php"><img src="logo.svg" width="260" height="170"></a>
  <form method="POST">
    <br>
    <div class="only">
      <br><br>
    <h2>Welcome back!</h2><br>
    <label id="email" for="email">Email:</label><br>
    <input id="button1"type="email" name="C_Email" placeholder="Email" required><br><br>
    <label id="password" for="password">Password:</label><br>
    <input id="button2" type="password" name="C_Password" placeholder="Password" required><br><br>
    <input id="submit" type="submit" name="Submit" value="Login">
  </form>
  <p></p>
    <p>Don't have an account?<a id="p" href="Signup.php">Click here</a></p>
  </div>
    </div>
  </center>
  </body>
  </html>
