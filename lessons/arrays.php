<!DOCTYPE html>
<html lang = 'en' id="arrays">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/lessons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Arrays </title>
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
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, -1, -1, -1, 1)");
        } else {
          mysqli_query($db, "INSERT INTO Minigames VALUES (-1, -1, -1, -1, -1, 0)");
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
        <h1 id = "title"> Arrays </h1>
          <h2 id = "subtitle"> Hold Your Data <?php 
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
            <h1>What is an array?</h1>
            <p>
              An array is a set of similar elements held together in one container.
			  Arrays save time when you want to group together similar variables.
			  They allow you to not have to define multiple variables of the same type.
			  This can save you a lot of time when you are programming.  Arrays are very
			  useful in a mathematical sense. Think of them like a shipping container,
			  packed full of similar items, all stowed away in a specific order.
            </p>
          </div>
          <div class="col">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <img src="../images/container.png" id="cont"/>
            <!-- Image can be found here:
            https://www.flaticon.com/free-icon/container_1105382#term=container&page=3&position=71
            -->
          </div>
          <div class="w-100"></div><br><br><br> <!-- Line break -->
          <div class="col">
		  <br><br><br><br><br><br><br><br><br><br>
            <img src="../images/laptop.png" id="laptop"/>
			<!-- Image can be found here:
            https://www.flaticon.com/free-icon/cloud_860276#term=computer&page=3&position=39
            -->
          </div>
          <div class="col">
            <h1>Array Syntax</h1>
			  To create an array of integers that has a capacity of 10 we would type:
            </p>
            <p><img src="../images/array1.png" id="array1"/> </p>
			<p>
				To create an array with some integers already in it, we would type:
			 </p>
			 <p><img src="../images/array2.png" id="array2"/> </p>
			<p>
			  The index of an array is the location of which container inside that the element is in.
			  In arrays, the index starts at number zero then increments by one integer at a time.
			  For instance, the array that we created above has the numbers 1-10 in it.
			  The location of the element "1" is in the index of "0" of the array, and the location of the element "2" is in the index of "1" of the array.
			  So since this array holds 10 elements and the index starts at "0", the last element has the index of "9".
			</p>
			<p>
			  Accessing elements in the array:
			</p>
			<p>
				If you wanted to output the element "10" then you would have to know that it's index is "9".
				In the syntax below we are creating a cout statement to the console delivering the element "10"
				from our array named "numbers" which is in the index spot of "9".
			  <p><img src="../images/array3.png" id="array3"/> </p>
			</p>
			<p>
			  Changing elements in the array:
			</p>
		<p>
		<p>
			If you wanted to change the element in the 5th spot of the array, that
			means that you would need to change the element with the index of "4".
			The code below accesses the numbers array, then accesses the index of "4"
			and changes it's contents to "50".  This is acceptable as long as the new
			element that you are entering in has the same type as the other elements.
			In this case it works out because "50" is an integer as well.
		</p>
			  <p><img src="../images/array4.png" id="array4"/> </p>
			</p>
          </div>
        </div>
      </div>
      </br></br></br>
      <hr id = "line"></hr>
      <div class="container">
        <h1 id="activityTitle">Test Yourself</h1>
      </div>
<form action="arrays.php" method="post" id="quiz">
  <br><br>
  <li>

    <h3>An array can hold ...</h3><br>

    <div>
        <input type="radio" name="question1" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) Elements of many different types</font></label>
    </div>

    <div>
        <input type="radio" name="question1" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) Elements of only one type</font></label>
    </div>

    <div>
        <input type="radio" name="question1" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) Elements of only 2 different types</font></label>
    </div>

    <div>
        <input type="radio" name="question1" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) No elements at all</font></label>
    </div><br>

</li>

<li>

    <h3>Which is the proper way to create an array of integers that holds 10 elements?</h3><br>

    <div>
        <input type="radio" name="question2" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) <img src="../images/arrayAnswer1.png" id="arrayAnswer1"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question2" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) <img src="../images/arrayAnswer2.png" id="arrayAnswer2"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question2" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) <img src="../images/arrayAnswer3.png" id="arrayAnswer3"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question2" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) <img src="../images/arrayAnswer4.png" id="arrayAnswer4"/> </font></label>
    </div><br>

</li>

<li>

    <h3>Which is the proper way to change the element at the index of 5 in an array to the element of 10?</h3><br>

    <div>
        <input type="radio" name="question3" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) <img src="../images/arrayA1.png" id="arrayA1"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question3" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) <img src="../images/arrayA2.png" id="arrayA2"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question3" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) <img src="../images/arrayA3.png" id="arrayA3"/> </font></label>
    </div>

    <div>
        <input type="radio" name="question3" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) <img src="../images/arrayA4.png" id="arrayA4"/> </font></label>
    </div><br>

</li>

<li>

    <h3>How would you output the element inside the index of 7 in an array?</h3><br>

    <div>
        <input type="radio" name="question4" id="answerA" value="A" />
        <label for="answerA"> <font color="#95e7f3">A) <img src="../images/arrayA5.png" id="arrayA5"/></font></label>
    </div>

    <div>
        <input type="radio" name="question4" id="answerB" value="B" />
        <label for="answerB"> <font color="#95e7f3">B) <img src="../images/arrayA6.png" id="arrayA6"/></font></label>
    </div>

    <div>
        <input type="radio" name="question4" id="answerC" value="C" />
        <label for="answerC"> <font color="#95e7f3">C) <img src="../images/arrayA7.png" id="arrayA7"/></font></label>
    </div>

    <div>
        <input type="radio" name="question4" id="answerD" value="D" />
        <label for="answerD"> <font color="#95e7f3">D) <img src="../images/arrayA8.png" id="arrayA8"/></font></label>
    </div><br>

</li>
<br>
<input type="submit" name="submit_" value="Submit Quiz" class="submitButton"/>
</form>
<br>

    <hr id = "line"></hr>
    <div class="container">
      <!-- Page change buttons -->
        <div class="row">
          <div class="col"> <!-- Page back button -->
            <a href="variables.php">
              <div id="previousLesson" style="float: left;">Previous Lesson</div>
            </a>
          </div>
          <div class="col"> <!-- Page forward button -->
            <a href="conditionals.php">
              <div id="nextLesson" style="float: right;">Next Lesson</div>
            </a>
          </div>
      </div> <!-- End of page change buttons -->


    </div>
  </body>
</html>
