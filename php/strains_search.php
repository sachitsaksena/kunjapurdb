<?php
include "../inc/dbinfo.inc";
include("auth.php");
/* Connect to MySQL and select the database.*/
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

/* Catch an error if database can't be connected to */
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysli_connect_error();

/*Check for existence of database 
if (!mysqli_select_db($conn, `Strains`)) echo "Strains database does not exist."; */

/*Allso search via all fields*/
$cellid = htmlentities($_POST['Cell ID']);
$user = htmlentities($_POST['Cell ID']);
$keywords = htmlentities($_POST['Keywords']);

/* If the form is submitted */
if (isset($_POST['search']){
    $a = mysqli_real_escape_string($conn, $cellid);
    $b = mysqli_real_escape_string($conn, $user);
    
    /* Build SQL command. */
    $sql_search = "";
    $result = mysqli_query($conn, $sql_search);
    if ($result){
       /* Add code for visualizing data*/
       echo "ha";
    }
}
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
<title>Search Strain Database</title>
</head>
<header>
<a href="https://www.kunjapurlab.org/">
    <img alt="logo" src="https://www.kunjapurlab.org/uploads/4/6/1/0/4610982/first-draft-logo.png">
</a>
</header>
<body>
<h1>Search Strains Database</h1>
</body>
</html>

























