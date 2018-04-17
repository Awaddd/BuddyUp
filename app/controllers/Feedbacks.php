<?php

  class Feedbacks extends Controller{

    public function __construct(){
      $this->feedbackModel = $this->model("Feedback");
      $this->userModel = $this->model("User");

      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function displayFeedback(){
      $user = $_SESSION['User_ID'];
      $allFeedback = $this->feedbackModel->getFeedback($user);
      $sentFeedback = $this->feedbackModel->getSentFeedback($user);
      $data = [
        "Feedback" => $allFeedback,
        "sentFeedback" => $sentFeedback
      ];

      $this->view('feedback/feedback', $data);
    }

    public function sendFeedback(){
      $user = $_SESSION['User_ID'];

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data =[
          "rating" => trim($_POST['rating']),
          "description" => trim($_POST['description']),
          "receiver" => trim($_POST['receiver'])
        ];
        $this->feedbackModel->createFeedback($user, $data);
        redirect("feedbacks/displayFeedback");
      }

    }

    public function giveFeedback(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $receiver = trim($_POST['receiver']);
        $receiverName = $this->userModel->displayName($receiver);

        $data = [
          "receiverName" => $receiverName->FirstName,
          "receiver" => $receiver
        ];

        $this->view('feedback/feedback', $data);
      } else {
        // redirect("home");
      }
    }


}
?>
