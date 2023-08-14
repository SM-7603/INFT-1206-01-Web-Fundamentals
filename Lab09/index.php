<!DOCTYPE html>
<!--  
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 26th, 2023
    - Description: Index file for Lab09
-->
<html lang="en">

    <!-- I need the <head> section in the code to be there -->

    <head>
        <?php include("../includes/head.php"); ?>
    </head>


    <?php
        // Defining the variables:
        // $author = "Shubham Mohanty";
        // $title = "Lab 7 - Part 2 - Automobiles";
        // the main stuff
        $login = '';
        $password = '';
        $isValid = true;
        $error = "";
        $result = "";
        // The PHP logic
        // calling the db function
        $connection = db_connect();

        // Stuff to check:

        // 1. Did we come from a post form?
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // retrieve the form values
            // should I "trim" here to get rid of the whitespace?
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Data Validation:

            // 1. Was a value for the fields provided?
            if ((!isset($login) || $login == "") || (!isset($password) || $password == "")) {
                $isValid = false;
                $error = $error . "<br> - A value for both (Login & Password) must be entered!";
            }

            // This right here is a boolean condition, (therefore no else is needed.)
            if ($isValid) {
                // we're just checking for the 'login' id
                $query = "SELECT * FROM users WHERE id = '$login'";
                $results = pg_query($connection, $query);

                // Flag to check if login attempt was successful
                $loginSuccessful = false;

                if (pg_num_rows($results)) {
                    // User ID exists in the database
                    $row = pg_fetch_assoc($results);
                    $db_password = $row["password"];

                    if ($password == $db_password) {
                        // Password matches, successful login
                        $firstName = $row["first_name"];
                        $lastName = $row["last_name"];
                        $emailAddress = $row["email_address"];
                        $lastAccess = $row["last_access"];
                        // update db
                        $sql = "UPDATE users SET last_access = '" . date("Y-m-d", time()) . "' WHERE id = '$login'";
                        $updateResult = pg_query($connection, $sql);
                        if (!$updateResult) {
                            $error = $error . "<br> - Error updating last access date!";
                        }

                        // Set the flag to indicate successful login
                        $loginSuccessful = true;
                    } else {
                        // Password doesn't match, display the "Wrong Password" error
                        $error = "Wrong Password";
                    }
                } else {
                    // User ID doesn't exist, display the "User Doesn't Exist" error
                    $error = "User Doesn't Exist";
                }
            }
        } else {
            $error = "";
        }
    ?>


    <body>

        <?php include("../includes/header.php"); ?>

        <!-- The main content -->
        <main>

            <!-- The section tags -->
            <section>
                <h2>Please Log In</h2>
                <p>Enter your login ID and password to enter this system</p>
                <?php
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

                    <label for="login">Login ID: </label>
                    <input type="text" id="login" name="login" value="<?php echo "$login" ?>" required>
                    <br><br>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" value="<?php echo "$password" ?>" required>
                    <br><br>
                    <input type="submit" value="Log In">
                    <input type="reset" value="Reset">
                    <br>

                    <p>
                        Please wait after pressing <strong>Log In</strong> while we retrieve your records from the database
                    </p>
                    <!-- <br> -->
                    <p>
                        <em>This may take a few moments</em>
                    </p>

                </form>

                <?php if (!($error == "")) 
                    { 
                ?>

                <h4 id="errorMessages"><?php echo ($error); ?></h4>

                <?php 
                    } 
                ?>

            </section>

            <section>
                <!-- Display the welcome message after the form -->
                <?php if ($loginSuccessful) { ?>
                    <section id="final_output">
                        <p>Welcome, <?php echo "$firstName $lastName"; ?></p>
                        <p>Email Address: <?php echo $emailAddress; ?></p>
                        <p>Last Accessed: <?php echo $lastAccess; ?></p>
                    </section>
                <?php } ?>
            </section>

        </main>

        <?php include("../includes/footer.php"); ?>

    </body>

</html>