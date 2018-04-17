<?php
require APPROOT . '/views/inc/header.php';
?>

<div class="buddy__body">
  <?php require APPROOT . '/views/inc/nav.php'; ?>
  <div class="title">Your matches</div>
  <div class="buddy__content">


  <?php
  if ($data['matches']) : ?>
<?php
    foreach ($data['matches'] as $match) :
      $dob = $match->DateOfBirth;
      if ($match->Gender == "M") :
        $gender = "Male";
      elseif ($match->Gender == "F"):
        $gender = "Female";
      endif;

      $age = date_diff(date_create($dob), date_create('now'))->y;
      ?>
      <div class="buddy__card">


        <div class="buddy__card__title"><?php echo $match->FirstName ." ".$match->LastName?></div>
        <div class="buddy__card__content">
          <p><?= $gender . ", ". $age; ?></p>
          <p><?= $match->Bio ?></p>
        </div>

        <div class="buddy__card__btn">
          <form  action="<?php echo URLROOT?>/messages" method="post">
            <input type="hidden" name="receiver" value="<?php echo $match->User_ID ?>">
            <button class="btn-same c1" type="submit" name="submit">MESSAGE</button>
          </form>
          <!-- <i class="fa fa-comments"></i> -->
          <form  action="<?php echo URLROOT?>/feedbacks/giveFeedback" method="post">
            <input type="hidden" name="receiver" value="<?php echo $match->User_ID ?>">
            <button class="btn-same c2" type="submit" name="submit">FEEDBACK</button>
          </form>
        </div>

      </div>

  <?php endforeach;
  else: echo "No matches to display, go pick some popular interests and try again!";
  endif;?>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
