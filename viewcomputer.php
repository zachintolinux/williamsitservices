<html>

<head>
    <title>Williams' Computer Sales - List</title>
</head>

<body background="bg.jpg">

    <h1>Williams' Computer Sales</h1>
    <?php include 'db.php';
    $mn = $_GET['MN'];
    $query = "SELECT * FROM inventory WHERE MN='$mn'";
    /* Try to query the database */
    if ($result = $mysqli->query($query)) {
        // Don't do anything if successful.
    } else {
        echo "Sorry, a computer with the model number of $mn cannot be found " . mysqli_connect_error() . "<br>";
    }
    // Loop through all the rows returned by the query, creating a table row for each
    while ($result_ar = mysqli_fetch_assoc($result)) {
        $mn = $result_ar['MN'];
        $year = $result_ar['YEAR'];
        $brand = $result_ar['Brand'];
        $series = $result_ar['Series'];
        $color = $result_ar['COLOR'];
        $type = $result_ar['TYPE'];
        $price = $result_ar['PRICE'];
    }
    echo "$mn $year $brand $series $color $type $price </p>";
    echo "<p>Price: $price </p>";
    echo "<p>Type: $type </p>";
    echo "<p>Color: $color </p>";

    $mysqli->close();

    ?>

</body>

</html>