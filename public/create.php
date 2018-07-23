<?php
/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";
    try  {
        $connection = new PDO($dsn, $username, $password, $port, $options);

        $new_entry = array(
            "firstname" => $_POST['firstname'],
            "lastname"  => $_POST['lastname'],
            "email"     => $_POST['email'],
            "age"       => $_POST['age'],
            "location"  => $_POST['location']
        );
        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Make an entry</h2>

<form method="post">


<form method="post">
    <label for="cell">Cell #</label>
    <input type="text" name="cell" id="cell">
    <label for="genus">Genus</label>
    <input type="text" name="genus" id="genus">
    <label for="species">Species</label>
    <input type="text" name="species" id="species">
    <label for="strain">Strain</label>
    <input type="text" name="strain" id="strain">
    <label for="genotype">Genotype</label>
    <input type="text" name="genotype" id="genotype">
    <label for="parent">Parent Strain</label>
    <input type="text" name="parent" id="parent">
    <label for="plasmid_name">Plasmid Name</label>
    <input type="text" name="plasmid_name" id="plasmid_name">
    <label for="plasmid_genotype">Plasmid Genotype</label>
    <input type="text" name="plasmid_genotype" id="plasmid_genotype">
    <label for="copy_number">Copy Number</label>
    <input type="text" name="copy_number" id="genotype">
    <label for="antibiotic_resistance">Antibiotic Resistance</label>
    <input type="text" name="antibiotic_resistance" id="antibiotic_resistance">
    <label for="construction">Construction</label>
    <input type="text" name="genotype" id="genotype">
    <label for="sequence">Sequence?</label>
    <input type="text" name="sequence" id="sequence">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
