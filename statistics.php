<!DOCTYPE html>
<html lang = 'en' id="statistics">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800|Roboto:300,400,700,900"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/mainpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>

    </script>
    <title> Statistics </title>
    <meta charset = 'utf-8' />
  </head>
  <body>
    <div id = "menuBar" class = "container-fluid">
      <div id = "menuSpans" class = "row">
        <div class = "col-lg-7"></div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="index.html"><div id = "menuButton">Home</div></a>
        </div>
        <div id = "menuButton" class = "col-lg-1" style="cursor:default;"><span>Lessons</span>
          <div id = "dropdown">
            <a href="lessons/variables.html"><div>Variables</div></a>
            <a href="lessons/arrays.html"><div>Arrays</div></a>
            <a href="lessons/conditionals.html"><div>If/Else</div></a>
            <a href="lessons/switches.html"><div>Switches</div></a>
            <a href="lessons/forloops.html"><div>For Loops</div></a>
            <a href="lessons/whileloops.html"><div>While Loops</div></a>
          </div>
        </div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="statistics.php"><div id = "menuButton">Statistics</div></a>
        </div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="technical.html"><div id = "menuButton">Technical</div></a>
        </div>
        <div class ="col-lg-1" id="buttonHolder">
          <a href="help.html"><div id = "menuButton">Help</div></a>
        </div>
      </div>
    </div>
    <div id = "mainPage" class = "container">
      <div class = "container">
        <h1 id = "title"> Statistics </h1>
        <h2 id = "subtitle"> Wins and Losses </h2>
      </div>
      <hr id = "line"></hr>
      </br> </br>
      <div id = "paragraphs" class = "container">
        <p>
          <?php
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

          $result1 = mysqli_query($db, "SELECT * FROM Minigames WHERE if_game = 1");
          $result2 = mysqli_query($db, "SELECT * FROM Minigames WHERE if_game = 0");
          $num1 = mysqli_num_rows($result1);
          $num2 = mysqli_num_rows($result2);
          print "<p style='color:var(--accent-color)'> If Statements: </p>"; 
          print "</p> Win Ratio: <span style='color:green'>" . $num1/($num1 + $num2) . "</span></br>";
          print "Loss Ratio: <span style='color:red'>" . $num2/($num1 + $num2) . "</span></p>";

          $result1 = mysqli_query($db, "SELECT * FROM Minigames WHERE for_game = 1");
          $result2 = mysqli_query($db, "SELECT * FROM Minigames WHERE for_game = 0");
          $num1 = mysqli_num_rows($result1);
          $num2 = mysqli_num_rows($result2);
          print "<p style='color:var(--accent-color)'> For Statements: </p>"; 
          print "</p> Win Ratio: <span style='color:green'>" . $num1/($num1 + $num2) . "</span></br>";
          print "Loss Ratio: <span style='color:red'>" . $num2/($num1 + $num2) . "</span></p>";

          $result1 = mysqli_query($db, "SELECT * FROM Minigames WHERE switch_game = 1");
          $result2 = mysqli_query($db, "SELECT * FROM Minigames WHERE switch_game = 0");
          $num1 = mysqli_num_rows($result1);
          $num2 = mysqli_num_rows($result2);
          print "<p style='color:var(--accent-color)'> Switch Statements: </p>"; 
          print "</p> Win Ratio: <span style='color:green'>" . $num1/($num1 + $num2) . "</span></br>";
          print "Loss Ratio: <span style='color:red'>" . $num2/($num1 + $num2) . "</span></p>";

          $result1 = mysqli_query($db, "SELECT * FROM Minigames WHERE while_game = 1");
          $result2 = mysqli_query($db, "SELECT * FROM Minigames WHERE while_game = 0");
          $num1 = mysqli_num_rows($result1);
          $num2 = mysqli_num_rows($result2);
          print "<p style='color:var(--accent-color)'> While Statements: </p>"; 
          print "</p> Win Ratio: <span style='color:green'>" . $num1/($num1 + $num2) . "</span></br>";
          print "Loss Ratio: <span style='color:red'>" . $num2/($num1 + $num2) . "</span></p>";

          $result1 = mysqli_query($db, "SELECT * FROM Minigames WHERE variable_game = 1");
          $result2 = mysqli_query($db, "SELECT * FROM Minigames WHERE variable_game = 0");
          $num1 = mysqli_num_rows($result1);
          $num2 = mysqli_num_rows($result2);
          print "<p style='color:var(--accent-color)'> Variables: </p>"; 
          print "</p> Win Ratio: <span style='color:green'>" . $num1/($num1 + $num2) . "</span></br>";
          print "Loss Ratio: <span style='color:red'>" . $num2/($num1 + $num2) . "</span></p>";

          $result1 = mysqli_query($db, "SELECT * FROM Minigames WHERE array_game = 1");
          $result2 = mysqli_query($db, "SELECT * FROM Minigames WHERE array_game = 0");
          $num1 = mysqli_num_rows($result1);
          $num2 = mysqli_num_rows($result2);
          print "<p style='color:var(--accent-color)'> Arrays: </p>"; 
          print "</p> Win Ratio: <span style='color:green'>" . $num1/($num1 + $num2) . "</span></br>";
          print "Loss Ratio: <span style='color:red'>" . $num2/($num1 + $num2) . "</span></p>";

          ?>
        </p>
      </div>
    </div>
  </body>
</html>
