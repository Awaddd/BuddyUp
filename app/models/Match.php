<?php
  class Match {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getMatches($user, $role){

      if ($role == 1) {
        $this->db->query("SELECT users.User_ID, matches.Tourist_ID, users.FirstName, users.LastName,
                        users.DateOfBirth, users.Gender, users.Bio
                        FROM matches
                        INNER JOIN users
                        ON matches.Buddy_ID = users.User_ID
                        WHERE matches.Tourist_ID = :user_id");
      } else if($role == 2){
      $this->db->query("SELECT users.User_ID, matches.Tourist_ID, users.FirstName, users.LastName,
                      users.DateOfBirth, users.Gender, users.Bio
                      FROM matches
                      INNER JOIN users
                      ON matches.Tourist_ID = users.User_ID
                      WHERE matches.Buddy_ID = :user_id");
      }

      $this->db->bind("user_id", $user );

      $row = $this->db->resultSet();

      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

    public function createMatches($match, $user, $role){

      if ($role == 1) {
        $this->db->query("INSERT INTO matches (Tourist_ID, Buddy_ID)
                          VALUES (:user_id, :match_id)");

      } else if($role == 2) {
        $this->db->query("INSERT INTO matches (Tourist_ID, Buddy_ID)
                          VALUES (:match_id, :user_id)");
                        }
      //Bind
      $this->db->bind("match_id", $match);
      $this->db->bind("user_id", $user);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function checkMatch($match, $user, $role){

      if ($role == 1) {
        $this->db->query("SELECT Match_ID
                          FROM matches
                          WHERE matches.Buddy_ID = :match_id
                          AND matches.Tourist_ID = :user_id");
      } else if($role == 2){
        $this->db->query("SELECT Match_ID
                          FROM matches
                          WHERE matches.Buddy_ID = :user_id
                          AND  matches.Tourist_ID= :match_id");
      }


      $this->db->bind("match_id", $match );
      $this->db->bind("user_id", $user );


      $row = $this->db->single();

      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

  }
