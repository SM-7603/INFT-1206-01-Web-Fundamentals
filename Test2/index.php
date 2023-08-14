<!DOCTYPE html>
<!-- 
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 6th, 2023
    - Description: index file for Test2
-->
<html lang="en">

    <!-- PHP main code -->
    <?php
        // declaring variables:
        $name = "Shubham";

        $userName = "";
        $currentAge = "";
        $monthlyInvestmentAmount = "";
        $interestPerAnnum = "";

        $error = "";

        // title
        $title = "Test Two - $name";

        // process form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // the stuff inside the quotes is what's in the "name" attribute of the input which is inside the form
            $userName = $_POST["userName"];
            $currentAge = $_POST["currentAge"];
            $monthlyInvestmentAmount = $_POST["monthlyInvestmentAmount"];
            $interestPerAnnum = $_POST["interestPerAnnum"];

            // data validation:
            $isValid = true;

            // # Data Validation:

            // 1. Was a value for the numbers provided?
            if ((!isset($userName) || $userName == "") || (!isset($currentAge) || $currentAge == "") || (!isset($monthlyInvestmentAmount) || $monthlyInvestmentAmount == "") || (!isset($interestPerAnnum) || $interestPerAnnum == "")) {
                $isValid = false;
                $error = $error."ERROR: <br> - A value for all 4 (User Name, Current Age, The investment amount & Interest / Annum must be provided) must be entered!";
            }
            
            // 2. Were the entered numbers numeric?
            if (!is_numeric($currentAge) || !is_numeric($monthlyInvestmentAmount) || !is_numeric($interestPerAnnum)) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The entered fields must be numeric!";
            }

            // 3. Were the entered values positive?
            if ($currentAge < 0 || $monthlyInvestmentAmount < 0 || $interestPerAnnum < 0) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The entered fields must be positive!";
            }

            // 4. that the users current age is between 18 and 64 inclusively
            if ($currentAge > 64 || $currentAge < 18) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The age can only be between [18, 64]!";
            }
            // 5. that the monthly contribution is between 25 and 2000 dollars
            if ($monthlyInvestmentAmount < 25 || $monthlyInvestmentAmount > 2000) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The investment amount can only be between $25 - $2000!";
            }
            // 6. that the annual (yearly) interest rate is between 2 and 17 percent.
            if ($interestPerAnnum < 2 || $interestPerAnnum > 17) {
                $isValid = false;
                $error = $error."<br><br>ERROR: <br> - The interest/year can only be between 2% - 17% !";
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

                <label for="userName">Name:</label><br>
                <input type="text" name="userName" id="userName" value = "<?php echo $userName; ?>">
                <br><br>
            
                <label for="currentAge">Current Age: </label>
                <input type="number" name="currentAge" step="0.1" id="currentAge" min="0" value="<?php echo $currentAge; ?>">
                <br><br>
                <label for="monthlyInvestmentAmount">Investment Amount (monthly): </label>
                <input type="number" name="monthlyInvestmentAmount" step="0.1" id="monthlyInvestmentAmount" min="0" value="<?php echo $monthlyInvestmentAmount; ?>">
                <br><br>
                <label for="interestPerAnnum">Interest (annually): </label>
                <input type="number" name="interestPerAnnum" step="0.1" id="interestPerAnnum" min="0" value="<?php echo $interestPerAnnum; ?>">
                <br><br>
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
        
                <div id="tableContainer">
                    <table>
                        <caption>Balance Sheet</caption>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Contribution</th>
                                <th>Interest earned</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                // the ending point for the loop
                                $monthsLeft = (65 - $currentAge) * 12;

                                // creating more variables:
                                $balance =  0;

                                // // monthly interest (calculation): (this will most likely go inside the loop)
                                // // monthly interest earned = previous months balance * interest rate / (12*100)
                                // $monthlyInterestEarned = $balance * $interestPerAnnum / (12 * 100);

                                // // new balance
                                // $balance += $monthlyInterestEarned; 
                            
                                // declaring a variable for iteration:
                                $i = 0;
                                $monthlyInterestEarned = 0;

                                // // max - iterations - temporary
                                // $MAX_ITERATIONS = 100;

                                // for ($i = 1; $i <= $monthsLeft && $i <= $MAX_ITERATIONS; $i++) 
                                       // Loop Iteration
                                for ($i = 0; $i <= $monthsLeft; $i++) {
                                    // $monthlyInterestEarned = $balance * $interestPerAnnum / (12 * 100);
                                    // $balance += $monthlyInvestmentAmount + $monthlyInterestEarned;
                                    if ($i > 0) {
                                        $monthlyInterestEarned = $balance * $interestPerAnnum / (12 * 100);
                                        $balance += $monthlyInvestmentAmount + $monthlyInterestEarned;
                                    }
                                    
                                    echo '<tr>';
                                    echo '<td>'.$i.'</td>';
                                    echo '<td>$'.number_format($monthlyInvestmentAmount, 2).'</td>';
                                    echo '<td>$'.number_format($monthlyInterestEarned, 2).'</td>';
                                    echo '<td>$'.number_format($balance, 2).'</td>';
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

<!-- LINK: https://opentech.durhamcollege.org/inft1206/mohantys/Test2/index.php -->