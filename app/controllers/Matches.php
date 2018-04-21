<?php
  class Matches extends Controller {

    public function __construct(){

      $this->matchModel = $this->model("Match");
      $this->userInterestModel = $this->model("UserInterest");
      $this->userModel = $this->model("User");

      if(!isLoggedIn()){
        redirect('users/login');
      }

    }

    public function index(){

      $data = [

      ];
      $this->view('matches/index', $data);
      $this->displayMatches(); // Temp func, should be inside view somehow
    }

    public function displayMatches(){

      $user = $_SESSION['User_ID'];
      $role = $this->userModel->getUserRole($user);
      $matches = $this->matchModel->getMatches($user, $role->Role_ID);

      if (empty($matches)) {
        echo "Sorry no matches to display <br> - Expand your distance
        and select more interests";
      } else {
      foreach ($matches as $match){
        $interests = $this->userInterestModel->getInterests($match->User_ID);
        $dob = $match->DateOfBirth;
        if ($match->Gender == "M") {
          $gender = "Male";
        } else {
          $gender = "Female";
        }

        echo "<strong>Name: </strong> ";
        echo $match->FirstName . " " . $match->LastName . "<br>";
        echo "<strong>DOB: </strong>";
        echo $dob = date("j F Y", strtotime($dob)) .  "<br>";
        echo "<strong>Gender: </strong>";
        echo $gender . "<br>";
        echo "<strong>Bio: </strong> ";
        echo $match->Bio . "<br>";

        echo "<strong>Interests: </strong> ";
        if (empty($interests)) {
          echo "0 Interests";
        } else {
        foreach ($interests as $interest){
        echo " - " . $interest->Description;
        }
        echo "<br><br>";
        }

      }
    }
    }


    public function makeMatch(){
      $user = $_SESSION['User_ID'];
      $role = $this->userModel->getUserRole($user);

      // If the logged in user is a tourist, set var otherRole to 2 because tourist has role_id 1
      if ($role->Role_ID == 1) {
        $otherRole = 2;
      } else if ($role->Role_ID == 2){
        $otherRole = 1;
      }

      $allUsers = $this->userModel->getUsersOnlyId($otherRole);

      foreach ($allUsers as $ki => $users) {
        $match = $users->User_ID;
        //Get interests for each match
        $matchInterests = $this->userInterestModel->getInterests($match); // changed this to match from users-user_ID
        $userInterests = $this->userInterestModel->getInterests($user);

        if ($matchInterests) {

          if ($userInterests) {
            foreach($userInterests as $k => $myInterests){
              $myInterestsArray[$k] = $myInterests->Description;
            }
          }

          foreach ($matchInterests as $i => $allUsersInterests) {
            $interestsArray[$i] = $allUsersInterests->Description;
          }

          if (!empty($myInterestsArray) && !empty($interestsArray)) {
            $similarities = array_intersect($myInterestsArray, $interestsArray);

            $checkMatch = $this->matchModel->checkMatch($match, $user, $role->Role_ID);

          if (!empty($similarities) && empty($checkMatch) && $match != $user) {

            $matchMade = $this->matchModel->createMatches($match, $user, $role->Role_ID);

            // redirect("matches/displaymatches");
            redirect("Buddies");


          }
          unset($myInterestsArray);
          unset($interestsArray);
        }

      }

    }
      // redirect("matches/displaymatches");
      redirect("Buddies");

    }

  }
?>
