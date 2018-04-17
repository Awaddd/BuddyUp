<?php

  class UserInterest {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getInterests($user){

      $this->db->query("SELECT users.FirstName, interests.Description FROM `users_interests`
                      INNER JOIN users
                      ON users_interests.User_ID = users.User_ID
                      INNER JOIN interests
                      ON users_interests.Interest_ID = interests.Interest_ID
                      WHERE users_interests.User_ID = :user_id");

      $this->db->bind("user_id", $user );

      $row = $this->db->resultSet();

      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
        echo "fail";
      }
    }

  }
