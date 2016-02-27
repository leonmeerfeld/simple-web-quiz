<?php 
  //Read quiz file:
  $filename = "/var/www/quizzes/This-is-the-quiz-name.quiz";
  $handle = fopen($filename, "r");
  $contents = fread($handle, filesize($filename));
  fclose($handle);

  $quiz_array = explode(";", $contents);

  $question_str = substr($quiz_array[0], 9);

  $answer_str = substr($quiz_array[1], 10);
  $answer_array = explode(",", $answer_str);

?>

<!DOCTYPE php>
<html lang="de">
  <head>
  	<link rel="stylesheet" type="text/css" href="/css/quiz-style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple Web Quiz</title>
    <script>
      function hideCover() {
        document.getElementsByClassName('quiz-cover')[0].style.visibility='hidden'; 
      }
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
        <h1>This is a quiz!</h1>
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
      <div class="quiz-cover">
        <div onclick="hideCover()" class="start-button">
          <h2>START</h2>
        </div>
      </div>
  	</div>
  	<div class="footer">
  	</div>
  </body>
</html>