<?php

  Class Messages extends Controller{

    public function __construct(){

      // $this->userModel = $this->model("User");
      $this->msgModel = $this->model("Message");
      $this->userModel = $this->model("User");

      if(!isLoggedIn()){
        redirect('users/login');
      }

    }

    // Load messages
    public function index(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $receiver = trim($_POST['receiver']);
        $user = $_SESSION['User_ID'];
        $messages = $this->msgModel->loadMessages($user, $receiver);
        $receiverName = $this->userModel->displayName($receiver);

        $data = [
          "receiver" => $receiver,
          "receiverName" => $receiverName->FirstName,
          "msgs" => $messages,
          "user" => $user
        ];
        $this->view('Messages/instantmessenger', $data);

    } else {
      redirect("Buddies");
    }
  }

  public function loadMessages(){

    if (isset($_POST['receiver'])) {

      $user = $_SESSION['User_ID'];
      $receiver = $_POST['receiver'];
      $messages = $this->msgModel->loadMessages($user, $receiver);
      foreach ($messages as $msg) {
        echo $msg->receiver;
      }
    } else {
      echo "no rec";
    }

  }

    // Send Messages
    public function sendMessage(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $receiver = trim($_POST['receiver']);
        $message = trim($_POST['message']);
        $user = $_SESSION['User_ID'];

        $convo = $this->msgModel->getConversation($user, $receiver);
        if ($convo) {

          // Conversation exists, insert into previous convo
          $convo_id = $convo->Conversation_ID;
          $this->msgModel->createMessage($user, $receiver, $message, $convo_id);

          // $data = [
          //
          // ];
          //
          // $this->view('Messages/instantmessenger', $data);
          redirect("Messages");

        } else{

          // Conversation does not exist, create new then insert
          $this->msgModel->startConvo();
          $convo_id = $this->msgModel->getLastConvo();
          $this->msgModel->createMessage($user, $receiver, $message, $convo_id);

          // $data = [
          //
          // ];
          //
          // $this->view('Messages/instantmessenger', $data);
          redirect("Messages");


        }

      } else {
        redirect("Messages");
      }
    }

    public function sendMessage2(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if (!$_POST['newMessage'] && !$_POST['msgReceiver']) {
          echo "fail";
        } else {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $receiver = trim($_POST['msgReceiver']);
          $message = trim($_POST['newMessage']);
          $user = $_SESSION['User_ID'];

          echo "Receiver:" . $receiver . " msg: ";
          echo $message . "<br>";

          $convo = $this->msgModel->getConversation($user, $receiver);

          if ($convo) {
            echo "convo exists - inserting into previous convo";
            // Conversation exists, insert into previous convo

            $convo_id = $convo->Conversation_ID;
            $this->msgModel->createMessage($user, $receiver, $message, $convo_id);

            // redirect("Messages");

          } else {
            echo "Convo does not exist - creating new";
            // Conversation does not exist, create new then insert

            $this->msgModel->startConvo();
            $convo_id = $this->msgModel->getLastConvo();
            $this->msgModel->createMessage($user, $receiver, $message, $convo_id);

            // redirect("Messages");

          }
        }
      }
    }


}
?>
