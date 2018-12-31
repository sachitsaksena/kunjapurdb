<?php 
include "../inc/dbinfo.inc";
include("auth.php"); 
?>
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
<title>Add to Strain Database</title>
</head>
<a href="https://www.kunjapurlab.org/">
    <img alt="logo" src="https://www.kunjapurlab.org/uploads/4/6/1/0/4610982/first-draft-logo.png">
</a>
</header>
<body>
<h1>Kunjapur Sequence/Strain Database</h1>
<?php 
  /* Connect to MySQL and select the database. */
  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($conn, `Strains`);
  if (isset($_POST['submit'])) {
  /* If input fields are populated, add a row to the Strains table. */
     $cellid = htmlentities($_POST['cellid']);
     $genus = htmlentities($_POST['genus']);
     $species = htmlentities($_POST['species']);
     $strain = htmlentities($_POST['strain']);
     $genotype = htmlentities($_POST['genotype']);
     $parentstrain = htmlentities($_POST['parentstrain']);
     $plasmid = htmlentities($_POST['plasmid']);
     $pgenotype = htmlentities($_POST['plasmidgenotype']);
     $copynumber = htmlentities($_POST['copynumber']);
     $antibiotic = htmlentities($_POST['antibioticresistance']);
     $construction = htmlentities($_POST['constructiondescription']);
     $contributor = htmlentities($_POST['contributor']);
     $institution = htmlentities($_POST['lab']);
     $name = $_FILES['sequence']['name'];
     $type = $_FILES['sequence']['name'];
     $data = file_get_contents($_FILES['sequence']['tmp_name']);
     /* Make MySQLi strings for each variable from the HTML form. */
     $a = mysqli_real_escape_string($conn, $cellid);
     $b = mysqli_real_escape_string($conn, $genus);
     $c = mysqli_real_escape_string($conn, $species);
     $d = mysqli_real_escape_string($conn, $strain);
     $e = mysqli_real_escape_string($conn, $genotype);
     $f = mysqli_real_escape_string($conn, $parentstrain);
     $g = mysqli_real_escape_string($conn, $plasmid);
     $h = mysqli_real_escape_string($conn, $pgenotype);
     $i = mysqli_real_escape_string($conn, $copynumber);
     $j = mysqli_real_escape_string($conn, $antibiotic);
     $k = mysqli_real_escape_string($conn, $construction);
     $l = mysqli_real_escape_string($conn, $contributed);
     $m = mysqli_real_escape_string($conn, $institution);
     /* $o = mysqli_real_escape_string($conn, $sequence); */
     $stored_by = mysqli_real_escape_string($conn, $_SESSION['username']);
     $time = date("Y-m-d H:i:s");
     $current_date = mysqli_real_escape_string($conn, $time);
     $sql_add = "INSERT INTO `kunjapurdb`.`Strains` (`cellid`, `genus`, `species`, `strain`, `genotype`, `parentstrain`, `plasmid`, `pgenotype`, `copynumber`, `antibiotic`, `construction`, `contributor`, `institution`,`storedby`, `date`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$stored_by', '$current_date');";
    $result = mysqli_query($conn, $sql_add);
    if($result){
        echo "<div class='form'>
              <h3>Record entered successfully.</h3>
              </div>";
    }else{
        echo("<h3>Error adding new record.</h3>");
    }
    }
?>
<!-- Input form -->
<form class="pure-form" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Cell ID</td>
      <td>
        <input type="number" name="cellid" maxlength="20" size="10" />
      </td>
    </tr>
    <tr>
      <td>Genus</td>
      <td>
        <input type="text" name="Genus" maxlength="40" size="10" />
      </td>
    </tr>
    <tr>
      <td>Species</td>
       <td>
        <input type="text" name="species" maxlength="40" size="10" />
      </td>
    </tr>
    <tr>
      <td>Strain</td>
      <td>
        <input type="text" name="strain" maxlength="1000" size="90" />
      </td>
    </tr>
    <tr>
      <td>Genotype</td>
      <td>
        <input type="text" name="genotype" maxlength="1000" size="90" />
      </td>
    </tr>
    <tr>
      <td>Parent Strain</td>
      <td>
        <input type="text" name="parentstrain" maxlength="1000" size="60" />
      </td>
    </tr>
    <tr>	
      <td>Plasmid Name</td>
      <td>
        <input type="text" name="plasmidname" maxlength="1000" size="60" />
      </td>
    </tr>
    <tr>
      <td>Plasmid Genotype</td>
      <td>
	<input type="text" name="plasmidgenotype" maxlength="1000" size="90" />
      </td>
    </tr>
    <tr>
      <td>Copy Number</td>
      <td>
        <input type="text" name="copynumber" maxlength="45" size="20" />
      </td>
    </tr>
    <tr>
      <td>Antibiotic Resistance</td>
      <td>
	<input type="text" name="antibioticresistance" maxlength="45" size="20" />
      </td>
    </tr>
    <tr>
      <td>Construction Description</td>
      <td>
	<input type="text" name="constructiondescription" maxlength="2000" size="120" />
      </td>		
    </tr>
    <tr>
      <td>Sequence(s)</td>
      <td>
	<input type="file" name="sequence" id="sequence" class="inputfile"/>
      </td>
    </tr>
    <tr>
      <td>Lab and Institution</td>
      <td>
	<input type="text" name="lab" maxlength="90" size="90" />
    </tr>
    <tr>
      <td>Contributor</td>
      <td>
	<input type="text" name="contributor" maxlength="45" size="40" />
    </tr>
    <tr>
      <td>
        <button class="pure-button pure-button-primary" type="submit" name="submit" value="submit">Add Data</button> 
      </td>
    </tr>
    <br>
    <br>
    <tr>
      <td>
	<a class="pure-button" href="strains_dash.php">Return to Strains dashboard</a>
      </td>
    </tr> 
  </table>
</form>
<!-- Clean up. -->
<?php
  mysqli_free_result($result);
  mysqli_close($conn);
?>
</body>
<footer class="ct-footer">
    <div class="ct-footer-meta text-center-sm">
        <div class="col-sm-6 col-md-3">
          <address>
            <span>KunjapurLab<br></span>Chemical & Biomolecular Engineering<br>
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
