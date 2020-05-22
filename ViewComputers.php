<html>

<head>
    <meta charset="utf-8">
    <title>Williams' Computer Sales - List</title>
</head>


<body>
    <h1>Williams' Computer Sales</h1>
    <h3>Complete Inventory</h3>
    <?php
    include 'db.php';
    $query = "SELECT * FROM inventory ORDER BY Brand";
    /* Try to insert the new computer into the database */
    if ($result = $mysqli->query($query)) {
        // Don't do anything if successful.
    } else {
        echo "Error getting computers from the database: " . mysqli_connect_error() . "<br>";
    }

    // This displays the data from the mySQL server
    echo "<table id='Grid' style='width: 80%'><tr>";
    echo "<th style='width: 50px'>MN</th>";
    echo "<th style='width: 50px'>Year</th>";
    echo "<th style='width: 50px'>Brand</th>";
    echo "<th style='width: 50px'>Series</th>";
    echo "<th style='width: 50px'>Color</th>";
    echo "<th style='width: 50px'>Type</th>";
    echo "<th style='width: 50px'>Price</th>";
    echo "</tr>\n";

    $class = "odd";
    
    // This retrieves the data from the mySQL server
    while ($result_ar = mysqli_fetch_assoc($result)) {
        echo "<tr class=\"$class\">";
        echo "<td>" . $result_ar['MN'] . "</td>";
        echo "<td>" . $result_ar['YEAR'] . "</td>";
        echo "<td>" . $result_ar['Brand'] . "</td>";
        echo "<td>" . $result_ar['Series'] . "</td>";
        echo "<td>" . $result_ar['COLOR'] . "</td>";
        echo "<td>" . $result_ar['TYPE'] . "</td>";
        echo "<td>" . $result_ar['PRICE'] . "</td>";
        echo "</td></tr>\n";
        if ($class == "odd") {
            $class = "even";
        } else {
            $class = "odd";
        }
    }
    // This closes the connection between the PHP file and the mySQL server
    echo "</table>";
    $mysqli->close();
    ?>
</body>

</html>