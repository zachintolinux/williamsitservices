<?php
/**
 * Joy of PHP sample code
 * Demonstrates how to modify an existing database table.
 */
include 'db.php';

   if (!$mysqli) { 
      die("Could not connect: ".$mysqli->error."<br>"); 
  } 
  echo 'Connected successfully to mySQL. <BR>'; 
  
//select a database to work with
$mysqli->select_db("Computers");
   Echo ("Selected the Computers database<br>");

// This modifies the database
$query = "ALTER TABLE `inventory` ADD `Primary_Image` VARCHAR(250) NULL AFTER `PURCHASE_DATE`";
echo "<p>***********</p>";
echo $query ;
echo "<p>***********</p>";
if ($mysqli->query($query) === TRUE) 
{
    echo "Database table 'INVENTORY' modified</P>";
}
else
{
    echo "<p>Error: </p>" . $mysqli->error."<br>";;
}
// This closes the connection between the PHP file and the mySQL server
$mysqli->close();
echo "<br><br><a href='index.php'>Home</a>";
?>