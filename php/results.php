<?php

    $answer1 = $_POST['question1'];
    $answer2 = $_POST['question2'];
    $answer3 = $_POST['question3'];
    $answer4 = $_POST['question4'];
    $answer5 = $_POST['question5'];

    $totalScore = 0;
    // This could be reusable across all pages starting here if we determine
    // the correct answer on a per-page basis 

    if ($answer1 == "B") { $totalScore++; }
    if ($answer2 == "A") { $totalScore++; }
    if ($answer3 == "C") { $totalScore++; }
    if ($answer4 == "D") { $totalScore++; }
    if ($answer5) { $totalScore++; }

    echo "<div id='results'>$totalScore / 5 correct</div>";
?>
