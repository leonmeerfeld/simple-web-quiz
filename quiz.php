<?php 
  //Gets the parameter.
  $get_quiz = $_GET["quiz"];

  //Checks if the parameter contains '/'.
  //If it does the parameter is split with the delimiter '/' and $file_name gets reassigned.
  if(strpos($get_quiz, '/') !== false)
  {
    $parameter_split = explode("/", $get_quiz);
    $file_name = $parameter_split[0];
  }else
  {
    $file_name = $get_quiz;
  }

  //Gets the infos form the .quiz file.
  $file_path = "/var/www/quizzes/" . $file_name . ".quiz";

  //Opens file from direct path.
  $handle = fopen($file_path, "r");
  $contents = fread($handle, filesize($file_path));
  fclose($handle);

  $quiz_array = explode(";", $contents);

  $number_of_questions = (count($quiz_array) - 1)/2;

  //This part controls which answer 'page' will be shown.
  //If $parameter_split exists and is not "", game is on.
  if(isset($parameter_split[1]))
  {
    //if()
    $answer_page = $parameter_split[1];
  }else
  {
    $answer_page = 0;
  }

  //Answers the user submits will be fetched here
  //if(isset($parameter_split[2]))
  //{
  //  $submitted_answers = array(1 => , $parameter_split[2]);
  //}

  $question = substr($quiz_array[$answer_page], 9);

  $answers = substr($quiz_array[$answer_page + $number_of_questions], 11);
  $answer_array = explode(",", $answers);

  //String for the start button link
  $start_button_link = "/quiz.php/?quiz=".$file_name."/".$answer_page;

  //String for the answer buttons link
  $answer_button_link = "/quiz.php/?quiz=".$file_name."/".$answer_page;

  //If the second parameter is 's' the quiz-cover gets removed.
  if(isset($parameter_split[1]))
  {
    $hide_cover_string = "style='visibility:hidden;'";
  }else
  {
    $hide_cover_string = null;
  }
?>

<!DOCTYPE php>
<html lang="de">
  <head>
  	<link rel="stylesheet" type="text/css" href="/css/quiz-style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
      <?php
       echo $file_name;
      ?>
      Simple Web Quiz
    </title>

    <script>
    </script>
  </head>
  <body>
  	<div class="header">
  	</div>
  	<div class="main">
      <!--
      width: 800px
      height: 700px
      -->
      <div class="quiz-header">
        <h1>
          <?php 
            echo $file_name;
          ?>
        </h1>
      </div>
      <div class="quiz-content">
        <!--
      width: 800px
      height: 600px
      -->

        <div class="question-block">
          <a>
            <?php
              echo $question;
            ?>
          </a>
        </div>
        <div class="lower-block">
          <div class="image-block">
            <img class="image" src="/content/thisisanimage.png">
          </div>
          <div class="answer-block">
            <a href="<?php echo $answer_button_link ?>">
                <div class="answer1">
                  <div class="answer1-button"><p>A</p></div>
                  <p>
                    <?php
                      echo $answer_array[0];
                    ?>
                  </p>
                </div>
              </a>
              <a href="<?php echo $answer_button_link ?>">
                <div class="answer2">
                  <div class="answer2-button"><p>B</p></div>
                  <p>
                    <?php
                      echo $answer_array[1];
                    ?>
                  </p>
                </div>
              </a>
              <a href="<?php echo $answer_button_link ?>">
                <div class="answer3">
                  <div class="answer3-button"><p>C</p></div>
                  <p>
                    <?php
                      echo $answer_array[2];
                    ?>
                  </p>
                </div>
              </a>
              <a href="<?php echo $answer_button_link ?>">
                <div class="answer4">
                  <div class="answer4-button"><p>D</p></div>
                  <p>
                    <?php
                      echo $answer_array[3];
                    ?>
                  </p>
                </div>
              </a>
              <a href="<?php echo $answer_button_link ?>">
                <div class="answer5">
                  <div class="answer5-button"><p>E</p></div>
                  <p>
                    <?php
                      echo $answer_array[4];
                    ?>
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--style="visibility:hidden;"-->
      <div class="quiz-cover" <?php echo $hide_cover_string ?>">
        <a href="<?php echo $start_button_link; ?>">
          <div class="start-button">
            <h2>START</h2>
          </div>
        </a>
      </div>
  	</div>
  	<div class="footer">
  	</div>
  </body>
</html>