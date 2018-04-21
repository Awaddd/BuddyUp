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


  }
