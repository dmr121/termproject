<!DOCTYPE html>
<html lang = 'en' id="forloops">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/lessons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> For Loops </title>
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

        if ($answer1 == "B") { $score++; }
        if ($answer2 == "C") { $score++; }
        if ($answer3 == "B") { $score++; }
        if ($answer4 == "A") { $score++; }
        if ($answer5 == "D") { $score++; }

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
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, 1, -1, -1, -1)");
        } else {
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, 1, 0, -1, -1, -1)");
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
        <h1 id = "title"> For Loops </h1>
          <h2 id = "subtitle"> Make Your Life Easier <?php 
          if (isset($_POST['submit_'])){
            echo "<span style='color:orange'>| Quiz Result: $score / 5</span>";
          }
        ?></h2>
      </div>
      <hr id = "line"></hr>
      </br></br>
      <div id = "paragraphs" class = "container">
        <div class="row">
          <div class="col">
            <h1>What is a For Loop?</h1>
            <p>
              A "for loop" does what it sounds like: it loops <i>for</i> a
              specified number of iterations. This can be useful for better
              automating your code. Upon each iteration of the for loop, the
              inner contents are run, though it is possible to manipulate each
              iteration. This per-iteration-manipulation will become more apparent
              when we see just how this loop works.
            </p>
          </div>
          <div class="col">
            <img src="../images/update-arrows.png" id="loop"/>
            <!-- Image can be found here:
            https://www.flaticon.com/free-icon/update-arrows_66934#term=loop&page=1&position=2
            -->
          </div>
          <div class="w-100"></div><br><br><br> <!-- Line break -->
          <div class="col">
            <img src="../images/forloopExample.png" id="forLoopCodeSnippit"/>
          </div>
          <div class="col">
            <h1>For Loop Syntax</h1>
            <p>
              Pictured is an example of a for loop delared in C++.  There are
              three distinct parts to the for loop, each seperated by semicolons.
              The first declares a new variable "i" and assigns it a value of 1.
              The name of this variable "i" is arbitrary, but most commonly,
              programmers use the letter "i" (though you can choose any name).
              The second declares the <i>"for"</i> part of the for loop.  In this
              case, the loop will run so long as the variable "i" is less than 6.
              Also note that the number "6" can be replaced with a variable,
              making your code much more portable in the future. The last case
              declares what will happen to our variable "i" at the end of each
              iteration. In this example, at the end of each iteration "i" will
              be incremented by 1.
            </p>
            <p>
              As for what happens during each iteration, we must look to what is
              included inside the subsequent "block" of code (encapsulated by
              curly brackets).  In this case, we will output "i" and a space for
              every time this loop runs.
            </p>
            </p>
              Giving us a final output of
            </p>
            <span style="font-size: 20px;">1 2 3 4 5</span>
          </div>
        </div>
      </div>
      </br></br></br>
      <hr id = "line"></hr>
      <div class="container">
        <h1 id="activityTitle">Test Yourself</h1>
        <form action="forloops.php" method="post" id="quiz">
          <li>
            <h3>The three distinct parts of a forloop declaration are separated by: </h3><!--Question1-->
            <div>
                <input type="radio" name="question1" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) Commas ( , )</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) Semicolons ( ; )</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) Periods ( . )</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) Colons ( : )</font></label>
            </div>
        </li>
        <li>
            <h3>What is wrong with this forloop declaration?</h3><!--Question2-->
            <img src="../images/forloopQ2.png" style="margin: 4px 0 10px 0;"/>
            <div>
                <input type="radio" name="question2" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) It uses improper syntax </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) Its three sections are backwards </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) It will loop indefinitely  </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) Nothing is wrong with this forloop </font></label>
            </div>
        </li>
        <li>
            <h3>How many times will this for loop run?</h3><!--Question3-->
            <img src="../images/forloopQ3.png" style="margin: 4px 0 10px 0;"/>
            <div>
                <input type="radio" name="question3" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) 3 times </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) 4 times </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) 5 times </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) 6 times </font></label>
            </div>
        </li>
        <li>
            <h3>What is the most common variable name used in the for loop structure?</h3><!--Question4-->
            <div>
                <input type="radio" name="question4" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) " i " </font></label>
            </div>
            <div>
                <input type="radio" name="question4" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) " x " </font></label>
            </div>
            <div>
                <input type="radio" name="question4" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) " y " </font></label>
            </div>
            <div>
                <input type="radio" name="question4" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) " z " </font></label>
            </div>
        </li>
        <li>
            <h3>What will be the output of this forloop?</h3><!--Question5-->
            <img src="../images/forloopQ5.png" style="margin: 4px 0 10px 0;"/>
            <div>
                <input type="radio" name="question5" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) Hello World </font></label>
            </div>
            <div>
                <input type="radio" name="question5" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) 3 2 1 </font></label>
            </div>
            <div>
                <input type="radio" name="question5" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) 1 2 3 </font></label>
            </div>
            <div>
                <input type="radio" name="question5" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) 0 1 2 3 </font></label>
            </div>
        </li>
        <br>
        <input type="submit" name="submit_" value="Submit Quiz" class="submitButton"/>
        <br><br>
        </form>
      </div>
      <hr id = "line"></hr>
      <!-- Page change buttons -->
      <div class="row">
        <div class="col"> <!-- Page back button -->
          <a href="switches.php">
            <div id="previousLesson" style="float: left;">Previous Lesson</div>
          </a>
        </div>
        <div class="col"> <!-- Page forward button -->
          <a href="whileloops.php">
            <div id="nextLesson" style="float: right;">Next Lesson</div>
          </a>
        </div>
      </div> <!-- End of page change buttons -->
      <br><br><br>
    </div>
  </body>
</html>
