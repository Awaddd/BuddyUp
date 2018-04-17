<?php

  class Feedback{

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //See feedback you've been given
    public function getFeedback($user){
      $this->db->query("SELECT  Feedback.Feedback_ID, users.FirstName,
              feedback.Rating, feedback.Description, feedback.FeedbackDate
              FROM feedback
              INNER JOIN users
              ON feedback.Sender_ID = users.User_ID
              WHERE feedback.Receiver_ID = :user");

      $this->db->bind(":user", $user);
      $row = $this->db->resultSet();

      if ($row) {
        return $row;
      } else {
        return false;
      }

    }

    public function getSentFeedback($user){
      $this->db->query("SELECT Feedback.Feedback_ID, users.FirstName,
              feedback.Rating, feedback.Description, feedback.FeedbackDate
              FROM feedback
              INNER JOIN users
              ON feedback.Receiver_ID = users.User_ID
              WHERE feedback.Sender_ID = :user");

      $this->db->bind(":user", $user);
      $row = $this->db->resultSet();

      if ($row) {
        return $row;
      } else {
        return false;
      }
    }

    //Send feebdack
    public function createFeedback($user, $data){
      $this->db->query("INSERT INTO feedback
        (Rating, Description, Sender_ID, Receiver_ID)
        VALUES (:rating, :description, :sender, :receiver)");

        $this->db->bind(":rating", $data['rating']);
        $this->db->bind(":description", $data['description']);
        $this->db->bind(":sender", $user);
        $this->db->bind(":receiver", $data['receiver']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }



  }
?>
