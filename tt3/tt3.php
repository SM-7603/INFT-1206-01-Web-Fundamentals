<!-- 
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): August 10th, 2023
    - Description: INFT-1206 - Final test - part 2 (The Form to insert data into the database, which we could later view from part 1 - the colors table)
-->
<!DOCTYPE html>
<html lang="en">
    <?php
        // define the variables:
        $colorID = '';
        $colorName = '';
        $red = '';
        $green = '';
        $blue = '';
        $cssHex = '';
        $description = '';

        // process form: (making sure the form is sticky)

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $colorID = $_POST["colorID"];
            $colorName = $_POST["colorName"];
            $red = $_POST["red"];
            $green = $_POST["green"];
            $blue = $_POST["blue"];
            $cssHex = $_POST["cssHex"];
            $description = $_POST["description"];   
        }
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/mohantys.css">
        <?php require("../includes/head.php"); ?>
    </head>
    <body>
        <?php require("../includes/header.php"); ?>
        <main>
            <section>
                <h2>Add New Color</h2>
                <p>Enter color details below</p>
                <br>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <label for="colorID">Color ID:</label>
                    <input type="number" id="colorID" name="colorID" value="<?php echo $colorID; ?>" required>
                    <br><br>
                    <label for="colorName">Color Name:</label>
                    <input type="text" id="colorName" name="colorName" value="<?php echo $colorName; ?>" required>
                    <br><br>
                    <label for="red">Red:</label>
                    <input type="number" id="red" name="red" min="0" max="255" value="<?php echo $red; ?>" required>
                    <br><br>
                    <label for="green">Green:</label>
                    <input type="number" id="green" name="green" min="0" max="255" value="<?php echo $green; ?>" required>
                    <br><br>
                    <label for="blue">Blue:</label>
                    <input type="number" id="blue" name="blue" min="0" max="255" value="<?php echo $blue; ?>" required>
                    <br><br>
                    <label for="cssHex">CSS Hex:</label>
                    <input type="text" id="cssHex" name="cssHex" pattern="[0-9A-Fa-f]{6}" value="<?php echo $cssHex; ?>" required>
                    <br><br>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" value="<?php echo $description; ?>">
                    <br><br>
                    <input type="submit" name="submit" value="Add Color">
                    <input type="reset" value="Reset">
                    <br><br>
                </form>

                <?php
                // Process submitted color addition
                if (isset($_POST["submit"])) {
                    // Retrieve form values
                    $colorID = $_POST["colorID"];
                    $colorName = $_POST["colorName"];
                    $red = $_POST["red"];
                    $green = $_POST["green"];
                    $blue = $_POST["blue"];
                    $cssHex = $_POST["cssHex"];
                    $description = $_POST["description"];

                    // Establish database connection
                    $connection = db_connect();

                    // Check if the colorID already exists in the database
                    $checkQuery = "SELECT colorid FROM tt3colors WHERE colorid = '$colorID'";
                    $checkResult = pg_query($connection, $checkQuery);

                    if (pg_num_rows($checkResult) > 0) {
                        echo "<p>Error: Color with the same ID already exists. Please choose a different ID.</p>";
                    } else {
                        // Insert the new color into the tt3Colors table

                        // Insert the new color into the tt3Colors table
                        $insertQuery = "INSERT INTO tt3Colors (colorid ,colorname, red, green, blue, csshex, description)
                                        VALUES ('$colorID', '$colorName', '$red', '$green', '$blue', '$cssHex', '$description')";
                        $insertResult = pg_query($connection, $insertQuery);

                        if ($insertResult) {
                            header("Location: index.php"); // Redirect to index.php
                            exit(); // Exit to ensure no further output interferes with the redirect
                        } else {
                            echo "<p>Error adding color. Please try again.</p>";
                        }
                    }
                }
                ?>
            </section>
        </main>
        <?php require("../includes/footer.php"); ?>
    </body>
</html>
