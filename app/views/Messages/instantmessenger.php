<?php
//header
require APPROOT . '/views/inc/header.php';
?>

<div class="chat__body background-purple-gradient">
  <?php require APPROOT . '/views/inc/nav.php'; ?>
  <div class="chat__window">
    <div class="chat__head">
      <div class="chat__user">
        <?php echo $data['receiverName']; ?>
      </div>
    </div>
      <div class="chat__box">

        <span id="test"></span>
        <?php
        if ($data['msgs']) :

        foreach ($data['msgs'] as $msg) :
          $user = $data['user'];
          $date = DateTime::createFromFormat( 'Y-m-d H:i:s', $msg->MessageDate);
          ?>

          <div id="chat-content">
            <?php if ($msg->Sender_ID == $user): ?>
              <!--  Sender -->
              <div class="bubble msg__sending">
                <div class="msg__user">
                  <?php echo $msg->Sender ?>
                  <span class="time">
                    <?php echo $date->format('H:i'); ?>
                  </span>
                </div>
                <div class="message">
                  <?php echo $msg->message ?>
                </div>

              </div>
            <?php else: ?>
              <!--  Receiver -->
              <div class="bubble msg__receiving">
                <div class="msg__user">
                  <?php echo $msg->Sender ?>
                  <span class="time">
                    <?php echo $date->format('H:i'); ?>
                  </span>
                </div>
                <div class="message">
                  <?php echo $msg->message ?>
                </div>


              </div>
            <?php endif; ?>

          </div>
        <?php endforeach;
              endif;?>


      </div>
    <div class="chat__keyboard">
      <form id="send-message-form" action="<?php echo URLROOT?>/messages/sendmessage2" method="post">
        <input type="hidden" name="receiver" id="message-receiver" value="<?php echo $data['receiver'] ?>">
        <input type="text" class="chat__keyboard__text" name="message" id="new-message">
        <input type="submit" value="SEND" class="btn-send">
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
