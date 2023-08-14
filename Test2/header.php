<!-- 
    - File name: header.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 6th, 2023
    - Description: header for Test2
-->

<?php 
    $year = date("Y");
    $name = "Shubham";
?>

<header>

    <h1>Test 2</h1>
    <h2><?php echo $name; ?></h2>
    <h2><?php echo $year; ?></h2>

</header>
