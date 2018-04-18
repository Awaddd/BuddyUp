<?php
//header
require APPROOT . '/views/inc/header.php';
?>

<div class="chat__body background-purple-gradient" id="msgbody">
  <?php require APPROOT . '/views/inc/nav.php'; ?>
  <div class="chat__window">
    <div class="chat__head">
      <div class="chat__user">
        <?php echo $data['receiverName']; ?>
      </div>
    </div>
      <div class="chat__box">

        <span id="test"></span>
        
        <div id="chat-content">

        </div>


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
