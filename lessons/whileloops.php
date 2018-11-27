<!DOCTYPE html>
<html lang = 'en' id="whileloops">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/lessons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>

    </script>
    <title> While Loops </title>
    <meta charset = 'utf-8' />
  </head>
  <body>
    <?php
      $score = 0;
      if (isset($_POST['submit_'])) {
        if (isset($_POST['question1'])) {
          $answer1 = $_POST['question1'];
        } else {
          $answer1 = " ";
        }
        if (isset($_POST['question2'])) {
          $answer2 = $_POST['question2'];
        } else {
          $answer2 = " ";
        }
        if (isset($_POST['question3'])) {
          $answer3 = $_POST['question3'];
        } else {
          $answer3 = " ";
        }
        if (isset($_POST['question4'])) {
          $answer4 = $_POST['question4'];
        } else {
          $answer4 = " ";
        }
        if (isset($_POST['question5'])) {
          $answer5 = $_POST['question5'];
        } else {
          $answer5 = " ";
        }

        $score = 0;

        if ($answer1 == "C") { $score++; }
        if ($answer2 == "A") { $score++; }
        if ($answer3 == "B") { $score++; }

        // Connect to MySQL
        $db = mysqli_connect("db1.cs.uakron.edu:3306/ISP_dmr121", "dmr121", "Watermelons12345");
            if (!$db) {
                 print "Error - Could not connect to MySQL";
                 exit;
            }

        // Select the database
        $er = mysqli_select_db($db,"ISP_dmr121");
        if (!$er) {
            print "Error - Could not select the database";
            exit;
        }

        if ($score == 5) {
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, -1, 1, -1, -1)");
        } else {
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, -1, 0, -1, -1)");
        }
      }
    ?>
    <div id = "menuBar" class = "container-fluid">
      <div id = "menuSpans" class = "row">
        <div class = "col-lg-7"></div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="../prj.html"><div id = "menuButton">Home</div></a>
        </div>
        <div id = "menuButton" class = "col-lg-1" style="cursor:default;"><span>Lessons</span>
          <div id = "dropdown">
            <a href="variables.php"><div>Variables</div></a>
            <a href="arrays.php"><div>Arrays</div></a>
            <a href="conditionals.php"><div>If/Else</div></a>
            <a href="switches.php"><div>Switches</div></a>
            <a href="forloops.php"><div>For Loops</div></a>
            <a href="whileloops.php"><div>While Loops</div></a>
            <a href="final.html"><div>Final Challenge</div></a>
          </div>
        </div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="../statistics.php"><div id = "menuButton">Statistics</div></a>
        </div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="../technical.html"><div id = "menuButton">Technical</div></a>
        </div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="../help.html"><div id = "menuButton">Help</div></a>
        </div>
      </div>
    </div>
    <div id = "mainPage" class = "container">
      <div class = "container">
        <h1 id = "title"> Do/While </h1>
        <h2 id = "subtitle"> Repetition <?php 
          if (isset($_POST['submit_'])){
            echo "<span style='color:orange'>| Quiz Result: $score / 3</span>";
          }
        ?></h2>
      </div>
      <hr id = "line"></hr>
      </br> </br>
      <div id = "paragraphs" class = "container">
        <p>
            <code>While loops</code> are kind of similar to <code>for loops</code>, but there is a key difference. <code>While loops</code> can loop for an unspecified amount of time while
            <code>for loops</code> are set up to loop until it reaches the end of a sequence.</p>
            <p>A <code>while loops</code> is basically like a repeating <code>if</code>. If a certain
            condition keeps being true, then the <code>while loop</code> will continue to execute. What's
            nice is that you may not know how many times to execute it, but the condition in the <code>
            while</code> statement handles that for you.</p>
            <p>Be careful though not to have a loop that executes infinitely. This will cause the program
            to shut down.</p>
            <p style="color:var(--accent-color)">Example:</br></p>
            <p><img src="../images/whileexample1.png"/></p>
            <p> Because the variable <code>true_or_false</code> is always set to true, the loop will execute
            infinitely until the program crashes. For this reason, there need to be some sort of condition inside
            the <code>while loop</code> the turns the variable to false so the loop will stop executing.</p>
            <p>A better while loop would be the following.</p>
            <p style="color:var(--accent-color)">Example:</br></p>
            <p><img src="../images/whileexample2.png"/></p>
            <p>Now there is a condition in the loop that states when <code>i</code> becomes 5, then we
            make <code>true_or_false</code> false. Then when the <code>while loop</code> checks the
            status of <code>true_or_false</code> again, it is false and the loop exits.
          </p>
      </div>
      <hr id="line"></hr>
      <div class="container">
        <h1 id="activityTitle">Test Yourself</h1>
        <form action="whileloops.php" method="post" id="quiz">
          <li>
            <h3>How many times does the <code> while </code> loop loop? </h3><!--Question1-->
            <img src="../images/whileExample.png" style="margin: 4px 0 10px 0;"/>
            <div>
                <input type="radio" name="question1" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) 4</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) 6</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) 5</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) 7</font></label>
            </div>
        </li>
        <li>
            <h3>What's the main difference between a <code>while</code> and a <code>for</code>?</h3><!--Question2-->
            <div>
                <input type="radio" name="question2" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) A <code>for</code> has a discernable end </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) while is faster </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) for is slower </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) for is faster </font></label>
            </div>
        </li>
        <li>
            <h3>Which variable is good for stopping <code>while</code> loops?</h3><!--Question3-->
            <div>
                <input type="radio" name="question3" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) int </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) bool </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) string </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) null </font></label>
            </div>
        </li>
        <br>
        <input type="submit" name="submit_" value="Submit Quiz" class="submitButton"/>
        <br><br>

        <hr id="line"></hr>
        </form>
      </div>
        <!-- Page change buttons -->
        <div class="row">
          <div class="col"> <!-- Page back button -->
            <a href="forloops.php">
              <div id="previousLesson" style="float: left;">Previous Lesson</div>
            </a>
          </div>
          <div class="col"> <!-- Page forward button -->
            <a href="final.html">
              <div id="nextLesson" style="float: right;">Final Challenge</div>
            </a>
          </div>
        </div> <!-- End of page change buttons -->
      </div>
  </body>
</html>
