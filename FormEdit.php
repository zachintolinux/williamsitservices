<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Computer Entry Form</title>
</head>

<body>
    <h1>Williams' Computer Sales
    </h1>
    <?php
    include 'db.php';
    $mn = $_GET['MN'];
    $query = "SELECT * FROM inventory WHERE MN='$mn'";
    /* Try to query the database */
    if ($result = $mysqli->query($query)) {
        // echo "<p>Got the info</p>"; // Don't do anything if successful.
    } else {
        echo "Sorry, a vehicle with MN of $mn cannot be found " .  $mysqli->error . "<br>";
    }
    // Loop through all the rows returned by the query, creating a table row for each
    while ($result_ar = mysqli_fetch_assoc($result)) {
        $MN = $result_ar['MN'];
        $year = $result_ar['YEAR'];
        $brand = $result_ar['Brand'];
        $series = $result_ar['Series'];
        $type = $result_ar['TYPE'];
        $color = $result_ar['COLOR'];
        $price = $result_ar['PRICE'];
    }
    echo "$MN </p>";
    //echo "$year $brand $series $color $type </p>";
    //echo "<p>Price: $price </p>";

    // This closes the connection between the PHP file and the mySQL server
    $mysqli->close();
    ?>

    <form action="EditComputer.php" method=”post”>
        <input name="MN" type="hidden" value="<?php echo "$MN" ?>" /><br />
        <br />
        Year: <input name="Year" type="text" value="<?php echo "$year" ?>" /><br />
        <br />
        Brand: <input name="Brand" type="text" value="<?php echo "$brand" ?>" /><br />
        <br />
        Series: <input name="Series" type="text" value="<?php echo "$series" ?>" /><br />
        <br />
        Color: <input name="Color" type="text" value="<?php echo "$color" ?>" /><br />
        <br />
        Type: <input name="Type" type="text" value="<?php echo "$type" ?>" /><br />
        <br />
        Price: <input name="Price" type="text" value="<?php echo "$price" ?>" /><br />
        <br />
        <input name="Submit1" type="submit" value="Submit" /><br />
        &nbsp;</form>
</body>

</html>