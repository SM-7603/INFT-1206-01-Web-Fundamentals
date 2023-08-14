<!DOCTYPE html>
<!-- 
    - File name: lab4b.html
    - Name/Author: Shubham Mohanty
    - Date (created): June 8th, 2023
    - Date (last edited): June 9th, 2023
    - Description: This is the actual lab, this is the base lab3 which has been broken down into sections (head, header, footer) via the help of PHP.
-->
<?php
    $author = "Shubham Mohanty";
    $pageTitle = "Lab 4 by";
?>
<html lang="en">

    <?php include("head.php"); ?>
    
    <body>

        <?php include("header.php"); ?>
    
        <section>
        <div id="MainContainer">
            <div id="lab4bMainContent">
                <h2 class="centeredHeadings">Meme Review <code>{Programming Edition}</code></h2>
                <section id="sectionOne">
                    <h3 class="centeredHeadings headingThree">Designers vs Programmers</h3>
                    <p>
                        In this meme, we see the sharp contract between designers and programmers. Designer 1 exclaims that Designer 2 and his ideas are pretty similar. However, Designer 2 (<em>obviously frustrated</em>) instantly accuses Designer 1 of stealing their idea.   
                    </p>
                    <br>
                    <p>
                        Meanwhile, in the programmer's corner, Programmer 1 admits to Programmer 2 that they indeed have stolen their code. However, Programmer 2 responds calmly, "It's not my code." 
                    </p>
                    <br>
                    <p>
                        This meme highlights the funny dynamic between programmers and designers, while designers often place higher value on originality and ownership, programmers place greater emphasis on "making it work" and acknowledge that code could be reused for efficiency & making it better via contribution - <a href="https://github.com/topics/open-source" target="_blank">Open Source</a>.
                    </p>
                    <a href="https://www.memedroid.com/memes/tag/designers+vs+programmers" target="_blank"><img src="images/placeholder_meme_01.png" alt="meme_01"></a>
                </section>
                <section id="sectionTwo">
                    <h3 class="centeredHeadings headingThree">Bug Hunt</h3>
                    <p>
                        This meme, features Gru from "Despicable Me" in a programming setting. Here, Gru encounters a bug in the program, as indicated by a test case that he wrote. However, instead of being discouraged, Gru writes even more tests to find the issue. The humour lies in fact that the Bug wasn't in the program but in the first test.
                    </p>
                    <br>
                    <p>
                        This meme showcases the tendency that a lot of programmers have, i.e. to debug extensively, going beyond the actual source of the problem (which turns out to be pretty mundane).
                    </p>
                    <a href="https://www.reddit.com/r/ProgrammerHumor/comments/ck40gn/omg_the_tests/" target="_blank"><img src="images/placeholder_meme_02.png" alt="meme_02"></a>
                </section>
                <section id="sectionThree">
                    <h3 class="centeredHeadings headingThree">Don't Fix it, if it ain't broke</h3>
                    <p>
                        In this meme, we witness a relatable scenario, that I'm pretty sure most if not all programmers have faced before, depicting a penguin that represents a program. Initially the code runs perfectly, producing the desired result. But, after the programmer cleans up the code, making it more organized and efficient, the penguin {program} declares - "Well, now I am not doing it."
                    </p>
                    <br>
                    <p>
                        This situation displays the paradox of code maintenance. While its logical to think that cleaning up the code would improve the readability and the overall longevity/quality of the program, sometimes doing so could lead to unexpected issues, causing the program to produce unexpected results or to crash entirely.
                    </p>
                    <img src="images/placeholder_meme_03.png" alt="meme_03">
                </section>

                <section id="sectionFour">
                    <h3 class="centeredHeadings headingThree">Programming Languages "Ranked" - based on "totally legit quotes"</h3>
                    <table id="placeHolderTable">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Programming Language</th>
                                <th>Funny Quote</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>JavaScript</td>
                                <td>"JavaScript: Confusing people who think it's related to Java since forever..."</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>C++</td>
                                <td>"C++: C makes it easy to shoot yourself in the foot; C++ makes it harder, but when you do it blows your whole leg off."</td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>PHP</td>
                                <td>"PHP: Programmers hate perfection."</td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Java</td>
                                <td>"Java: Write once, debug everywhere."</td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>CSS</td>
                                <td>"CSS: Making web pages look good since the '90s, or at least trying to."</td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td>HTML</td>
                                <td>"HTML: The building blocks of the web, where indentation doesn't matter but you still feel judged."</td>
                            </tr>
                        </tbody>
                    </table>
                    <p id="mySign">Shubham Mohanty</p>
                </section>
            </div>
        </div>
        </section>
    
        <?php include("footer.php") ;?>

    </body>
</html>