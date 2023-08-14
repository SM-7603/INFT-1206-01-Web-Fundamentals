<!DOCTYPE html>
<!-- 
    - File name: lab4.html
    - Name/Author: Shubham Mohanty
    - Date (created): June 8th, 2023
    - Date (last edited): June 9th, 2023
    - Description: This is the improved version of lab2
-->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab-04 - Part 1</title>
    <link rel="stylesheet" href="css/lab4.css">
    <!-- Font -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Noticia+Text&display=swap");
    </style>


    <?php
        $tableEntries = array(
            "Java" => "OOP - 01 (Java)",
            "webDev" => "Web Dev - Fundamentals",
            "business" => "Business for IT",
            "systemsDev" => "Systems Dev - 01",
            "softwareTestingPython" => "Software Testing - Automation (Python)",
            "maps" => "Maps (GNED: online)",
            "Job" => "Work",
            "selfStudy" => "Self Study"
        );

        $classNames = array(
            "className0" => "Java",
            "className1" => "webDev",
            "className2" => "business",
            "className3" => "systemsDev",
            "className4" => "softwareTestingPython",
            "className5" => "maps",
            "className6" => "Job",
            "className7" => "selfStudy"
        );
    ?>

</head>

<body>
    <header>
        <div id="header">
            <div>INFT-1206 - Lab4 - Part 1</div>
        </div>
    </header>
    <main>
        <div id="mainContainer">
            <h3 id="tableTitle">My Schedule</h3>
            <br>
            <table id="scheduleTable">

                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Sunday</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8:00</td>
                        <td></td>
                        <td></td>
                        <td rowspan="2" class="<?php echo $classNames["className7"] ?>"><?php echo $tableEntries[$classNames["className7"]]; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>10:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="2" class="<?php echo $classNames["className0"] ?>"><?php echo $tableEntries[$classNames["className0"]]; ?></td>

                        <td></td>
                    </tr>
                    <tr>
                        <td>11:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="6" class="<?php echo $classNames["className6"] ?>"><?php echo $tableEntries[$classNames["className6"]]; ?></td>
                    </tr>
                    <tr>
                        <td>12:00</td>
                        <td rowspan="6" class="<?php echo $classNames["className6"] ?>"><?php echo $tableEntries[$classNames["className6"]]; ?></td>
                        <td rowspan="2" class="<?php echo $classNames["className1"] ?>">
                            <?php echo $tableEntries[$classNames["className1"]]; ?>
                        </td>
                        <td></td>
                        <td rowspan="2" class="<?php echo $classNames["className1"] ?>">
                            <?php echo $tableEntries[$classNames["className1"]]; ?>
                        </td>
                        <td rowspan="2" class="<?php echo $classNames["className0"] ?>"><?php echo $tableEntries[$classNames["className0"]]; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13:00</td>
                        <td rowspan="2" class="<?php echo $classNames["className2"] ?>">
                            <?php echo $tableEntries[$classNames["className2"]]; ?>
                        </td>
                        <td class="<?php echo $classNames["className5"] ?>"><?php echo $tableEntries[$classNames["className5"]]; ?></td>
                    </tr>
                    <tr>
                        <td>14:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>15:00</td>
                        <td rowspan="3" class="<?php echo $classNames["className7"] ?>"><?php echo $tableEntries[$classNames["className7"]]; ?></td>
                        <td rowspan="2" class="<?php echo $classNames["className3"] ?>">
                            <?php echo $tableEntries[$classNames["className3"]]; ?>
                        </td>
                        <td></td>
                        <td class="<?php echo $classNames["className3"] ?>">
                            <?php echo $tableEntries[$classNames["className3"]]; ?> (online)
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>16:00</td>

                        <td rowspan="2" class="<?php echo $classNames["className0"] ?>"><?php echo $tableEntries[$classNames["className0"]]; ?></td>
                        <td></td>
                        <td rowspan="2" class="<?php echo $classNames["className4"] ?>">
                            <?php echo $tableEntries[$classNames["className4"]]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>17:00</td>
                        <td></td>
                        <td rowspan="2" class="<?php echo $classNames["className4"] ?>">
                            <?php echo $tableEntries[$classNames["className4"]]; ?>
                        </td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>18:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="3" class="<?php echo $classNames["className7"] ?>"><?php echo $tableEntries[$classNames["className7"]]; ?></td>
                    </tr>
                    <tr>
                        <td>19:00</td>
                        <td></td>
                        <td></td>
                        <td rowspan="3" class="<?php echo $classNames["className7"] ?>"><?php echo $tableEntries[$classNames["className7"]]; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>20:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>


                    </tr>
                    <tr>
                        <td>21:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                </tbody>

            </table>
        </div>
    </main>
    <footer>
        <div id="footer">
            <hr>
            <br>
            <div>
                &copy; Copyright, All Rights Reserved 2023 - Shubham Mohanty
            </div>
            <br>
            <a href="../index.html">Personal Homepage</a>
            <strong>|</strong>
            <a href="./index.php">Lab4 (Index)</a>
            <strong>|</strong>
            <a href="./lab4.php">Lab4 (part 1)</a>
            <strong>|</strong>
            <a href="./lab4b.php">Lab4 (part 2)</a>
        </div>
    </footer>
</body>

</html>