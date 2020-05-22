<html>

<head>
    <title>Computer Saved</title>
</head>

<body bgcolor="#FFFFFF" text="#000000">

    <?php
    // Capture the values posted to this php program from the text fields

    $MN =  trim($_REQUEST['MN']);
    $Year = trim($_REQUEST['Year']);
    $Brand = trim($_REQUEST['Brand']);
    $Series = trim($_REQUEST['Series']);
    $Color = trim($_REQUEST)['Color'];
    $Type = trim($_REQUEST)['Type'];
    $Price =  $_REQUEST['Price'];


    //Build a SQL Query using the values from above

    $query = "INSERT INTO inventory
  (MN, 'YEAR', Brand, Series, COLOR, 'TYPE', PRICE)
   VALUES (
   '$MN',
   '$Year', 
   '$Brand', 
   '$Series',
   '$Color',
   '$Type',
    $Price
    )";

    // Print the query to the browser so you can see it
    echo ($query . "<br>");

    include 'db.php';

    echo 'Connected successfully to mySQL. <BR>';

    //select a database to work with
    $mysqli->select_db("Computers");
    echo ("Selected the Computers database. <br>");

    /* Try to insert the new car into the database */
    if ($result = $mysqli->query($query)) {
        echo "<p>You have successfully entered $Brand $Series into the database.</P>";
    } else {
        echo "Error entering $MN into database: " . $mysqli->error . "<br>";
    }
    // This closes the connection between the PHP file and mySQL server
    $mysqli->close();
    include 'footer.php'
    ?>
</body>

</html>