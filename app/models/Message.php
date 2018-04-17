<?php

  class Message{

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function loadMessages($user, $receiver){
      $this->db->query("SELECT messages.Message_ID, messages.message, messages.MessageDate, messages.MessageRead, messages.Sender_ID, messages.Receiver_ID, a.FirstName as Sender, b.firstName as Receiver
                        FROM messages
                        INNER JOIN users a
                        ON messages.Sender_ID = a.User_ID
                        INNER JOIN users b
                        ON messages.Receiver_ID = b.User_ID
                        WHERE (messages.Sender_ID = :receiver
                        AND Receiver_ID = :user) OR
                        (messages.Receiver_ID = :receiver AND Sender_ID = :user)");

      $this->db->bind(":user", $user);
      $this->db->bind(":receiver", $receiver);

      $row = $this->db->resultSet();

      if ($row) {
        return $row;
      } else {
        return false;
      }
    }


    public function createMessage($user, $receiver, $message, $conversation){
      $this->db->query("INSERT INTO messages (Message, MessageRead, Conversation_ID, Sender_ID, Receiver_ID)
                      	VALUES (:message, :read, :convo, :user, :receiver);");

      $this->db->bind(":message", $message);
      $this->db->bind(":read", 0);
      $this->db->bind(":convo", $conversation);
      $this->db->bind(":user", $user);
      $this->db->bind(":receiver", $receiver);

      if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }

    public function startConvo(){
      $this->db->query("INSERT INTO conversations (Conversation_ID) VALUES (NULL)");

      // Execute
      if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }


    public function getConversation($user, $receiver){
      $this->db->query("SELECT messages.Conversation_ID
                        FROM messages
                        WHERE (messages.Sender_ID = :receiver
                        AND Receiver_ID = :user) OR
                        (messages.Receiver_ID = :receiver AND Sender_ID = :user)");

      $this->db->bind(":user", $user);
      $this->db->bind(":receiver", $receiver);

      $row = $this->db->single();

      if ($row) {
        return $row;
      } else {
        return false;
      }
    }

    public function getLastConvo(){
      $convo = $this->db->getLastInsert();
      return $convo;
    }

    //BELOW FUNCTIONS NOT USED YET

    public function getSender($message){
      $this->db->query("SELECT messages.Sender_ID, users.FirstName
                        FROM messages
                        INNER JOIN users
                        ON messages.Sender_ID = users.User_ID
                        WHERE Message_ID = :message");

      $this->db->bind(":message", $message);

      $row = $this->db->single();

      if ($row) {
        return $row;
      } else {
        return false;
      }
    }

    public function getReceiver($message){
      $this->db->query("SELECT messages.Receiver_ID, users.FirstName
                        FROM messages
                        INNER JOIN users
                        ON messages.Receiver_ID = users.User_ID
                        WHERE Message_ID = :message");

      $this->db->bind(":message", $message);

      $row = $this->db->single();

      if ($row) {
        return $row;
      } else {
        return false;
      }
    }


  }
?>
