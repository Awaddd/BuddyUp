<?php

  class Buddies extends Controller {

    public function __construct(){

      $this->matchModel = $this->model("Match");
      $this->userModel = $this->model("User");

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
      $this->view('buddies/buddies', $data);
    }


  }
?>
