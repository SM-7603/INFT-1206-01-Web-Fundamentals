<!DOCTYPE html>
<!--  
    - File name: index.php
    - Name/Author: Shubham Mohanty
    - Date (created): August 10th, 2023
    - Description: Index file for Lab11 - Multiple Choice Quiz
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
            <h2>Multiple Choice Quiz</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                <?php
                // Establish database connection
                $connection = db_connect();
            
                // Retrieve quiz questions from the database
                $query = "SELECT * FROM quiz";
                $quizResults = pg_query($connection, $query);

                $questionNumber = 1;
                while ($quizRow = pg_fetch_assoc($quizResults)) {
                    $qID = $quizRow["qid"];
                    $questionText = $quizRow["questiontext"];
                    $answerA = $quizRow["answera"];
                    $answerB = $quizRow["answerb"];
                    $answerC = $quizRow["answerc"];
                    $answerD = $quizRow["answerd"];

                    // Display each question as a fieldset
                    echo "<fieldset>";
                        echo "<legend>Question $questionNumber: $questionText</legend>";
                        echo "<ol style='list-style-type: lower-alpha;'>";
                            echo "<li><input type='radio' name='q$qID' value='A'>$answerA</li>";
                            echo "<li><input type='radio' name='q$qID' value='B'>$answerB</li>";
                            echo "<li><input type='radio' name='q$qID' value='C'>$answerC</li>";
                            echo "<li><input type='radio' name='q$qID' value='D'>$answerD</li>";
                        echo "</ol>";
                    echo "</fieldset>";

                    $questionNumber++;
                }
                ?>
                <input type="submit" value="Submit Quiz">
            </form>

            <?php
            // Process submitted quiz
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $score = 0;

                // Loop through submitted answers and compare with correct answers
                pg_result_seek($quizResults, 0); // Reset result set pointer
                while ($quizRow = pg_fetch_assoc($quizResults)) {
                    $qID = $quizRow["qid"];
                    $correctAnswer = $quizRow["answer"];
                    $submittedAnswer = $_POST["q$qID"] ?? ""; // Handle empty answers

                    if ($submittedAnswer === $correctAnswer) {
                        $score++;
                    }
                }
                // decreasing the value of $questionNumber by 1, since the while loop increased it by an extra
                $questionNumber--;

                echo "<h3>Your Quiz Score: $score / $questionNumber</h3>";
            }
            ?>
        </section>
    </main>
    <?php require("../includes/footer.php"); ?>
</body>
</html>
