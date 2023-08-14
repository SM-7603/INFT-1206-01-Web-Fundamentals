<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Week 8 - PHP self referring forms continued
    Shubham Mohanty
    June 27th, 2023
-->

<!-- Make sure to follow the "Object-oriented" way of doing PHP - meaning
separate the head, body & footer into different PHP files...-->
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">

        <!-- making the form sticky -->
        <?php 
        
            // variable declarations

            // constants
            $MAX_ITERATIONS = 100;
            $TEMP_RATIO = 9.0/5.0;
            $TEMP_INCREMENT = 32.0;

            // variables
            $start = 0;
            $end = 0;
            $increment = 0.1;

            // process form
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // the stuff inside the quotes is what's in the "name" attribute of the input which is inside the form
                $start = $_POST["start"];
                $end = $_POST["end"];
                $increment = $_POST["increment"];    

                // data validation - the same stuff from week7 - copy the same thing, and change the variable names

                // data validation:
                $isValid = true;
                
                // test for validation failures setting $isValid = false;

                if ($isValid) {
                    // do stuff
                }

            }

        ?>

    </head>
    
    <body>

        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            
            <label>Starting Temperature</label>
            <input type="number" name="start" step="0.1" value="<?php echo $start;?>">
            <br>
            <label>Ending Temperature</label>
            <input type="number" name="end" step="0.1" value="<?php echo $end;?>">
            <br>
            <label>Increment Temperature</label>
            <input type="number" name="increment" step="0.1" value="<?php echo $increment;?>">
            <br>

            <input type="submit" value="Calculate">
            <input type="reset" value="Reset">

        </form>

        <!-- OUTPUT -->
        <?php 
            // if we are posting the form & doing data validation

            // we're diving the { } into separate php tags
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) { 
                
        ?>

        <!-- the benefit of splitting the { } is that, if the "if condition" doesn't work none of the html/css that's b/w the { } be executed either... -->
                <h2>Output</h2>

                <table>
                    <caption>Temperature Range Conversions</caption>
                    <thead>
                        <tr>
                            <th>&deg;C</th>
                            <th>&deg;F</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $i = 0;
                            
                            // now we're creating the rows & cells dynamically
                            for ($c = $start; $c <= $end; $c = $c + $increment) { 
                                
                                // making sure to not get stuck in an infinite loop
                                $i++;
                                
                                if ($i > $MAX_ITERATIONS) {
                                    break;
                                }


                                $f = $c * $TEMP_RATIO + $TEMP_INCREMENT;

                                echo "<tr>";
                                    echo "<td style='background-color: red;'>".$c."</td>";
                                    echo "<td>".$f."</td";
                                echo "</tr>";

                            }
                            
                        ?>
                    </tbody>
                </table>
        <?php 

            }
   
        ?>

    </body>

</html>