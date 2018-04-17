<?php

  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUser($user){
      $this->db->query("SELECT * FROM users where User_ID = :user");

      $this->db->bind(":user", $user);

      $row = $this->db->single();

      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

    public function getUserRole($user){
      $this->db->query("SELECT Role_ID FROM users where User_ID = :user");

      $this->db->bind(":user", $user);

      $row = $this->db->single();

      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

    public function getUsersOnlyId($otherRole){
      $this->db->query("SELECT User_ID FROM users WHERE Role_ID = :role
                        ORDER BY User_ID ASC");

      $this->db->bind(":role", $otherRole);

      $row = $this->db->resultSet();

      if ($this->db->rowCount() > 0) {
        return $row;
      } else {
        return false;
      }
    }

    public function register($data){
      $this->db->query("INSERT INTO Users (Username,
        Password, Role_ID, FirstName,
        LastName, Email, DateOfBirth, Gender)
        VALUES (:username, :password, :role, :fname, :lname, :email, :dob, :gender)");

        // Bind values
        $this->db->bind(":username", $data["Username"]);
        $this->db->bind(":password", $data["password"]);
        $this->db->bind(":role", $data["role"]);
        $this->db->bind(":fname", $data["fname"]);
        $this->db->bind(":lname", $data["lname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":gender", $data["gender"]);
        $this->db->bind(":dob", $data["dob"]);

        // Execute
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    public function findUserByEmail($email){
      $this->db->query("SELECT * FROM users WHERE
      Email = :email");
      $this->db->bind(":email", $email);

      $row = $this->db->single();

      //Check rows
      if ($this->db->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

    public function findUserByUsername($Username){
      $this->db->query("SELECT * FROM users WHERE Username = :username");
      $this->db->bind(":username", $Username);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login user
    public function login($Username, $password){
      $this->db->query("SELECT * FROM users WHERE Username = :username");
      $this->db->bind(":username", $Username);

      $row = $this->db->single();

      // $row->Password (password should be exactly the same as column in db)
      $hashed_password = $row->Password;
      if (password_verify($password, $hashed_password)) {
        return $row;
      } else {
        return false;
      }

    }

    public function displayName($user){
      $this->db->query("SELECT FirstName FROM users WHERE User_ID = :user_id");
      $this->db->bind(":user_id", $user);
      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }

  }

?>
