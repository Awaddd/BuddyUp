<?php

  class Interest{

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getInterests(){

      $this->db->query("SELECT * FROM Interests");
      $row = $this->db->resultSet();
      if (!empty($row)) {
        return $row;
      } else {
        return false;
      }
    }

    public function addInterestToUser($interest_ID, $user_ID){

      $this->db->query("INSERT INTO users_interests (Interest_ID, User_ID)
        VALUES (:interest_id, :user_id)");

        // Bind values
        $this->db->bind(":interest_id", $interest_ID);
        $this->db->bind(":user_id", $user_ID);

        // Execute
        if($this->db->execute()){
        return true;
        } else {
          return false;
        }
    }

    public function addInterest($data){
      $this->db->query("INSERT INTO Interests (Interest_ID, Description)
        VALUES (NULL, :description)");

        // Bind values
        $this->db->bind(":description", $data);

        // Execute
        if($this->db->execute()){
        return true;
        } else {
          return false;
        }
    }

    public function checkInterest($interest){
      $this->db->query("SELECT * FROM interests WHERE
      Description = :description");
      $this->db->bind(":description", $interest);

      $row = $this->db->single();

      //Check rows
      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

    public function checkUserInterest($interest, $user){
      $this->db->query("SELECT * FROM users_interests WHERE
      Interest_ID = :interestID AND User_ID = :UserID");

      $this->db->bind(":interestID", $interest);
      $this->db->bind(":UserID", $user);

      $row = $this->db->single();

      //Check rows
      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

    public function getLastInterest(){
      $interestToAdd = $this->db->getLastInsert();
      return $interestToAdd;
    }

  }

?>
