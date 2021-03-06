<!DOCTYPE html>
<html lang = 'en' id="switches">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/lessons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>

    </script>
    <title> Switch Statements. </title>
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
        if ($answer3 == "A") { $score++; }
        if ($answer4 == "B") { $score++; }
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
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, 1, -1, -1, -1, -1)");
        } else {
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, 0, -1, -1, -1, -1)");
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
        <h1 id = "title"> Switches </h1>
        <h2 id = "subtitle"> Switch it Up <?php 
          if (isset($_POST['submit_'])){
            echo "<span style='color:orange'>| Quiz Result: $score / 5</span>";
          }
        ?></h2>
      </div>
      <hr id = "line"></hr>
      </br> </br>
      <div id = "paragraphs" class = "container">
        <div class="row">
          <div class="col">
            <img src="../images/tree-structure.png" id="switchImage"/>
            <!-- Image found here:
            https://www.flaticon.com/free-icon/tree-structure_3637
            -->
          </div>
          <div class="col">
            <h1>What is a Switch Statement?</h1>
            <p>
              You've already been introduced to if/else conditionals, and the
              concept of a switch statement is fairly similar. Switches test for
              conditions and, if true, execute a block of code just like if/elses
              do. If/Else statements are great, but they do have one drawback.
              What happens when you need to check for a large amount of conditions?
              This can become a staggeringly long list of if/else's.  This is where
              Switches come in handy.  A switch statement allows for a more clear
              way of writing all of these "ifs" and "elses". Furthermore, if the
              number of conditions being tested is large enough, switch statements
              actually perform better than their if/else counterparts.
            </p>
          </div>
          <div class="w-100"></div><br><br><br> <!-- Line break -->
          <div class="col">
            <h1>But Why Use Them?</h1>
            <p>
              If Switch statements do the same thing as if/else, why bother learning
              the same thing twice? While the performance boost (in some cases)
              is nice to have, one of the major benefits of switch statements
              is improved readability.  Take the example of if/else's shown here.
              While there are only five conditions shown, imagine how confusing it
              might be to have several more with far more complicated conditions!
              Thus, switch statements are best used to improve the work conditions
              of the programmer, by improving readability.  This variety of methods
              for doing the same thing is known as
              <a href="https://en.wikipedia.org/wiki/Syntactic_sugar">
                Syntactic Sugar
              </a>
              as it "makes the language 'sweeter' for human use".
            </p>
          </div>
          <div class="col">
            <img src="../images/switchCounterExample.png" id="switchCodeSnippit"
                style = "margin-left: 3%;"/>
          </div>
          <div class="w-100"></div><br><br><br> <!-- Line break -->
          <div class="col">
            <img src="../images/switchExample.png" id="switchCodeSnippit"
                 style="margin-top: 10%;"/>
          </div>
          <div class="col">
            <h1>Switch Syntax</h1>
            <p>
              Let's walk through the example switch pictured here. First, a variable
              "number" of type int is declared and initialized to 2.  Then, the switch
              statement begins. To declare a switch statement, we write switch()
              and whatever lies inside the parenthesis, in this case "number" will
              what be what is compared. If the given variable satisfies any of the
              cases, denoted "
              <code>
                case #:
              </code>
              " then the code between "
              <code>
                case #:
              </code>
              " and "
              <code>
                break;
              </code>
              " will be executed, and the rest of the switch cases will be ignored.
              In this example, if number is equal to 1, 2, 3, or 4, then it will
              satisfy those cases. "
              <code>
                default:
              </code>
              " denotes an instance in which none of the other cases were satisfied
              much like the last "else" of an if/else.  Notice the use of colins
              at the beginning of each case, and the "
              <code>
                break;
              </code>
              " after each case.  You can think of these like curly brackets for
              a block of code to be executed. Without the breaks, if case 1 was
              satisfied, the code for case 1, 2, 3, 4, and default would all be
              executed.  This could, however, be desired behavior in some cases
              (another advantage of switch statements).
            </p>
          </div>
        </div>
      </div>
    </br></br></br>
    <hr id = "line"></hr>
    <div class="container">
      <h1 id="activityTitle">Test Yourself</h1>
      <form action="switches.php" method="post" id="quiz">
        <li>
          <h3>What is the concept of Syntactic Sugar?</h3><!--Question1-->
          <div>
              <input type="radio" name="question1" id="answerA" value="A" />
              <label for="answerA"> <font color="#95e7f3">A) It makes your code taste better</font></label>
          </div>
          <div>
              <input type="radio" name="question1" id="answerB" value="B" />
              <label for="answerB"> <font color="#95e7f3">B) It is necessary for programming</font></label>
          </div>
          <div>
              <input type="radio" name="question1" id="answerC" value="C" />
              <label for="answerC"> <font color="#95e7f3">C) It's syntax that makes your code easier to read</font></label>
          </div>
          <div>
              <input type="radio" name="question1" id="answerD" value="D" />
              <label for="answerD"> <font color="#95e7f3">D) None of the above</font></label>
          </div>
      </li>
      <li>
          <h3>What does the variable myVar represent?</h3><!--Question2-->
          <img src="../images/switchQ2.png" style="margin: 4px 0 10px 0;"/>
          <div>
              <input type="radio" name="question2" id="answerA" value="A"/>
              <label for="answerA"> <font color="#95e7f3">A) It represents the test case </font></label>
          </div>
          <div>
              <input type="radio" name="question2" id="answerB" value="B" />
              <label for="answerB"> <font color="#95e7f3">B) It signals when to break </font></label>
          </div>
          <div>
              <input type="radio" name="question2" id="answerC" value="C" />
              <label for="answerC"> <font color="#95e7f3">C) Both A and B </font></label>
          </div>
          <div>
              <input type="radio" name="question2" id="answerD" value="D" />
              <label for="answerD"> <font color="#95e7f3">D) Neither A nor B </font></label>
          </div>
      </li>
      <li>
          <h3>In some cases, Switch statements are more efficient than If/Else</h3><!--Question3-->
          <div>
              <input type="radio" name="question3" id="answerA" value="A"/>
              <label for="answerA"> <font color="#95e7f3">A) True </font></label>
          </div>
          <div>
              <input type="radio" name="question3" id="answerB" value="B" />
              <label for="answerB"> <font color="#95e7f3">B) False </font></label>
          </div>
      </li>
      <li>
          <h3>"Break"s are required after each case.</h3><!--Question4-->
          <div>
              <input type="radio" name="question4" id="answerA" value="A" />
              <label for="answerA"> <font color="#95e7f3">A) True </font></label>
          </div>
          <div>
              <input type="radio" name="question4" id="answerB" value="B" />
              <label for="answerB"> <font color="#95e7f3">B) False, though multiple cases might be run  </font></label>
          </div>
          <div>
              <input type="radio" name="question4" id="answerC" value="C" />
              <label for="answerC"> <font color="#95e7f3">C) False, they make no difference </font></label>
          </div>
      </li>
      <li>
          <h3>Comparing switch statements to if/else..</h3><!--Question5-->
          <div>
              <input type="radio" name="question5" id="answerA" value="A" />
              <label for="answerA"> <font color="#95e7f3">A) They accomplish the same task </font></label>
          </div>
          <div>
              <input type="radio" name="question5" id="answerB" value="B" />
              <label for="answerB"> <font color="#95e7f3">B) Choosing one over the other is up to the individual programmer </font></label>
          </div>
          <div>
              <input type="radio" name="question5" id="answerC" value="C" />
              <label for="answerC"> <font color="#95e7f3">C) Both can have any number of conditionals/cases </font></label>
          </div>
          <div>
              <input type="radio" name="question5" id="answerD" value="D" />
              <label for="answerD"> <font color="#95e7f3">D) All of the above </font></label>
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
        <a href="conditionals.php">
          <div id="previousLesson" style="float: left;">Previous Lesson</div>
        </a>
      </div>
      <div class="col"> <!-- Page forward button -->
        <a href="forloops.php">
          <div id="nextLesson" style="float: right;">Next Lesson</div>
        </a>
      </div>
    </div> <!-- End of page change buttons -->
    <br><br><br>
  </div>
</body>
</html>
