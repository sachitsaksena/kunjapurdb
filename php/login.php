<?php include 
"../inc/dbinfo.inc";
session_start();
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
$database = mysqli_select_db($conn, 'Users');
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
   // removes backslashes
   $username = stripslashes($_REQUEST['username']);
   //escapes special characters in a string
   $username = mysqli_real_escape_string($conn,$username);
   $password = stripslashes($_REQUEST['password']);
   $password = mysqli_real_escape_string($conn,$password);
   //Checking is user existing in the database or not
   $query = "SELECT * FROM `kunjapurdb`.`Users` WHERE username='$username'
             and password='".md5($password)."'";
   $result = mysqli_query($conn,$query) or die(mysql_error());
   $rows = mysqli_num_rows($result);
   if($rows==1){
     header("Location: http://ec2-18-216-56-88.us-east-2.compute.amazonaws.com/index.php");
     $_SESSION['username'] = $username;
     // Redirect user to index.php
   }else{
     echo "<div class='form'>
           <h3>Username/password is incorrect.</h3>
           <br/>Click here to <a href='login.php'>Login</a></div>";
   }
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
<?php
include 'css/styles.css';
?>
</style>
<title>Login</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<header>
<a href="https://www.kunjapurlab.org/">
    <img alt="logo" src="https://www.kunjapurlab.org/uploads/4/6/1/0/4610982/first-draft-logo.png">
</a>
</header>
<body>
<h1 style="text-align:center">Kunjapur Internal Site</h1>
<div class="form">
<form class="pure-form pure-form-stacked"  action="" method="post" name="login">
  <fieldset>
  <legend>Login to Kunjapur Internal</legend>	
  <label for="username">Username</label>
  <input type="text" name="username" placeholder="Username" required />
  <span class="pure-form-message">This is a required field.</span>
    
  <label for="password">Password</label>
  <input type="password" name="password" placeholder="Password" required />
  <span class="pure-form-message">This is a required field</span>
  <button class="pure-button pure-button-primary" name="submit" type="submit" value="Login">Login</button>
  </fieldset>
</form>
</div>
<p style="text-align:center">Not registered yet? <a href='registration.php'>Register Here</a></p>
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
mysqli_free_result($result);
mysqli_close($connection);
?>
