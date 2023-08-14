<!DOCTYPE html>
<html lang="en">

    <!-- PHP main code -->
    <?php
        
        // $title = "test_preparation";
        
        // // this will be an empty string
        // $result = "";
        
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
        
        $error = "";

        // title
        $title = "Projectile Motion Displacement Calculator";

        // process form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // the stuff inside the quotes is what's in the "name" attribute of the input which is inside the form
            $initialVelocity = $_POST["initialVelocity"];
            $projectionAngle = $_POST["projectionAngle"];
            $incrementTimeInterval = $_POST["incrementTimeInterval"];

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
                        
        }

    ?>

    <!-- head -->
    <?php include("head.php") ?>

    <body>

        <!-- header -->
        <?php include("header.php") ?>

        <!-- section (the reason, I got that error previously, was because the section no longer had a heading, since I put the section inside main => separating the header & main, thereby resulting in no heading in the section...) -->
        <section>
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
            
            <!-- output section -->
            <!-- OUTPUT -->
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

                                for ($time=0; $time <= $time_of_flight; $time = $time + $incrementTimeInterval) { 
                                $i++;
                                if ($i > $MAX_ITERATIONS || $sy < 0) {
                                    break;
                                }

                                $sx = $ux * $time;
                                $sy = $uy * $time - 0.5 * $GRAVITATIONAL_CONSTANT * pow($time, 2);
                                
                                echo '<tr>';
                                    echo '<td>'.number_format($time, 1).'</td>';
                                    echo '<td>'.number_format($sx, 1).'</td>';
                                    echo '<td>'.number_format($sy, 1).'</td>';
                                echo '</tr>';
            
                                }

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
        <!-- footer -->
        <?php include("footer.php") ?>

    </body>


</html>