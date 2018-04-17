<?php

  CLass Interests extends Controller{

    public function __construct(){
      $this->interestModel = $this->model("Interest");
    }

    // public function displayInterests(){
    //
    //   $interests = $this->interestModel->getInterests();
    //
    //   if (empty($interests)) {
    //     echo "Sorry no interests to display";
    //   } else {
    //     foreach($interests as $interest){
    //       echo $interest->Description . "<br>";
    //     }
    //   }
    // }

    public function index(){

      $user = $_SESSION['User_ID'];
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $interests = $this->interestModel->getInterests();

      $data = [
        "interests" => $interests,
        "Description" => trim($_POST['Description']),
        "interestCheck[]" => trim($_POST['check_list[][]'])
      ];

        // if (isset($_POST['interestCheck[]'])) {
        //   $data = array("interestCheck[]" => trim($_POST['interestCheck[]']));
        // }
        print_r($data);
        echo "<br><br>";
        print_r($_POST);
      //
      // $interest = $this->interestModel->checkInterest($data['Description']);
      //
      // if (!empty($data["Description"]) && empty($interest)) {
      //   // add interest updates list
      //   $this->interestModel->addInterest($data);
      //   echo "added to list";
      // } else if (isset($data['interestCheck'])){
      //
      //   $interestCheck = $data['interestCheck[]'];
      //   foreach ($interestCheck as $key) {
      //     // gets last added interest
      //     $interestToAdd = $this->interestModel->getLastInterest();
      //     echo $interestToAdd;
      //     // adds last added interest to user
      //     $this->interestModel->addInterestToUser($interestToAdd, $user);
      //   }

      // }

      $interest = $this->interestModel->checkInterest($data['Description']);
      if (!empty($data['Description']) && empty($interest)) {
          // add interest method below updates list
          $this->interestModel->addInterest($data);
          echo "Interest added to list";
          $interestToAdd = $this->interestModel->getLastInterest();
          echo $interestToAdd;
          $this->interestModel->addInterestToUser($interestToAdd, $user);
          echo "Interest added to user";
      }
      $interestCheck = $data['interestCheck[]'];
      if (!empty($interestCheck)) {

          echo "<BR>WAAAAAAAAAAAA<BR>";
          foreach ($interestCheck as $key) {
            // gets last added interest
            $interestToAdd = $this->interestModel->getLastInterest();
            echo $interestToAdd;
            // adds last added interest to user
            $this->interestModel->addInterestToUser($interestToAdd, $user);
            echo "Check Interest added to user";
          }
      }

      $this->view('profile/setup2', $data);
    }

    public function displayInterests(){
            $interests = $this->interestModel->getInterests();

            $data = [
              "interests" => $interests
            ];

            $this->view('profile/setup2', $data);

    }

  }

?>
