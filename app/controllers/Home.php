<?php

  class Home extends Controller{


    public function __construct(){
      $this->userModel = $this->model("User");
    }

    public function index(){

      if (isset($_SESSION['User_ID'])) {
        $user = $_SESSION['User_ID'];
        $displayName = $this->userModel->displayName($user);

        $data = [
          "Name" => $displayName->FirstName
        ];
      } else {

        $data = [

        ];
        
      }


    $this->view('home/home', $data);


    }


  }

?>
