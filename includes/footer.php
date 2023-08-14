<!-- 
    - File name: footer.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 26th, 2023
    - Description: Shared footer to be used for labs after Lab9
-->

<!-- defining the variables -->
<?php
    $author = "Shubham Mohanty";
    $year = date("Y");
?>


<footer>
    <p><span>&copy; <?php echo "Copyright, $author, $year"; ?></span>
        <br>
        <a href="http://techprof.ca/courses/INFT1206/">Course Website</a>
        <strong>|</strong>
        <a href="../index.html">Home</a>
    </p>
</footer>