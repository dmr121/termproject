<!DOCTYPE html>
<html lang = 'en' id="variables">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/lessons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>

    </script>
    <title> Variables </title>
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

        if ($answer1 == "D") { $score++; }
        if ($answer2 == "C") { $score++; }
        if ($answer3 == "D") { $score++; }
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
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, -1, -1, 1, -1)");
        } else {
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, -1, -1, 0, -1)");
        }
      }
    ?>
    <div id = "menuBar" class = "container-fluid">
      <div id = "menuSpans" class = "row">
        <div class = "col-lg-7"></div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="../index.html"><div id = "menuButton">Home</div></a>
        </div>
        <div id = "menuButton" class = "col-lg-1" style="cursor:default;"><span>Lessons</span>
          <div id = "dropdown">
            <a href="variables.php"><div>Variables</div></a>
            <a href="arrays.php"><div>Arrays</div></a>
            <a href="conditionals.php"><div>If/Else</div></a>
            <a href="switches.php"><div>Switches</div></a>
            <a href="forloops.php"><div>For Loops</div></a>
            <a href="whileloops.html"><div>While Loops</div></a>
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
        <h1 id = "title"> Variables </h1>
        <h2 id = "subtitle"> Math with Words <?php 
          if (isset($_POST['submit_'])){
            echo "<span style='color:orange'>| Quiz Result: $score / 5</span>";
          }
        ?></h2>
      </div>
      <hr id = "line"></hr>
      </br> </br>
      <div id = "paragraphs" class = "container">
        <p> Variables are really useful for holding information under a different name.
        Say you need to make frequent calculations with pi, or <code>3.14</code>. It would be kind of
        annoying to have to remember for each calculation to use <code>3.14</code> for the value of pi.
        What if this value changes or you need more accuracy, so you use <code>3.14159</code> instead.
        It would be extremely tedious to change every instance of <code>3.14</code> to <code>3.14159</code> in your
        code. What if you have made this calculation hundreds of times in your program,
        so when you need to make a change, you have to change each of the hundreds of
        instances of <code>3.14</code> to <code>3.14159</code>.</p>
        <p> Work smarter, not harder. Use variables instead. </p>
        <p> Instead of changing each instance of pi individually, wouldn't it be nice to
        be able to change all instances of pi with one line of code? Well it's easy. Set the
        variable pi to your specified number:</p>
        <p style="color:var(--accent-color)">Example:</br>
          <kbd>float pi = 3.14; </br>
          cout << 2 * 2 * pi;   // Prints 12.56</br>
          pi = 3.14159;  // Change the value of pi to be more precise</br>
          cout << 2 * 2 * pi;   // Prints 12.56636</kbd></p>
        <p> All we had to do was change the value of the variable to change all
        instances of it further down without changing each <code>pi</code> individually.
        This consolidates the coding process.</p>
        <p> Using variables also helps to set a number that your human mind can recognize
        easily.</p>
        <p style="color:var(--accent-color)">For example:</br><kbd>int numberOfFlowers = 6;</br>
           float pricePerFlower = 1.23;</br>
           float totalPrice = numberOfFlowers * pricePerFlower;</br>
           cout << totalPrice;   // Prints 7.38</kbd></p>
        <p> Notice that because we named the variable something personal, we can easily
        tell what it represents. <code>numberOfFlowers</code> obviously stands for the
        number of flowers. It would have made little sense to name it something
        impersonal like <code>x</code> or even <code>flowers</code>. These aren't
        good variable names because they are very ambiguous.
        <p style="color:var(--accent-color);font-size:30"> C++ Variables </p>
        <p><ul>
          <li><code>bool</code> - can be either true or false</li>
          <li><code>char</code> - one byte</li>
          <li><code>int</code> - integer </li>
          <li><code>float</code> - number with decimal points</li>
          <li><code>double</code> - even more decimal precision than a float</li>
          <li><code>void</code> - represents the absence of a type</li></ul>
        </p>
      </div>
      <div id = "line"></div>
      <div class="container">
        <h1 id="activityTitle">Test Yourself</h1>
        <form action="variables.php" method="post" id="quiz">
          <li>
            <h3>What is the value of the variable <code>pickle</code>? </h3><!--Question1-->
            <img src="../images/pickles.png" style="margin: 4px 0 10px 0;"/>
            <div>
                <input type="radio" name="question1" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) 5</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) 6</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) 11</font></label>
            </div>
            <div>
                <input type="radio" name="question1" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) 30</font></label>
            </div>
        </li>
        <li>
            <h3>Which is the most descriptive variable name?</h3><!--Question2-->
            <div>
                <input type="radio" name="question2" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) bankAccount </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) money </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) USDinCheckingAccount </font></label>
            </div>
            <div>
                <input type="radio" name="question2" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) dollars </font></label>
            </div>
        </li>
        <li>
            <h3>When should you use a variable over a plain literal (pi vs. 3.14)?</h3><!--Question3-->
            <div>
                <input type="radio" name="question3" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) When it might change </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) If there are many instances of it </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) When it is a very long value </font></label>
            </div>
            <div>
                <input type="radio" name="question3" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) All of the above </font></label>
            </div>
        </li>
        <li>
            <h3>Which variable listed above can have the value of only either 1 or 0?</h3><!--Question4-->
            <div>
                <input type="radio" name="question4" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) double </font></label>
            </div>
            <div>
                <input type="radio" name="question4" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) bool </font></label>
            </div>
            <div>
                <input type="radio" name="question4" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) float </font></label>
            </div>
            <div>
                <input type="radio" name="question4" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) int </font></label>
            </div>
        </li>
        <li>
            <h3>What is the value of <code>myString?</h3><!--Question5-->
              <img src="../images/stringExample.png" style="margin: 4px 0 10px 0;"/>
            <div>
                <input type="radio" name="question5" id="answerA" value="A" />
                <label for="answerA"> <font color="#95e7f3">A) hello world! </font></label>
            </div>
            <div>
                <input type="radio" name="question5" id="answerB" value="B" />
                <label for="answerB"> <font color="#95e7f3">B) hello </font></label>
            </div>
            <div>
                <input type="radio" name="question5" id="answerC" value="C" />
                <label for="answerC"> <font color="#95e7f3">C) world </font></label>
            </div>
            <div>
                <input type="radio" name="question5" id="answerD" value="D" />
                <label for="answerD"> <font color="#95e7f3">D) ! </font></label>
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
          <a href="../index.html">
            <div id="previousLesson" style="float: left;">Back to Home</div>
          </a>
        </div>
        <div class="col"> <!-- Page forward button -->
          <a href="arrays.php">
            <div id="nextLesson" style="float: right;">Next Lesson</div>
          </a>
        </div>
      </div> <!-- End of page change buttons -->
    </div>
  </body>
</html>
