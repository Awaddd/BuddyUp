<?php
require APPROOT . '/views/inc/header.php';
?>

<?php
if (isset($data['Feedback'])) : ?>
  <p>Your feedback: </p>
  <?php
  foreach($data['Feedback'] as $k => $feedback):
    echo "Name: $feedback->FirstName <br>";
    echo "Rating: $feedback->Rating <br>";
    echo "Description: $feedback->Description <br>";
    echo "Date: $feedback->FeedbackDate <br><br>";
  endforeach;

  if (isset($data['sentFeedback'])) : ?>
      <p><br>Feedback you've given</p>
  <?php
    foreach($data['sentFeedback'] as $k => $sentFeedback) :
      echo "Name: $sentFeedback->FirstName <br>";
      echo "Rating: $sentFeedback->Rating <br>";
      echo "Description: $sentFeedback->Description <br>";
      echo "Date: $sentFeedback->FeedbackDate <br><br>";
    endforeach;
  endif;
  elseif (isset($data['receiver'])) :
?>
  <!-- <form class="" >
    <fieldset>
      <legend>Feedback</legend>
      <input type="hidden" name="receiver" value="">

      <input type="text" name="rating" required><br>
      <textarea name="description" rows="5" cols="80" form="feedback" required></textarea><br>
      <input type="submit" name="" value="Give Feedback">
    </fieldset>
  </form> -->

  <div class="feedback__body">
    <?php require APPROOT . '/views/inc/nav.php'; ?>

    <div class="feedback__content">



      <form class="feedback__form" action="<?php echo URLROOT?>/feedbacks/sendFeedback" method="post" id="feedback">
        <input type="hidden" name="receiver" value="<?php echo $data['receiver']?>">

        <div class="feedback__head"><?php echo $data['receiverName']; ?></div>

        <div class="stars">
          <input type="radio" name="rating" class="star-1" id="star-1" value="1"/>
          <label class="star-1" for="star-1">1</label>
          <input type="radio" name="rating" class="star-2" id="star-2" value="2"/>
          <label class="star-2" for="star-2">2</label>
          <input type="radio" name="rating" class="star-3" id="star-3" value="3"/>
          <label class="star-3" for="star-3">3</label>
          <input type="radio" name="rating" class="star-4" id="star-4" value="4"/>
          <label class="star-4" for="star-4">4</label>
          <input type="radio" name="rating" class="star-5" id="star-5" value="5"/>
          <label class="star-5" for="star-5">5</label>
          <span></span>
        </div>

        <textarea class="feedback" name="description" required placeholder="Enter your feedback"></textarea>

        <input type="submit" class="btn--feedback" value="SEND">

      </form>

    </div>
  </div>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
