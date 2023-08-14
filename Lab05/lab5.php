<!DOCTYPE html>
<!-- 
    - File name: lab5.php
    - Name/Author: Shubham Mohanty
    - Date (created): June 14th, 2023
    - Date (last edited): June 16th, 2023
    - Description: This is part 2 of the lab 5 - this is a volume calculation form (for the packages) which outputs the estimation cost for shipping to various cities.
-->

<html lang="en">

    <?php

        $title = "Shipping Price Calculator";

        $result = "";

        $volume = "";

        $length = "";

        $width = "";

        $height = "";

        $city = "";

        $error = "ERROR:";

        $isValid = true;

        $shipping_cost = "";

        // Declaring constants:

        $SHIPPING_COST_TORONTO = 1.00;
        $SHIPPING_COST_OTTAWA = 2.00;
        $SHIPPING_COST_MONTREAL = 1.87;
        $SHIPPING_COST_WATERLOO = 1.27;
        $SHIPPING_COST_NIAGARA_FALLS = 1.78;
        $SHIPPING_COST_CUSTOM = 2.50;


        // Stuff to check:

        // 1. Did we come from a post form?

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // retrieve the form values
            $length = $_POST["length"];
            $width = $_POST["width"];
            $height = $_POST["height"];
            // // what do I do with the city option???
            // $operation = $_POST["operation"];
            $city = $_POST["city"];

            // Data Validation:

            // 1. Was a value for the numbers provided?
            if ((!isset($length) || $length == "") || (!isset($width) || $width == "") || (!isset($height) || $height == "")) {
                $isValid = false;
                $error = $error."<br> - A value for all 3 (length, width & height) must be entered!";
            }
            
            // 2. Were the entered numbers numeric?
            if (!is_numeric($length) || !is_numeric($width) || !is_numeric($height)) {
                $isValid = false;
                $error = $error."<br> - The entered fields must be numeric!";
            }
            
            // 3. Was the city provided? (Only applicable, in case the stuff didn't come from form.)
            if (!isset($city)) {
                $isValid = false;
                $error = $error."<br> - The city was not provided!";
            }

            // 4. Was the city provided?
            if (empty($city)) {
                $isValid = false;
                $error = $error."<br> - The city was not provided!";
            }

            // // Calculate volume
            // $volume = $length * $width * $height;

            // if (is_numeric($length) && is_numeric($width) && is_numeric($height)) {
            //     $volume = $length * $width * $height;
            // } else {
            //     $volume = 0;
            //     $isValid = false;
            //     $error .= "<br> - The dimensions must be numeric!";
            // }
            

            // // Check if volume is below the minimum
            // if ($volume < 20) {
            //     $isValid = false;
            //     $error = $error . "<br> - The volume of the package must be at least 20 cm<sup>3</sup> !";
            // }

            // This right here is a boolean condition, (therefore no else is needed.)
            if ($isValid) {

                // Calculate volume
                $volume = $length * $width * $height;

                // Check if volume is below the minimum
                if ($volume < 20) {
                    $isValid = false;
                    $error = $error."<br> - The volume of the package must be at least 20 cm<sup>3</sup> !";
                    $result = $error;
                } else {
                    if ($city == "Toronto") {
                        // $volume = $length * $width * $height;
                        $shipping_cost = $volume * $SHIPPING_COST_TORONTO; 
                    } else if ($city == "Ottawa") {
                        // $volume = $length * $width * $height;
                        $shipping_cost = $volume * $SHIPPING_COST_OTTAWA; 
                    } else if ($city == "Montreal") {
                        // $volume = $length * $width * $height;
                        $shipping_cost = $volume * $SHIPPING_COST_MONTREAL; 
                    } else if ($city == "Waterloo") {
                        // $volume = $length * $width * $height;
                        $shipping_cost = $volume * $SHIPPING_COST_WATERLOO; 
                    } else if ($city == "Niagara Falls") {
                        // $volume = $length * $width * $height;
                        $shipping_cost = $volume * $SHIPPING_COST_NIAGARA_FALLS; 
                    } else {
                        // $volume = $length * $width * $height;
                        $shipping_cost = $volume * $SHIPPING_COST_CUSTOM; 
                    }
    
                    // formatting the outputs
    
                    $volume = number_format((float)$volume, 1,'.', ',');
    
                    $shipping_cost = number_format((float)$shipping_cost, 2, '.', ',');
    
                    
                    // $result = "The value of: ".$length." ".$city." ".$width." = ".$volume;
                    
                    // $result = "The Shipping cost for a : ".$volume." cm<sup>3</sup>"." to ".$city." = ".$shipping_cost;
    
                    $result = "The Shipping cost for a ".$volume." cm<sup>3</sup>"." package"." to ".$city." = $".$shipping_cost;
    
                }
                // initial - attempt - couldn't get the minimum 20 cm^3 to work...

                // if ($city == "Toronto") {
                //     // $volume = $length * $width * $height;
                //     $shipping_cost = $volume * $SHIPPING_COST_TORONTO; 
                // } else if ($city == "Ottawa") {
                //     // $volume = $length * $width * $height;
                //     $shipping_cost = $volume * $SHIPPING_COST_OTTAWA; 
                // } else if ($city == "Montreal") {
                //     // $volume = $length * $width * $height;
                //     $shipping_cost = $volume * $SHIPPING_COST_MONTREAL; 
                // } else if ($city == "Waterloo") {
                //     // $volume = $length * $width * $height;
                //     $shipping_cost = $volume * $SHIPPING_COST_WATERLOO; 
                // } else if ($city == "Niagara Falls") {
                //     // $volume = $length * $width * $height;
                //     $shipping_cost = $volume * $SHIPPING_COST_NIAGARA_FALLS; 
                // } else {
                //     // $volume = $length * $width * $height;
                //     $shipping_cost = $volume * $SHIPPING_COST_CUSTOM; 
                // }

                // // formatting the outputs

                // $volume = number_format((float)$volume, 1,'.', ',');

                // $shipping_cost = number_format((float)$shipping_cost, 2, '.', ',');

                
                // // $result = "The value of: ".$length." ".$city." ".$width." = ".$volume;
                
                // // $result = "The Shipping cost for a : ".$volume." cm<sup>3</sup>"." to ".$city." = ".$shipping_cost;

                // $result = "The Shipping cost for a ".$volume." cm<sup>3</sup>"." package"." to ".$city." = $".$shipping_cost;

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
            <form action="lab5.php" method="post">
                <label for="length">Length (cm): </label>
                <!-- <input type="number" name="length" id="length" value="<?php echo $length?>" min=0 step="0.1"> -->
                <input type="number" name="length" id="length" value="<?php echo $length?>" min=0 step="0.1">
                <br><br>
                <label for="width">Width (cm): </label>
                <!-- <input type="number" name="width" id="width" value="<?php echo $width?>" min=0 step="0.1"> -->
                <input type="number" name="width" id="width" value="<?php echo $width?>" min=0 step="0.1">
                <br><br>
                <label for="height">Height (cm): </label>
                <!-- <input type="number" name="height" id="height" value="<?php echo $height?>" min=0 step="0.1"> -->
                <input type="number" name="height" id="height" value="<?php echo $height?>" min=0 step="0.1">
                <br><br>
                <label>Enter the city: </label>
                    <br>
                    <input type="text" name="city" list="city" value="<?php echo $city?>">
                    <datalist id="city">
                        <option value="Toronto"
                            <?php 
                                if ($city == "Toronto") {
                                    echo "selected";
                                } 
                            ?>
                        >Toronto</option>
                        <option value="Ottawa"
                            <?php 
                                if ($city == "Ottawa") {
                                    echo "selected";
                                } 
                            ?>
                        >Ottawa</option>
                        <option value="Montreal"
                            <?php 
                                if ($city == "Montreal") {
                                    echo "selected";
                                } 
                            ?>
                        >Montreal</option>
                        <option value="Waterloo"
                            <?php 
                                if ($city == "Waterloo") {
                                    echo "selected";
                                } 
                            ?>
                        >Waterloo</option>
                        <option value="Niagara Falls"
                            <?php 
                                if ($city == "Niagara Falls") {
                                    echo "selected";
                                } 
                            ?>
                        >Niagara Falls</option>
                    </datalist>
                <br><br>
                <input type="submit" value="Calculate">
                <input type="reset" value="Cancel">
            </form>

            <!-- 
                variables that I'll need: 
                    - length 
                    - width
                    - cities?
                    - shipping rates for each city
                    - volume
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