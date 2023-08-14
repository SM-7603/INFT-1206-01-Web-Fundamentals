<!-- 
    - File name: functions.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 26th, 2023
    - Description: Shared functions to be used for labs after Lab9
-->


<?php

    // function 1 -> to connect to the database...
    function db_connect() {
        // Enter the proper entries
        $connection = pg_connect("host=127.0.0.1 dbname=mohantys_db user=mohantys password=100898560");
        return $connection;
    }

    // function 2 -> to display the copyright info...
    function display_copyright_information() {
        $year = date('y');
        $author = "Shubham Mohanty";
        echo "&copy; $year - $author";
    }
?>