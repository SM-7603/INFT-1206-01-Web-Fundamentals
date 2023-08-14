<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Lab6 - Projectile Motion Displacement Calculator = Concepts used: forms, form validations, basic php along with CSS styling.
    Shubham Mohanty
    June 29th, 2023
-->

<!-- Make sure to follow the "Object-oriented" way of doing PHP - meaning
separate the head, body & footer into different PHP files...-->
<html lang="en">

    <?php 
        // making the form sticky
        
        // variable declarations

        // constants
        $MAX_ITERATIONS = 100;
        // Since its a vector, I choose to assign the signs in the formula and leave just the magnitude here
        $GRAVITATIONAL_CONSTANT = 9.81;

        // variables
        $initialVelocity = "";
        $projectionAngle = "";
        $incrementTimeInterval = "";
        // $initialVelocity = 0;
        // $projectionAngle = 0;
        // $incrementTimeInterval = 0.1;
        $error = "";

        // title
        $title = "Projectile Motion Displacement Calculator";

        // process form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // the stuff inside the quotes is what's in the "name" attribute of the input which is inside the form
            $initialVelocity = $_POST["initialVelocity"];
            $projectionAngle = $_POST["projectionAngle"];
            $incrementTimeInterval = $_POST["incrementTimeInterval"];

            // data validation - the same stuff from week7 - copy the same thing, and change the variable names

            // data validation:
            $isValid = true;

            // # Data Validation:

            // 1. Was a value for the numbers provided?
            if ((!isset($initialVelocity) || $initialVelocity == "") || (!isset($projectionAngle) || $projectionAngle == "") || (!isset($incrementTimeInterval) || $incrementTimeInterval == "")) {
                $isValid = false;
                $error = $error."ERROR: <br> - A value for all 3 (initialVelocity, projectionAngle & incrementTimeInterval) must be entered!";
            }
            
            // 2. Were the entered numbers numeric?
            if (!is_numeric($initialVelocity) || !is_numeric($projectionAngle) || !is_numeric($incrementTimeInterval)) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The entered fields must be numeric!";
            }

            // 3. Were the entered values positive?
            if ($initialVelocity < 0 || $projectionAngle < 0 || $incrementTimeInterval < 0) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The entered fields must be positive!";
            }
                        
            // // test for validation failures setting $isValid = false;

            // if ($isValid = false) {
            //     // do stuff
            // }

        }

        include("head.php");
    ?>

    <body>

        <?php include("header.php"); ?>

        <main>
            <section>
            <h2 id="centeredSectionHeading">Enter the values below: </h2>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <label for="initialVelocity">Initial Velocity (m/s)</label>
                    <input type="number" name="initialVelocity" step="0.1" id="initialVelocity" min="0" value="<?php echo $initialVelocity; ?>">
                    <br><br>
                    <label for="projectionAngle">Projection Angle (&deg;)</label>
                    <input type="number" name="projectionAngle" step="0.1" id="projectionAngle" min="0" value="<?php echo $projectionAngle; ?>">
                    <br><br>
                    <label for="incrementTimeInterval">Time (s)</label>
                    <input type="number" name="incrementTimeInterval" step="0.1" id="incrementTimeInterval" min="0" value="<?php echo $incrementTimeInterval; ?>">
                    <br><br>
                    <input type="submit" value="Calculate">
                    <input type="reset" value="Reset">
                </form>
            </section>

            <!-- OUTPUT -->
            <section>
                <?php 
                    // if we are posting the form & doing data validation
        
                    // we're diving the { } into separate php tags
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) { 
                ?>
        
                <!-- the benefit of splitting the { } is that, if the "if condition" doesn't work none of the html/css that's b/w the { } be executed either... -->
                <h2>Output</h2>
        
                <div id="tableContainer">
                    <table>
                        <caption>Displacement - Cannon Ball</caption>
                        <thead>
                            <tr>
                                <th>Time (s)</th>
                                <th>X (m)</th>
                                <th>Y (m)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $i = 0;
                                // // Calculate the time of flight
                                // $TIME_OF_FLIGHT = (2 * $initialVelocity * sin(deg2rad($projectionAngle))) / $GRAVITATIONAL_CONSTANT;
                                // // Converting angles to radians
                                // $projectionAngleRad = deg2rad($projectionAngle);
                                // // now we're creating the rows & cells dynamically
                                // for ($t = 0; $t <= $TIME_OF_FLIGHT; $t = $t + $incrementTimeInterval) { 
                                //     // making sure not to get stuck in an infinite loop
                                //     $i++;
                                //     if ($i > $MAX_ITERATIONS) {
                                //         break;
                                //     }
                                //     // projectile motion formula
                                //     // displacement in x: Sx = Ux * t
                                //     $dx = ($initialVelocity * cos($projectionAngleRad)) * $t;
                                //     // displacement in y: Sy = Uy * t + (1/2) * a * t^2 
                                //     $dy = ($initialVelocity * sin($projectionAngleRad)) * $t - (0.5 * $GRAVITATIONAL_CONSTANT * pow($t, 2));
                                //     echo "<tr>";
                                //     echo "<td>".$t."</td>";
                                //     echo "<td>".$dx."</td>";
                                //     echo "<td>".$dy."</td>";
                                //     echo "</tr>";
                                // Converting angles to radians
                                $projectionAngleRad = deg2rad($projectionAngle);
                                // Initial Velocity Components: (I'm using 'u' for initial velocity)
                                $ux = $initialVelocity * cos($projectionAngleRad);
                                $uy = $initialVelocity * sin($projectionAngleRad);
                                // Total Time of Flight of the projectile: (2 * Uy / g)
                                $time_of_flight = 2 * $uy / $GRAVITATIONAL_CONSTANT;

                                // using s for displacement:
                                $sx = 0;
                                $sy = 0;

                                // declaring a variable for iteration:
                                $i = 0;
                                // // new variable, since my for loop didn't work as intended - never mind it works now
                                // $time = 0;

                                for ($time=0; $time <= $time_of_flight; $time = $time + $incrementTimeInterval) { 
                                // while ($sy >= 0) {
                                // making sure not to get stuck in an infinite loop & making sure the projectile doesn't go below ground level... :D
                                $i++;
                                if ($i > $MAX_ITERATIONS || $sy < 0) {
                                    break;
                                }
                                // if ($i > $MAX_ITERATIONS) {
                                //     break;
                                // }
                                $sx = $ux * $time;
                                $sy = $uy * $time - 0.5 * $GRAVITATIONAL_CONSTANT * pow($time, 2);
                                
                                echo '<tr>';
                                    echo '<td>'.number_format($time, 1).'</td>';
                                    echo '<td>'.number_format($sx, 1).'</td>';
                                    echo '<td>'.number_format($sy, 1).'</td>';
                                echo '</tr>';
            
                                // $time = $time + $incrementTimeInterval;
                                }

                                // }

                                // }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                    } else {
                        echo '<h4 id = "errorMessages">'.$error.'</h4>';
                    }
                ?>
            </section>
        </main>

        <?php include("footer.php"); ?>

    </body>
</html>
