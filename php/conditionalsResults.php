<?php

    $answer1 = $_POST['question1'];
    $answer2 = $_POST['question2'];
    $answer3 = $_POST['question3'];
    $answer4 = $_POST['question4'];

    $score = 0;

    if ($answer1 == "B") { $score++; }
    if ($answer2 == "B") { $score++; }
    if ($answer3 == "C") { $score++; }
    if ($answer4 == "D") { $score++; }

    echo "<div id='results'>$score / 4 correct</div>";

?>