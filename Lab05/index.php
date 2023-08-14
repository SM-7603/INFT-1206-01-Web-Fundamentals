<!DOCTYPE html>
<!-- 
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): June 14th, 2023
    - Date (last edited): June 16th, 2023
    - Description: This is part 1 of lab 5 - which is an online calculator with basic operations like +, -, * & /.
-->

<html lang="en">

    <?php

        $title = "Online Calculator";

        $result = "";

        $calculatedValue = "";

        $num1 = "";

        $num2 = "";

        $operation = "";

        $error = "ERROR:";

        $isValid = true;

        // Stuff to check:

        // 1. Did we come from a post form?

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // retrieve the form values
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];

            // Data Validation:

            // 1. Was a value for the numbers provided?
            if ((!isset($num1) || $num1 == "") && (!isset($num2) || $num2 == "")) {
                $isValid = false;
                $error = $error."<br> - A value for both the numbers must be entered!";
            }
            
            // 2. Were the entered numbers numeric?
            if (!is_numeric($num1) && !is_numeric($num2)) {
                $isValid = false;
                $error = $error."<br> - The entered numbers must be numeric!";
            }
            
            // 3. Were the operations provided? (Only applicable, in case the stuff didn't come from form.)
            if (!isset($operation)) {
                $isValid = false;
                $error = $error."<br> - The operations were not provided!";
            }

            // 4. Making sure the denominator isn't zero
            if ($num2 == 0 && $operation == "/") {
                $isValid = false;
                $error = $error."<br> - Denominator can't be zero!";
            }

            // This right here is a boolean condition, (therefore no else is needed.)
            if ($isValid) {
                if ($operation == "+") {
                    $calculatedValue = $num1 + $num2;
                } else if ($operation == "-") {
                    $calculatedValue = $num1 - $num2;
                } else if ($operation == "*") {
                    $calculatedValue = $num1 * $num2;
                } else if ($operation == "/") {
                    $calculatedValue = $num1 / $num2;
                } else {
                    $calculatedValue = -9999;
                }
                
                $calculatedValue = number_format((float)$calculatedValue, 2,'.', '');
                
                $result = "The value of: ".$num1." ".$operation." ".$num2." = ".$calculatedValue;
            } else {
                $result = $error;
            }

        } else {
            $result = "";
        }

    ?>


    <?php include("head.php"); ?>

<body>

    <?php include("header.php"); ?>

    
    <section id="mainContent">
        <h2 id="centeredSectionHeading">Enter the values below: </h2>
        <form action="index.php" method="post">
            <label for="num1">Number 1:</label><br>
            <input type="text" name="num1" id="num1" value = "<?php echo $num1; ?>">
            <br><br>
            <label for="num2">Number 2:</label><br>
            <input type="text" name="num2" id="num2" value = "<?php echo $num2; ?>">
            <br><br>
            <label for="operation">Operations:</label><br>
            <select name="operation" id="operation">
                <option value="+" <?php if ($operation == "+") {
                    echo "selected";
                } ?>>Add</option>
                <option value="-" <?php if ($operation == "-") {
                    echo "selected";
                } ?>>Subtract</option>
                <option value="*" <?php if ($operation == "*") {
                    echo "selected";
                } ?>>Multiply</option>
                <option value="/" <?php if ($operation == "/") {
                    echo "selected";
                } ?>>Divide</option>
            </select>
            <br><br>
            <input type="submit" value="Calculate">
            <input type="reset" value="Cancel">
        </form>

        <!-- 
            variables that I'll need: 
                - num1 
                - num2
                - operations?
                - result
        -->

        <?php if (!($result == "")) 
            { 
        ?>

        <h4><?php echo $result; ?></h4>

        <?php 
            } 
        ?>

    </section>

    <?php include("footer.php"); ?>

</body>

</html>