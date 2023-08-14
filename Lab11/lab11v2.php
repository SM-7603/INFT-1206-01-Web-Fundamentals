<!DOCTYPE html>
<!--  
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): August 10th, 2023
    - Description: Index file for Lab11v2 - Multiple Choice Quiz with User-Submitted Questions
-->
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/mohantys.css">
    <?php require("../includes/head.php"); ?>
</head>
<body>
    <?php require("../includes/header.php"); ?>
    <main>
        <section>
            <h2>Submit a Question</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <label for="questionText">Question Text:</label>
                <input type="text" id="questionText" name="questionText" required>
                <br>
                <label for="answerA">Answer A:</label>
                <input type="text" id="answerA" name="answerA" required>
                <br>
                <label for="answerB">Answer B:</label>
                <input type="text" id="answerB" name="answerB" required>
                <br>
                <label for="answerC">Answer C:</label>
                <input type="text" id="answerC" name="answerC">
                <br>
                <label for="answerD">Answer D:</label>
                <input type="text" id="answerD" name="answerD">
                <br>
                <label for="correctAnswer">Correct Answer (A, B, C, or D):</label>
                <input type="text" id="correctAnswer" name="correctAnswer" required>
                <br>
                <input type="submit" value="Submit Question">
            </form>
            
            <?php
            // Process submitted question
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $questionText = $_POST["questionText"];
                $answerA = $_POST["answerA"];
                $answerB = $_POST["answerB"];
                $answerC = $_POST["answerC"];
                $answerD = $_POST["answerD"];
                $correctAnswer = $_POST["correctAnswer"];

                // Establish database connection
                $connection = db_connect();

                // Insert the new question into the quiz table
                $insertQuery = "INSERT INTO quiz (questiontext, answera, answerb, answerc, answerd, answer)
                                VALUES ('$questionText', '$answerA', '$answerB', '$answerC', '$answerD', '$correctAnswer')";
                $insertResult = pg_query($connection, $insertQuery);

                if ($insertResult) {
                    echo "<p>Question submitted successfully!</p>";
                } else {
                    echo "<p>Error submitting question. Please try again.</p>";
                }
            }
            ?>
        </section>
    </main>
    <?php require("../includes/footer.php"); ?>
</body>
</html>
