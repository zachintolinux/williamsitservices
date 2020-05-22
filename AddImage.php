<html>

<head>
    <title>Williams' Computer Sales - Image Upload</title>
</head>

<body background="bg.jpg">
    <h1>Williams' Computer Sales</h1>
    <h3>Add Image</h3>
    <?php include 'db.php';
    $mn = $_GET['MN'];
    $query = "SELECT * FROM INVENTORY WHERE MN='$mn'";
    /* Try to query the database */
    if ($result = $mysqli->query($query)) {
        // Don't do anything if successful.
    } else {
        echo "Sorry, a computer with MN of $mn cannot be found " . mysqli_connect_error() . "<br>";
    }
    // Loop through all the rows returned by the query, creating a table row for each
    while ($result_ar = mysqli_fetch_assoc($result)) {
        $year = $result_ar['YEAR'];
        $brand = $result_ar['Brand'];
        $series = $result_ar['Series'];
        $color = $result_ar['COLOR'];
        $type = $result_ar['TYPE'];
        $price = $result_ar['PRICE'];
    }
    echo "<p>$year $brand $series $color $type <br>MN: $mn</p>";
    echo "<p>Price: $" . number_format($price, 0) . "</p>";



    ?>

    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br>
        <input name="MN" type="hidden" value="<?php echo "$mn" ?>" />
        <input type="submit" name="submit" value="Submit">
    </form>
    <br /><br />
    <?php
    $query = "SELECT * FROM images WHERE MN='$mn'";
    /* Try to query the database */
    if ($result = $mysqli->query($query)) {
        // Got some results
        // Loop through all the rows returned by the query, creating a table row for each
        while ($result_ar = mysqli_fetch_assoc($result)) {
            $image = $result_ar['ImageFile'];
            echo "<img src='uploads/$image' width= '250'>  ";
        }
    }
    // This closes the connection between the PHP file and the mySQL server
    $mysqli->close();
    include 'footer.php';
    ?>
</body>

</html>