<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Week 7 Demo Homepage
    Shubham Mohanty
    June 13th, 2023
-->

<html lang="en">

    <?php

        $title = "Week 7 Homepage";

    ?>

    <?php include("head.php"); ?>

<body>

    <?php include("header.php"); ?>



    <section>
        <form action="form_process.php" method="post">
            <label for="temp">Temperature:</label><br>
            <input type="Textbox" name="temp" id="temp" placeholder="Enter Temp" maxlength="10">
            <br><br>
            <label for="unit">Units:</label><br>
            <select name="unit" id="unit">
                <option value="c">Celsius</option>
                <option value="f">Fahrenheit</option>
            </select>
            <br><br>
            <input type="submit" value="Calculate">
            <input type="reset" value="Cancel">
        </form>
    </section>

    <?php include("footer.php"); ?>

</body>

</html>