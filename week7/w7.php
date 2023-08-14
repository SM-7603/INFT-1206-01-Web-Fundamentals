<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Week 7 Demo Sticky Self Posting Form
    Shubham Mohanty
    June 13th, 2023
-->

<html lang="en">

    <?php

        $title = "Week 7 Sticky Self Posting Form";

        $result = "";

        $temp = "";

        $units = "";

        $error = "ERROR:";

        $isValid = true;

        $newTemp = "";

        $newUnits = "";

        // Stuff to check:

        // 1. Did we come from a post form?
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // retrieve the form values
            $temp = $_POST["temp"];
            $units = $_POST["unit"];

            // Data Validation:

            // 1. Was a temp provided?
            if (!isset($temp) || $temp == "") {
                $isValid = false;
                $error = $error."<br> - A value for temperature is required!";
            }
            
            // 2. Was the temp a number?
            if (!is_numeric($temp)) {
                $isValid = false;
                $error = $error."<br> - The temperature must be numeric!";
            }
            
            // 3. Were the units provided? (Only applicable, in case the stuff didn't come from form.)
            if (!isset($units)) {
                $isValid = false;
                $error = $error."<br> - The units were not provided!";                
            }

            // This right here is a boolean condition, (therefore no else is needed.)
            if ($isValid) {

                if ($units == "c") {
                    $newTemp = $temp * (9 / 5 ) + 32;
                    $newUnits = "f";
                } else if ($units == "f") {
                    $newTemp = ($temp - 32) * (5 / 9);
                    $newUnits = "c";
                } else {
                    $newTemp == -9999;
                }
                
                $newTemp = number_format((float)$newTemp, 2,'.', '');
                
                $result = "The entered temp was: ".$temp."&deg;".$units."<br>The units were: ".$units."<br>The new temp is: ".$newTemp."&deg;".$newUnits;
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



    <section>
        <form action="w7.php" method="post">
            <label for="temp">Temperature:</label><br>
            <input type="Textbox" name="temp" id="temp" placeholder="Enter Temp" maxlength="10" value = "<?php echo $temp; ?>">
            <br><br>
            <label for="unit">Units:</label><br>
            <select name="unit" id="unit">
                <option value="c" <?php if ($units == "c") {
                    echo "selected";
                } ?>>Celsius</option>
                <option value="f" <?php if ($units == "f") {
                    echo "selected";
                } ?>>Fahrenheit</option>
            </select>
            <br><br>
            <input type="submit" value="Calculate">
            <input type="reset" value="Cancel">
        </form>

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