<!DOCTYPE html>
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
      min-width: 600px
      height: 700px
      -->

      <div class="quiz-header">
        <h1>This is a quiz!</h1>
      </div>
      <div class="quiz-content">
        <a>bu</a>
      </div>
      <div class="quiz-cover">
        <div class="start-button">
          <h2 onclick="hideCover()">START</h2>
        </div>
      </div>
  	</div>
  	<div class="footer">
  	</div>
  </body>
</html>