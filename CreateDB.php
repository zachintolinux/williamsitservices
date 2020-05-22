<?php
/**
 * Joy of PHP sample code
 * Demonstrates how to create a database, create a table, and insert records.
 */

$mysqli = new mysqli('localhost', 'root', '' );


   if (!$mysqli) { 
      die('Could not connect: ' . mysqli_error($mysqli)); 
  } 
  echo 'Connected successfully to mySQL. <BR>'; 
  

/* Create table doesn't return a resultset */
if ($mysqli->query("CREATE DATABASE Computers") === TRUE) {
    echo "<p>Database Computers created</P>";
}
else
{
    echo "Error creating Computers database: " . mysqli_error($mysqli)."<br>";
}
//select a database to work with
$mysqli->select_db("Computers");
   Echo ("Selected the Computers database");

$query = " CREATE TABLE inventory 
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
    echo "<p>Error inserting Acer Aspire 5: </p>" . mysqli_error($mysqli);
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
    echo "<p>Error Inserting ASUS VivoBook S15: </p>" . mysqli_error($mysqli);
    echo "<p>***********</p>";
    echo $query ;
    echo "<p>***********</p>";
}

// Insert 8 other computers
$query3 = "INSERT INTO `Computers`.`inventory` (`MN`, `YEAR`, `Brand`, `Series`, `COLOR`, `TYPE`, `PRICE`, `PURCHASE_DATE`)
 VALUES
('7LL86UT#ABA', 2019, 'HP', 'EliteDesk 800 G5', 'Black', 'Desktop', 1249.00, NULL),
('5YN09UT#ABA', 2019, 'HP', '250 G7', 'Silver', 'Laptop', 679.00, NULL),
('ALA181', 2020, 'ABS', 'Rogue SE', 'Black', 'Desktop', 799.99, NULL),
('E15', 2020, 'Lenovo', 'ThinkPad', 'Black', 'Laptop', 879.00, NULL),
('N50-600', 2020, 'Acer', 'Nitro', 'Black/Red', 'Desktop', 749.00, NULL),
('1K0YX', 2020, 'Dell', 'Latitude 3500', 'Black', 'Laptop', 699.99, NULL),
('3671', 2020, 'Dell', 'Inspiron', 'Black', 'Desktop', 789.99, NULL),
('9SD-1656', 2020, 'MSI', 'P65 Creator', 'Space Gray w/h Silver Diamond Cut', 'Laptop', 1199.99, NULL),
";
/* Checks the connection between the PHP script and mySQL server */
if ($mysqli->query($query3) === TRUE) {
    echo "<p>8 computers inserted into inventory table.</p>";
}
else
{
echo "mysql_error()";
    echo "<p>Error Inserting 8 computers: </p>" . printf("Errormessage: %s\n", $mysqli->error);
    echo "<p>***********</p>";
    echo $query3;
    echo "<p>***********</p>";
}

/* Closes the connection between the PHP script and mySQL server */
$mysqli->close();
include 'footer.php';
