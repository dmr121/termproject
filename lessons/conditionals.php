<!DOCTYPE html>
<html lang = 'en' id="conditionals">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/lessons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>

    </script>
    <title> Conditionals </title>
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

        $score = 0;

        if ($answer1 == "B") { $score++; }
        if ($answer2 == "B") { $score++; }
        if ($answer3 == "C") { $score++; }
        if ($answer4 == "D") { $score++; }

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

        if ($score == 4) {
          mysqli_query($db, "INSERT INTO Minigames VALUES (1, -1, -1, -1, -1, -1)");
        } else {
          mysqli_query($db, "INSERT INTO Minigames VALUES (0, -1, -1, -1, -1, -1)");
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
        <h1 id = "title"> If/Else </h1>
          <h2 id = "subtitle"> Are Conditional Statements <?php 
          if (isset($_POST['submit_'])){
            echo "<span style='color:orange'>| Quiz Result: $score / 4</span>";
          }
        ?></h2>
      </div>
      <hr id = "line"></hr>
      </br></br>
      <div id = "paragraphs" class = "container">
        <div class="row">
          <div class="col">
            <h1>What is an If/Else statement?</h1>
            <p>
              	The If/Else statement is a way of decision making
              	in C++. It evaluates if an expression is true or
              	not and then picks one of two paths afterwards.
              	It's the equivalent of coming to a fork in the
              	road. When you arrive at the fork in the road,
              	 you are given two options. Lets say the way
              	 that you usually travel is closed for some
              	 reason. Now you have to take a different route.
              	  This is the same this as when a program comes
              	  to an If/Else statement. Below is the basic logic
              	   of an If/Else statement:
            </p>
            <p>
            	<code>if (a certain condition is met)<br>
            		-- then execute this statement<br>
            		otherwise<br>
            		-- execute this statement</code>
            </p>
            <p>
            	Now the only difference is that we type:
            	<code>else</code> instead of <code>otherwise</code>
            	when we use it in a C++ program. This is why it
            	is called an If/Else statement.
            </p>
          </div>

          <div class="w-100
          "></div><br><br><br> <!-- Line break -->
          <div class="col">
		  <br><br><br><br><br><br><br><br><br><br>
            <img src="../images/promise.png" id=""/>
			<!-- Image can be found here:

            -->
          </div>
          <div class="col">
          	<br><br><br>
            <h1>If/Else Syntax</h1>
            <p>
              To create an If/Else statement, we use this syntax:</p>
		  <div class="col">
            <img src="../images/conditional.png" id="conditional"/>
          </div>
          <br><br>
          <p>
            In the case above, the If/Else statement would produce
             the cout statement of:</p>
             <p><img src="../images/conditional2.png" id="conditional2"/> </p>
             <p>because when the condition of:</p>
             <p><img src="../images/conditional3.png" id="conditional3"/> </p>
             was not met, the expression below it was not executed. However,
              the expression below the <img src="../images/conditional4.png" id="conditional4"/> statement was.
          </p>


        </div>
      </div>
      </br></br></br>
      <hr id = "line"></hr>
      <div class="container">
        <h1 id="activityTitle">Test Yourself</h1>
      </div>
<form action="conditionals.php" method="post" id="quiz">
  <br><br>
  <li>

    <h3>When is the best time to use an If/Else Statement?</h3><br>

    <div>
        <input type="radio" name="question1" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) When you only have one task to complete, such as output something to the console.</font></label>
    </div>

    <div>
        <input type="radio" name="question1" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) When you have more than one task to complete and a decision must be made.</font></label>
    </div>

    <div>
        <input type="radio" name="question1" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) When using any type of array.</font></label>
    </div>

    <div>
        <input type="radio" name="question1" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) When you are not certain if a variable is set correctly or not.</font></label>
    </div><br>

</li>

<li>

    <h3>What is the correct syntax for creating an if statement?</h3><br>

    <div>
        <input type="radio" name="question2" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) <img src="../images/conAnswer1.png" id="conAsnwer1"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question2" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) <img src="../images/conAnswer2.png" id="conAnswer2"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question2" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) <img src="../images/conAnswer3.png" id="conAnswer3"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question2" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) <img src="../images/conAnswer4.png" id="conAnswer4"/> </font></label>
    </div><br>

</li>

<li>

    <h3>What will be the output of this If/Else statement?</h3><br>
    <p><img src="../images/conStatement.png" id=""/></p>

    <div>
        <input type="radio" name="question3" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) Merry Christmas </font></label>
    </div>

    <div>
        <input type="radio" name="question3" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) Merry Christmas! </font></label>
    </div>

    <div>
        <input type="radio" name="question3" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) Happy Birthday! </font></label>
    </div>

    <div>
        <input type="radio" name="question3" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) Happy Birthday </font></label>
    </div><br>

</li>

<li>

    <h3>If statements do not utilize the else feature unless a certain what is met?</h3><br>

    <div>
        <input type="radio" name="question4" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) Top score</font></label>
    </div>

    <div>
        <input type="radio" name="question4" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) While Statement</font></label>
    </div>

    <div>
        <input type="radio" name="question4" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) For Loop</font></label>
    </div>

    <div>
        <input type="radio" name="question4" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) Condition</font></label>
    </div><br>

</li>
<br>
<input type="submit" name ="submit_" value="Submit Quiz" class="submitButton"/>
</form>
<br>

    <hr id = "line"></hr>
    <div class="container">
        <!-- Page change buttons -->
        <div class="row">
          <div class="col"> <!-- Page back button -->
            <a href="arrays.php">
              <div id="previousLesson" style="float: left;">Previous Lesson</div>
            </a>
          </div>
          <div class="col"> <!-- Page forward button -->
            <a href="switches.php">
              <div id="nextLesson" style="float: right;">Next Lesson</div>
            </a>
          </div>
        </div> <!-- End of page change buttons -->
      <div class="container">
      </div>
    </div>
  </body>
</html>
