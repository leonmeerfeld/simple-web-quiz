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

  //opens file from direct path.
  $handle = fopen($file_path, "r");
  $contents = fread($handle, filesize($file_path));
  fclose($handle);

  $quiz_array = explode(";", $contents);

  $number_of_questions = (count($quiz_array) - 1)/2;

  //The question string from the file.
  //$question_str = substr($quiz_array[0], 9);

  $answer_page = $parameter_split[1];
  $answers = substr($quiz_array[$answer_page + $number_of_questions], 11);
  $answer_array = explode(",", $answers);

  //string for the start button link
  $start_button_link ="/quiz.php/?quiz=".$file_name."/0";

  //If the second parameter is 's' the quiz-cover gets removed.
  if(isset($parameter_split[1]))
  {
    $hide_cover_string = "style='visibility:hidden;'";
  }else
  {
    $hide_cover_string = "";
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
      <!--function hideCover() {
        document.getElementsByClassName('quiz-cover')[0].style.visibility='hidden'; 
      }-->
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
              echo $question_str;
            ?>
          </a>
        </div>
        <div class="lower-block">
          <div class="image-block">
            <img class="image" src="/content/thisisanimage.png">
          </div>
          <div class="answer-block">
              <div class="answer1">
                <div class="answer1-button"><a>A</a></div>
                  <a>
                    <?php
                      echo $answer_array[0];
                    ?>
                  </a>
              </div>
            <div class="answer2">
              <div class="answer2-button"><a>B</a></div>
              <a>
                <?php
                  echo $answer_array[1];
                ?>
              </a>
            </div>
            <div class="answer3">
              <div class="answer3-button"><a>C</a></div>
              <a>
                <?php
                  echo $answer_array[2];
                ?>
              </a>
            </div>
            <div class="answer4">
              <div class="answer4-button"><a>D</a></div>
              <a>
                <?php
                  echo $answer_array[3];
                ?>
              </a>
            </div>
            <div class="answer5">
              <div class="answer5-button"><a>E</a></div>
              <a>
                <?php
                  echo $answer_array[4];
                ?>
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