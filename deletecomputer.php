<html>

<head>
    <title>Williams' Computer Sales - Deleted State</title>
</head>

<body>

    <h1>Williams' Computer Sales</h1>
    <?php
    include 'db.php';
    $mn = $_GET['MN'];
    $query = "DELETE FROM INVENTORY WHERE MN='$mn'";
    echo "$query <BR>";
    /* Try to query the database */
    if ($result = $mysqli->query($query)) {
        echo "The computer with the model number of $mn has been deleted.";
    } else {
        echo "Sorry, a computer with the model number of $mn cannot be found " . mysqli_connect_error() . "<br>";
    }

    $mysqli->close();

    ?>

</body>

</html>