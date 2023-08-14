<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Week 6 Demo Login
    Shubham Mohanty
    June 6th, 2023
-->

<html lang="en">

    <?php  
    
        $title = "Login Page";

    ?>

    <!-- The CSS file is located in the head.php file (meaning, its linked in the file below.) -->
    <?php include("head.php"); ?>
    
<body>
    
    <?php include("header.php"); ?>

    <!-- The <style> doesn't need to be in the "head" necessarily -->

    <!-- The embedded CSS down here, will override the stuff in the stylesheets -->

    <!-- TIP: Make sure to not mess with the background/colors in the embedded CSS, i.e. if you're creating multiple "themes".css files, then you won't be able to apply the theme. -->
    <style>
        section {
            width: 300px;
        }
    </style>
    
    <section>

        <form method="get" action="login.php">

        <!-- for == name (Those two have to be the same, this is used to link these 2) -->
        <label for="login">Login:</label>

        <input type="textbox" name="login" id="login" placeholder="Enter Login Here" maxlength="10">
        
        <br>

        <label for="password">Password:</label>

        <input type="password" name="password" id="password" maxlength="10">

        <br>

        <label></label>
        <input type="submit" name="submit" value="Login"> 
        <input type="reset" value="Cancel">
        
        </form>
    
    </section>
    
    <?php include("footer.php"); ?>
    
</body>

</html>