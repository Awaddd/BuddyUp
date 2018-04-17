<?php

  class Events extends Controller {

    public function __construct(){

      if(!isLoggedIn()){
        redirect('users/login');
      }
    }

    public function index(){


      $data = [

      ];
      $this->view('events/events', $data);
    }


  }
?>
