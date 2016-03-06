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
    <a href="<?php echo $answer_button_link_A ?>">
      <div class="answer1">
        <div class="answer1-button"><p>A</p></div>
        <p>
          <?php
          echo $answer_array[0];
          ?>
        </p>
      </div>
    </a>
    <a href="<?php echo $answer_button_link_B ?>">
      <div class="answer2">
        <div class="answer2-button"><p>B</p></div>
        <p>
          <?php
          echo $answer_array[1];
          ?>
        </p>
      </div>
    </a>
    <a href="<?php echo $answer_button_link_C ?>">
      <div class="answer3">
        <div class="answer3-button"><p>C</p></div>
        <p>
          <?php
          echo $answer_array[2];
          ?>
        </p>
      </div>
    </a>
    <a href="<?php echo $answer_button_link_D ?>">
      <div class="answer4">
        <div class="answer4-button"><p>D</p></div>
        <p>
          <?php
          echo $answer_array[3];
          ?>
        </p>
      </div>
    </a>
    <a href="<?php echo $answer_button_link_E ?>">
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