<?php

  class Event{

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function createEvent($user, $data){
      $this->db->query("INSERT INTO event (Name, Description, ReminderTime, Tourist_ID, Buddy_ID)
                        VALUES (:eventName, :description, :eventTime, :tourist, :buddy)");

        $this->db->bind(":eventName", $data['eventName']);
        $this->db->bind(":description", $data['description']);
        $this->db->bind(":eventTime", $data['eventTime']);
        $this->db->bind(":tourist", $data['tourist']);
        $this->db->bind(":buddy", $data['buddy']);


        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }


    public function displayEvent($user, $role){
      if ($role == 1) {

        $this->db->query("SELECT users.FirstName, event.Name, event.Description, event.ReminderTime FROM event
                          INNER JOIN users
                          ON event.Buddy_ID = users.User_ID
                          where Tourist_ID = :user");

      } else if ($role == 2){

        $this->db->query("SELECT users.FirstName, event.Name, event.Description, event.ReminderTime FROM event
                          INNER JOIN users
                          ON event.Tourist_ID = users.User_ID
                          where Buddy_ID = :user");

      }

      $this->db->bind(":user", $user);

      $row = $this->db->resultSet();

      if ($row) {
        return $row;
      } else {
        return false;
      }

    }


  }
