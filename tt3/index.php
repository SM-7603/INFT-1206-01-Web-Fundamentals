<!-- 
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): August 10th, 2023
    - Description: INFT-1206 - Final test - part 1 (The Colors Table)
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/tt3.css">
    <?php include("../includes/head.php"); ?>
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <main>
        <!-- my favorite color title -->
        <h2>My favorite color is <strong id="red_color">RED</strong> :D</h2>

        <!-- brief intro -->
        <p id="intro_para">
            This page consists of a table, which is accessing it's data from a database for the fields in the first row, and then generating the values for said fields dynamically. There's a <strong>Add Color</strong> link at the bottom of the page, click that to add colors of your choice.
        </p>
        <br>
        <section>
            <h2>Colors Table</h2>
            <!-- Display dynamic table -->
            <table id="outputTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color Name</th>
                        <th>Red</th>
                        <th>Green</th>
                        <th>Blue</th>
                        <th>cssHex</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include necessary files and functions
                    // require("../includes/functions.php");
                    // require("../includes/db_connect.php");

                    // Retrieve data from the database and generate dynamic rows
                    $connection = db_connect();

                    $query = "SELECT * FROM tt3Colors";
                    $result = pg_query($connection, $query);

                    while ($row = pg_fetch_assoc($result)) {
                        echo "<tr>";
                            echo "<td>" . $row['colorid'] . "</td>";
                            echo "<td>" . $row['colorname'] . "</td>";
                            echo "<td>" . $row['red'] . "</td>";
                            echo "<td>" . $row['green'] . "</td>";
                            echo "<td>" . $row['blue'] . "</td>";
                            echo "<td>" . $row['csshex'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <p>If you need to add a new color, click <a href="tt3.php">Add Color</a></p>
        </section>
    </main>
    <?php include("../includes/footer.php"); ?>
</body>
</html>
