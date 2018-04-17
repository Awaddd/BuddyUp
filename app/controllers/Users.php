<?php

  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model("User");
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Process form

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data =[
          "Username" => trim($_POST['Username']),
          "password" => trim($_POST['Password']),
          "cpassword" => trim($_POST['C_Password']),
          "role" => trim($_POST['Role']),

          "fname" => trim($_POST['FirstName']),
          "lname" => trim($_POST['LastName']),
          "email" => trim($_POST['Email']),
          "gender" => trim($_POST['Gender']),
          "dob" => trim($_POST['DateOfBirth']),

          "uname_err" => "",
          "password_err" => "",
          "cpassword_err" => "",
          "role_err" => "",

          "fname_err" => "",
          "lname_err" => "",
          "email_err" => "",
          "gender_err" => "",
          "dob_err" => ""
        ];

        // Validate Username
        if (empty($data['Username'])) {
          $data['uname_err'] = "Please enter your username";
        } else {
          if ($this->userModel->findUserByUsername($data['Username'])) {
            $data['uname_err'] = "Username taken";
          }
        }

        // Validate Username
        if (empty($data['password'])) {
          $data['password_err'] = "Please enter your password";
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = "Password must be at least 6 characters";
        }

        if (empty($data['cpassword'])) {
          $data['cpassword_err'] = "Please confirm your password";
        } elseif($data['password'] != $data['cpassword']){
          $data['password_err'] = "Passwords do not match";
        }

        // Validate Username
        if (empty($data['role'])) {
          $data['role_err'] = "Please select your role";
        }

        // Validate Username
        if (empty($data['fname'])) {
          $data['fname_err'] = "Please enter your first name";
        }

        // Validate Username
        if (empty($data['lname'])) {
          $data['lname_err'] = "Please enter your lastname";
        }

        // Validate Username
        if (empty($data['email'])) {
          $data['email_err'] = "Please enter your email";
        } else {
          // Check email_err
          if ($this->userModel->findUserByEmail($data['email'])) {
            $data['email_err'] = "Email taken";

          }
        }

        // Validate Username
        if (empty($data['dob'])) {
          $data['dob_err'] = "Please enter your date of birth";
        }

        // Validate Username
        if (empty($data['gender'])) {
          $data['gender_err'] = "Please select your gender";
        }

        // Make sure errors are empty
        if (empty($data['uname_err'])
        && empty($data['password_err'])
        && empty($data['cpassword_err'])
        && empty($data['role_err'])
        && empty($data['fname_err'])
        && empty($data['lname_err'])
        && empty($data['email_err'])
        && empty($data['gender_err'])
        && empty($data['dob__err'])) {
          // Validated

          // Hash password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User

          if($this->userModel->register($data)){
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }



      } else {
        // Init data

        $data =[
          "Username" => "",
          "password" => "",
          "cpassword" => "",
          "role" => "",

          "fname" => "",
          "lname" => "",
          "email" => "",
          "dob" => "",

          "uname_err" => "",
          "password_err" => "",
          "cpassword_err" => "",
          "role_err" => "",

          "fname_err" => "",
          "lname_err" => "",
          "email_err" => "",
          "gender_err" => "",
          "dob_err" => ""
        ];

        //Load view
        $this->view('users/register', $data);


      }
    }

    public function login(){
      // Check for POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data =[
          "Username" => trim($_POST['Username']),
          "password" => trim($_POST['Password']),
          "uname_err" => "",
          "password_err" => ""
        ];

        // Validate Username
        if (empty($data['Username'])) {
          $data['uname_err'] = "Please enter your username";
        }

        // Validate Password
        if (empty($data['password'])) {
          $data['password_err'] = "Please enter your password";
        }

        // Check for user by Username

        if ($this->userModel->findUserByUsername($data['Username'])) {
          // User found
        } else {
          // User not found
            $data['uname_err'] = "User does not exist";
        }

        // Make sure errors are empty
        if (empty($data['uname_err']) && empty($data['password_err'])) {
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['Username'], $data['password']);

          if ($loggedInUser) {
            // Create session
            $this->createUserSession($loggedInUser);

          } else {
            $data['password_err'] = "Password incorrect";

            $this->view('users/login', $data);

          }

        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }

      } else {
        // Init data
        $data =[
          "Username" => "",
          "password" => "",
          "uname_err" => "",
          "password_err" => ""
        ];

        //Load view
        $this->view('users/login', $data);

      }
    }

    public function createUserSession($user){
      $_SESSION['User_ID'] = $user->User_ID;
      redirect('home/home');
    }

    public function logout(){
      unset($_SESSION['User_ID']);
      session_destroy();
      redirect('home');
    }



  }

?>
