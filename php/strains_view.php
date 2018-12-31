<?php
include "../inc/dbinfo.inc";
include("auth.php");
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
$database = mysqli_select_db($conn, `Strains`);
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
<title>View Strains Database</title>
</head>
<a href="https://www.kunjapurlab.org/">
    <img alt="logo" src="https://www.kunjapurlab.org/uploads/4/6/1/0/4610982/first-draft-logo.png">
</a>
</header>
<body>
<div style="overflow-x:auto;">
<table class="pure-table pure-table-bordered">
  <tr>
    <td>Cell ID</td>
    <td>Species</td>
    <td>Genus</td>
    <td>Strain</td>
    <td>Genotype</td>
    <td>Parent Strain</td>
    <td>Plasmid Name</td>
    <td>Plasmid Genotype</td>
    <td>Copy Number</td>
    <td>Antibiotic Resistance</td>
    <td>Construction Description</td>
    <td>Stored by</td>
    <td>Contributor</td>
    <td>Institution and Lab</td>
    <td>Sequence on File?</td>
    <td>Sequence(s)</td>
    <td>Date stored</td>
  </tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM kunjapurdb.Strains");
while($query_data = mysqli_fetch_row($result)) {
  if ($query_data[14] == 0){
     $seq_true = "FALSE";
  }else{
     $seq_true="TRUE";
  }	
  echo "<tr>";
  echo "<td>",$query_data[0],
       "<td>",$query_data[1],
       "<td>",$query_data[2],
       "<td>",$query_data[3],
       "<td>",$query_data[4],
       "<td>",$query_data[5],
       "<td>",$query_data[6],
       "<td>",$query_data[7],
       "<td>",$query_data[8],
       "<td>",$query_data[9],
       "<td>",$query_data[10],
       "<td>",$query_data[11],
       "<td>",$query_data[12],
       "<td>",$query_data[13],
       "<td>",$seq_true,
       "<td>",$query_data[15],
       "<td>",$query_data[16];
  echo "</tr>";
}
?>
</table>
</div>
<table>
<tr>
  <td>
    <a class="pure-button" href="strains_dash.php">Return to Strains dashboard</a>
  </td>
</tr>
</table>
</body>
</html>
<?php
  mysqli_free_result($result);
  mysqli_close($conn);
?>

