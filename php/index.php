<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
<?php
include "css/styles.css";
?>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
<meta name="viewport" content="wisdth=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kunjapur Internal</title>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
</head>
<header>
<a href="https://www.kunjapurlab.org/">
    <img alt="logo" src="https://www.kunjapurlab.org/uploads/4/6/1/0/4610982/first-draft-logo.png">
</a>
</header>
<body>
<div class="form">
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<p>This is a secured area.</p>
<div>    
    <style scoped>
        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
        }
	.button-tertiary {
	    background: rgb(255, 255, 34); /* no idea what color this is */
	}
	.button-quad {
	    background: rgb(255, 100, 255); /*no idea what color this is */
	}
    </style>
<h3>Navigate to Kunjapur internal lab resources.</h3>
<p><a class="button-success pure-button" href="strains_dash.php">Strains Database</a></p>
<p><a class="button-secondary pure-button" href="#">Chemical Inventory</a></p>
<p><a class="button-warning pure-button" href="#">Lab Protocols</a></p>
<p><a class="button-tertiary pure-button" href="#">Manuscript Guidance</a></p>
<p><a class="button-quad pure-button" href="#">Administrative User Management</a></p>
<a class="button-error pure-button" href="logout.php">Logout</a>
</div>
</div>
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
