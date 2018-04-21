<?php

  class Events extends Controller {

    public function __construct(){

      $this->eventModel = $this->model("Event");
      $this->userModel = $this->model("User");
      $this->matchModel = $this->model("Match");


      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function index(){

      $user = $_SESSION['User_ID'];
      $role = $this->userModel->getUserRole($user);

      $matches = $this->matchModel->getMatches($user, $role->Role_ID);

      $data = [
        "matches" => $matches
      ];
      $this->view('events/events', $data);
    }

    public function createEvent(){

      $user = $_SESSION['User_ID'];
      $role = $this->userModel->getUserRole($user);

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // If the user is a tourist
        if ($role->Role_ID === 1) {
          $data =[
            "eventName" => trim($_POST['name']),
            "description" => trim($_POST['description']),
            "eventTime" => trim($_POST['time']),
            "tourist" => $user,
            "buddy" => trim($_POST['match'])
          ];

          // If the user is a buddy
        // } else if ($role->Role_ID === 2){
        //   $data =[
        //     "eventName" => trim($_POST['name']),
        //     "description" => trim($_POST['description']),
        //     "eventTime" => trim($_POST['time']),
        //     "tourist" => trim($_POST['match']),
        //     "buddy" => $user
        //   ];
        // }

        print_r($data);
      }
        // $this->eventModel->createEvent($user, $data);

        // redirect("events");

      } else {
        redirect("events");
      }

    }


}
?>
