<?php
/**
 * Joy of PHP sample code
 * Demonstrates how to create a database, create a table, and insert records.
 */

$mysqli = new mysqli('localhost', 'root', '' );


   if (!$mysqli) { 
      die('Could not connect: ' . mysqli_connect_error()); 
  } 
  echo 'Connected successfully to mySQL. <BR>'; 
  

/* Create table doesn't return a resultset */
if ($mysqli->query("CREATE DATABASE Computers") === TRUE) {
    echo "<p>Database Computers created</P>";
}
else
{
    echo "Error creating Computers database: " . mysqli_connect_error()."<br>";
}
//select a database to work with
$mysqli->select_db("Computers");
   Echo ("Selected the Computers database");

$query = " CREATE TABLE INVENTORY 
( MN varchar(25) PRIMARY KEY, YEAR INT, Brand varchar(50), Series varchar(50), 
COLOR varchar (50), TYPE varchar(50), PRICE DECIMAL (10,2), PURCHASE_DATE DATE)";
//echo "<p>***********</p>";
//echo $query ;
//echo "<p>***********</p>";
if ($mysqli->query($query) === TRUE) 
{
    echo "Database table 'INVENTORY' created</P>";
}
else
{
    echo "<p>Error: </p>" . $mysqli->error;
}
// Dates are stored in MySQL as 'YYYY-MM-DD' format
$query = "INSERT INTO `Computers`.`inventory` 
(`MN`, `YEAR`, `Brand`, `Series`, `COLOR`, `TYPE`, `PRICE`, `PURCHASE_DATE`) 
VALUES 
('A515-54-76TA', '2020', 'Acer', 'Aspire 5', 'Charcoal Black', 'Laptop', 749.99, NULL);";


/* Checks the connection between the PHP script and mySQL server */
if ($mysqli->query($query) === TRUE) {
    echo "<p>Acer Aspire 5 inserted into inventory table. </p>";
}
else
{
    echo "<p>Error inserting Acer Aspire 5: </p>" . $mysqli->error;
    echo "<p>***********</p>";
    echo $query ;
    echo "<p>***********</p>";
}

// Insert a ASUS VivoBook S15

$query = "INSERT INTO `Computers`.`inventory` (`MN`, `YEAR`, `Brand`, `Series`, `COLOR`, `TYPE`, `PRICE`, `PURCHASE_DATE`) 
VALUES 
('S532FA-SB77', '2019', 'ASUS', 'VivoBook S15', 'Transparent Silver', 'Laptop', 749.99, NULL);";


/* Checks the connection between the PHP script and mySQL server */
if ($mysqli->query($query) === TRUE) {
    echo "<p>ASUS VivoBook S15 inserted into inventory table.</p>";
}
else
{
    echo "<p>Error Inserting ASUS VivoBook S15: </p>" . $mysqli->error;
    echo "<p>***********</p>";
    echo $query ;
    echo "<p>***********</p>";
}


// This closes the connection between the PHP file and the mySQL server
$mysqli->close();
include 'footer.php';
?>