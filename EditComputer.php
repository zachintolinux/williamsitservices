<html>

<head>
    <title>Computer Saved</title>
</head>

<body bgcolor="#FFFFFF" text="#000000">

    <?php
    // Capture the values posted to this php program from the text fields in the form

    $MN = $_REQUEST['MN'];
    $Year = $_REQUEST['Year'];
    $Brand = $_REQUEST['Brand'];
    $Series = $_REQUEST['Series'];
    $Color = $_REQUEST['Color'];
    $Type = $_REQUEST['Type'];
    $Price = $_REQUEST['Price'];

    //Build a SQL Query using the values from above

    $query = "UPDATE inventory SET 

MN='$MN',
'YEAR'='$Year',
Brand='$Brand', 
Series='$Series',
COLOR='$Color',
'TYPE'='$Type',
PRICE='$Price'

WHERE

MN='$MN'";

    // Print the query to the browser so you can see it
    echo ($query . "<br>");

    include 'db.php';
    /* check connection */
    if (mysqli_connect_errno()) {
        echo ("Connection failed: " . $mysqli->error . "<br>");
        exit();
    }

    echo 'Connected successfully to mySQL. <BR>';

    //select a database to work with
    $mysqli->select_db("Computers");
    echo ("Selected the Computers database. <br>");

    /* Try to insert the new car into the database */
    if ($result = $mysqli->query($query)) {
        echo "<p>You have successfully entered $Brand $Series into the database.</P>";
    } else {
        echo "Error entering $MN into database: " . mysqli_connect_error() . "<br>";
    }
    $mysqli->close();
    ?>
    <p><a href="ViewComputersWithStyle2.php">View Computers with Edit Links</a></p>
</body>

</html>