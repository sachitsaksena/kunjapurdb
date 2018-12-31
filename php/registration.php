<?php include "../inc/dbinfo.inc"; ?>
<?php include "/helpers.php"; ?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php
include 'css/styles.css';
?>
</style>
<title>Registration</title>
</head>
<header>
<a href="https://www.kunjapurlab.org/">
    <img alt="logo" src="https://www.kunjapurlab.org/uploads/4/6/1/0/4610982/first-draft-logo.png">
</a>
</header>
<body>
<div class="form">
<h1>Registration</h1>
<p>Already have an account? <a href="login.php">Log In</a></p>
<form class="pure-form" name="registration" action="" method="post">
    <input type="text" name="username" placeholder="Username" required />
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <br>
    <br>
    <button class="pure-button pure-button-primary"  type="submit" name="submit" value="Register">Register</button>
</form>
</div>
<?php

/* Connect to database.*/
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

/* Check connection was made */
if(mysqli_connect_errno()){
 echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
}
$database = mysqli_select_db($conn, DB_DATABASE);
if(!$database) echo "<p>Unable to connect to  kunjapur database for registration.</p>";
if(!TableExists("Users", $conn, DB_DATABASE)){
   echo "<p>Users table does not exist.</p>";
}
// If form submitted, insert values into the database.
if(isset($_POST['submit'])){
   // removes backslashes
   $username = stripslashes($_REQUEST['username']);
   //escapes special characters in a string
   $username = mysqli_real_escape_string($conn,$username); 
   $email = stripslashes($_REQUEST['email']);
   $email = mysqli_real_escape_string($conn,$email);
   $password = stripslashes($_REQUEST['password']);
   $password = mysqli_real_escape_string($conn,$password);
   $trn_date = date("Y-m-d H:i:s");
   $trn_date = mysqli_real_escape_string($conn, $trn_date);
   $query = "INSERT into `kunjapurdb`.`Users` (`username`, `email`, `password`, `reg_date`) VALUES ('$username', '$email', '".md5($password)."', '$trn_date');";
   $result = mysqli_query($conn, $query);
   if($result){
        echo "<div class='form'>
              <h3>You are registered successfully.</h3>
              <br/>Click here to <a href='login.php'>Login</a></div>";
   }else{
        echo("<p>Error registering new user. Please try again later.</p>");
    }
    }
  mysqli_close($conn);
?>
</body>
<footer class="ct-footer">
    <div class="ct-footer-meta text-center-sm">
        <div class="col-sm-6 col-md-3">
          <address>
            <span>Kunjapur Lab<br></span>Chemical & Biomolecular Engineering<br>
            University of Delaware<br>150 Academy Street, CLB 358/362<br>Newark, DE 19716</span>
            <span>Phone: <a href="tel:5555555555">(555) 555-8899</a></span>
          </address>
        </div>
    <div class="ct-footer-meta text-right-sm">
        <div class="col-sm-12 col-md-3">
          <ul class="ct-socials list-unstyled list-inline">
            <li>
              <a href="" target="_blank"><img alt="facebook" src="https://www.solodev.com/assets/footer/facebook-white.png"></a>
            </li>
            <li>
              <a href="" target="_blank"><img alt="twitter" src="https://www.solodev.com/assets/footer/twitter-white.png"></a>
            </li>
            <li>
              <a href="" target="_blank"><img alt="youtube" src="https://www.solodev.com/assets/footer/youtube-white.png"></a>
            </li>
            <li>
              <a href="" target="_blank"><img alt="instagram" src="https://www.solodev.com/assets/footer/instagram-white.png"></a>
            </li>
            <li>
              <a href="" target="_blank"><img alt="pinterest" src="https://www.solodev.com/assets/footer/pinterest-white.png"></a>
            </li>
          </ul>
        </div>
       </div>
      </div>
    </div>
  </div>
</footer>
</html>
<?php
/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
