<!DOCTYPE html>
<!-- 
    INFT-1206-01 - I'm just experimenting, trying to use FlexBox & CSS Grid instead of the traditional tables: 
    Shubham Mohanty
    June 27th, 2023
-->

<!-- Make sure to follow the "Object-oriented" way of doing PHP - meaning
separate the head, body & footer into different PHP files...-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Conversion</title>
    <link rel="stylesheet" href="css/demo.css">

    <!-- making the form sticky -->
    <?php 
        // variable declarations

        // constants
        $MAX_ITERATIONS = 100;
        $TEMP_RATIO = 9.0 / 5.0;
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
    <div class="container">
        <header>
            <nav>
                <h1>Temperature Conversion</h1>
                <div>
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                </div>
            </nav>
        </header>

        <main>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <label for="start">Starting Temperature:</label>
                <input type="number" name="start" step="0.1" value="<?php echo $start; ?>">
                <br>
                <label for="end">Ending Temperature:</label>
                <input type="number" name="end" step="0.1" value="<?php echo $end; ?>">
                <br>
                <label for="increment">Increment Temperature:</label>
                <input type="number" name="increment" step="0.1" value="<?php echo $increment; ?>">
                <br>
                <input type="submit" value="Calculate">
                <input type="reset" value="Reset">
            </form>

            <!-- OUTPUT -->
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) { ?>
                <h2>Output</h2>
                <div class="grid-container">
                    <div class="grid-item"><strong>Celsius (C)</strong></div>
                    <div class="grid-item"><strong>Fahrenheit (F)</strong></div>
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
                    ?>
                        <div class="grid-item"><?php echo $c; ?> C</div>
                        <div class="grid-item"><?php echo $f; ?> F</div>
                    <?php
                    }
                    ?>
                </div>
            <?php } ?>
        </main>

        <footer>
            &copy; <?php echo date("Y"); ?> Temperature Conversion. All rights reserved.
        </footer>
    </div>
</body>

</html>
