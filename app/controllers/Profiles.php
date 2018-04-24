<?php

  Class Profiles extends Controller{

    public function __construct(){

      $this->userModel = $this->model("User");
      $this->userInterestModel = $this->model("UserInterest");
      $this->interestModel = $this->model("Interest");
      $this->feedbackModel = $this->model("Feedback");

      if(!isLoggedIn()){
        redirect('users/login');
      }

    }

    public function index(){
      $userID = $_SESSION['User_ID'];
      $user = $this->userModel->getUser($userID);
      $interests = $this->userInterestModel->getInterests($userID);

      // Get My Feedback
      $allFeedback = $this->feedbackModel->getFeedback($user);

      // Get Sent Feedback
      $sentFeedback = $this->feedbackModel->getSentFeedback($user);

      $available = "";
      $unavailable = "";
      $success = "";
      $failed = "";

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!$_POST['interestToAdd']) {
          echo "fail";
        } else {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $interestToAdd = $_POST['interestToAdd'];
          $interestExists = $this->interestModel->checkInterest($interestToAdd);

          $userInterestExists = "";

          $userInterestExists;
          if ($interestExists) {
            $userInterestExists = $this->interestModel->checkUserInterest($interestExists->Interest_ID, $userID);
          } else {
            $available = "No one else has this interest. Adding";
          }

          if (!empty($interestToAdd) && empty($interestExists) && empty($userInterestExists)) {
              // If interest does not exist in interestList or userInterestList
              // Add to both lists
              $this->interestModel->addInterest($interestToAdd);
              $lastInterest = $this->interestModel->getLastInterest();

              if ($this->interestModel->addInterestToUser($lastInterest, $userID)) {
                $success = "Interest Added";
                echo $interestToAdd;
              } else {
                $failed = "Failed to add interest";
              }

          } else if (!empty($interestToAdd) && empty($userInterestExists)){
            // Else find the interest and add it to user
            // check now if user has interest

            if ($this->interestModel->addInterestToUser($interestExists->Interest_ID, $userID)) {
              $success = "Interest Added";
              echo $interestToAdd;
            } else {
              $failed = "Failed to add interest";
            }
          } else {
            $unavailable = "You already have that interest! Pick another";
          }

          $data = [
            // "interest" => $interestToAdd,
            "available" => $available,
            "unavailable" => $unavailable,
            "success" => $success,
            "failed" => $failed,
            "firstname" => $user->FirstName,
            "lastname" => $user->LastName,
            "dob" => $user->DateOfBirth,
            "gender" => $user->Gender,
            "bio" => $user->Bio,
            "username" => $user->Username,
            "password" => $user->Password,
            "email" => $user->Email,
            "reg" => $user->reg_date,
            "interests" => $interests,
            "myFeedback" => $allFeedback,
            "sentFeedback" => $sentFeedback
          ];
        }
        // $this->interestModel = $this->addInterest($interest);

        // $this->view('profile/profile', $data);
    } else {
      $data = [
        "available" => $available,
        "unavailable" => $unavailable,
        "success" => $success,
        "failed" => $failed,
        "firstname" => $user->FirstName,
        "lastname" => $user->LastName,
        "dob" => $user->DateOfBirth,
        "gender" => $user->Gender,
        "bio" => $user->Bio,
        "username" => $user->Username,
        "password" => $user->Password,
        "email" => $user->Email,
        "reg" => $user->reg_date,
        "interests" => $interests,
        "myFeedback" => $allFeedback,
        "sentFeedback" => $sentFeedback
      ];
      $this->view('profile/profile', $data);
    }
  }
}
