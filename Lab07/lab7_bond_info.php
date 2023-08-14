<!DOCTYPE html>
<!-- 
    - File name: lab7_bond_info.php
    - Name/Author: Shubham Mohanty
    - Date (created): July 14th, 2023
    - Description: This lab is where we encounter a database for the 1st time, here we connect to it via Putty & then execute the SQL scripts on the server. So that we could populate the tables with data, this combines the stuff we learned in databases in semester 1 to the stuff we've already done till lab06.
-->
    <?php
        $author = "Shubham Mohanty";
        $title = "Lab 7 - Part 1 - Bond Movie Trivia";
    ?>
<html lang="en">

    <?php include("head.php"); ?>

    <body>

        <?php include("header.php"); ?>

        <!-- <p>
            This page utilizes several PostgreSQL method calls, such as pg_connect(),
            pg_query(), and pg_fetch_result().
        </p> -->
        <!-- setup the table -->
        <table>
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Year</th>
                    <th>Actor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $output = ""; // Set up a variable to store the output of the loop

                    // Connect to the database
                    $conn = pg_connect("host=127.0.0.1 dbname=mohantys_db user=mohantys password=100898560");
                    // N.B. replace the YOUR variables with your specific information
                    // NOTE: "host=localhost..." SHOULD work, but if there is a problem with the config on opentech, use 127.0.0.1 instead

                    // Issue the query (This is how you should do this)
                    $sql = "SELECT movies.title, movies.year, actors.name
                            FROM movies
                            JOIN actors ON movies.actor = actors.id
                            ORDER BY movies.year ASC";

                    // Execute the query
                    $result = pg_query($conn, $sql);
                    $records = pg_num_rows($result);

                    // Generate the table
                    for ($i = 0; $i < $records; $i++) {
                        // Loop through all of the retrieved records and add them to the output variable
                        $output .= "\n\t<tr>\n\t\t<td>" . pg_fetch_result($result, $i, "title") . "</td>";
                        $output .= "\n\t\t<td>" . pg_fetch_result($result, $i, "year") . "</td>";
                        $output .= "\n\t\t<td>" . pg_fetch_result($result, $i, "name") . "</td>\n\t</tr>";
                    }

                    echo $output; // Display the output
                ?>
            </tbody>
        </table>
        <!-- end the table -->
        <?php include("footer.php"); ?>
    </body>

</html>