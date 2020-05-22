<html>

<head>
    <meta charset="utf-8">
    <title>Williams' Computer Sales - List</title>

    <style>
        /* The grid is used to format a table instead of a grid control on the list of Notes */
        #Grid {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            width: 50%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        /* Those are the grid borders */
        #Grid td,
        #Grid th {
            font-size: 1em;
            border: 1px solid purple;
            padding: 3px 7px 2px 7px;
        }

        /* Those are the grid tables */
        #Grid th {
            font-size: 1.1em;
            text-align: left;
            padding-top: 5px;
            padding-bottom: 4px;
            background-color: darkblue;
            color: lightgray;
        }

        /* That is the first column color */
        #Grid tr.odd td {
            color: #000000;
            background-color: red;
        }

        /* This is the second column color */
        #Grid tr.even {
            color: #000000;
            background-color: white;
        }

        /* This is the grid background  */
        #Grid head {
            color: #000000;
            background-color: teal;
        }

        /* This centers the text */
        .center-text {
            text-align: center;
        }

        /* This sets the font style */
        .font {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* This sets the background for the topbar */
        .topbar {
            width: 100%;
            background-color: darkgray
        }

        /* This sets the background for the footer */
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: darkgray;
            text-align: center;
        }
    </style>

</head>

<?php
/* This randomizes the three images being displayed on the website each time you visit */
/* NOTE: The images may take a a few seconds to load due to internet dependence */
$backgrounds = array("https://eskipaper.com/images/red-abstract-background-1.jpg", "https://cdn.wallpapersafari.com/75/10/8K9FE1.jpg", "https://wallpapercave.com/wp/6rCdqXM.jpg");
shuffle($backgrounds);
foreach ($backgrounds as $background)
?>
<body background=<?php echo "$background"?>>
<a href="williamscomputersales.html"><img class="topbar center-text" src="logo-via-logohub.png" width="304" height="31" alt="logo"></a>
    <h3 class="center-text font">Current Inventory</h3>
    <div class="center-text">
        <?php
        include 'db.php';
        $query = "SELECT * FROM inventory";
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
            // Don't do anything if successful.
        } else {
            echo "Error getting the computers from the database: " . mysqli_connect_error() . "<br>";
        }

        // Create the table headers
        echo "<table id='Grid' style='width: 80%'>\n";
        echo "<tr>";
        echo "<th style='width: 50px'>MN</th>";
        echo "<th style='width: 50px'>Year</th>";
        echo "<th style='width: 50px'>Brand</th>";
        echo "<th style='width: 50px'>Series</th>";
        echo "<th style='width: 50px'>Color</th>";
        echo "<th style='width: 50px'>Type</th>";
        echo "<th style='width: 50px'>Price</th>";
        echo "<th style='width: 50px'>Action</th>";
        echo "</tr>\n";

        $class = "odd";  // Keep track of whether a row was even or odd, so we can style it later

        // Loop through all the rows returned by the query, creating a table row for each
        while ($result_ar = mysqli_fetch_assoc($result)) {
            echo "<tr class=\"$class\">";
            echo "<td><a href='viewcomputer.php?MN=" . $result_ar['MN'] . "'>" . $result_ar['MN'] . "</a></td>";
            echo "<td>" . $result_ar['YEAR'] . "</td>";
            echo "<td>" . $result_ar['Brand'] . "</td>";
            echo "<td>" . $result_ar['Series'] . "</td>";
            echo "<td>" . $result_ar['COLOR'] . "</td>";
            echo "<td>" . $result_ar['TYPE'] . "</td>";
            echo "<td>" . $result_ar['PRICE'] . "</td>";
            echo "<td><a href='FormEdit.php?MN=" . $result_ar['MN'] . "'>Edit</a>  <a href='deletecomputer.php?MN=" . $result_ar['MN'] . "'>Delete</a></td>";
            echo "</tr>\n";

            // If the last row was even, make the next one odd and vice-versa
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
        <footer class="footer font">
            <?php
            include 'footer.php'
            ?>
        </footer>

</body>

</html>