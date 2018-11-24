<?php

    $answer1 = $_POST['question1'];
    $answer2 = $_POST['question2'];
    $answer3 = $_POST['question3'];
    $answer4 = $_POST['question4'];
    $answer5 = $_POST['question5'];

    $score = 0;

    if ($answer1 == "C") { $score++; }
    if ($answer2 == "A") { $score++; }
    if ($answer3 == "A") { $score++; }
    if ($answer4 == "B") { $score++; }
    if ($answer5 == "D") { $score++; }

    echo "<div id='results'>$score / 5 correct</div>";

?>
