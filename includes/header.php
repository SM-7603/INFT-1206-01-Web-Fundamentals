<!-- 
    - File name: header.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 26th, 2023
    - Description: content for the header for lab6
-->

<?php
    $author = "Shubham Mohanty";
    $title = "$author - INFT - 1206-04";
?>


<!-- the whole thing will be a flex container -->
<header>

<!-- this is Row 1 -->
    <h1><?php echo $title; ?></h1>

<!-- this is Row 2 -->
    <nav>
        <a href="../Lab06/" target="_blank">Lab - 06</a>
        <a href="../Lab07/lab7_bond_info.php" target="_blank">Lab - 07 - Part 1</a>
        <a href="../Lab07/lab7_auto_info.php" target="_blank">Lab - 07 - Part 2</a>
        <a href="../Lab09/" target="_blank">Lab - 09</a>
        <a href="../Lab10/" target="_blank" id="register_link">REGISTER</a>
        <a href="../index.html" target="_blank">HomePage</a>
        <a href="http://techprof.ca/courses/INFT1206/" target="_blank">Course Website</a>
        <a href="https://durhamcollege.ca/" target="_blank">DC Website</a>
    </nav>

</header>
 