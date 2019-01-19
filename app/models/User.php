<?php

class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function registerUser($data){

        //Set up query
        $this->db->query('INSERT INTO users (userName, email, password) VALUES (:userName, :email, :password)');

        //Bind values
        $this->db->bind('userName', $data['userName']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);

        ($this->db->execute());
    }

    public function findUserByEmail($email){
        //Setting up query
        $this->db->query('SELECT * FROM users WHERE email = :email');
        
        //Bind values
        $this->db->bind(':email', $email);
        
        //fetch a single matching row
        $foundUser = $this->db->fetchSingle();
        

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function loginUser($email, $password){
        //Setup query
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind values
        $this->db->bind(':email', $email);

        //Set found user to variable
        $foundUser = $this->db->fetchSingle();

        $hashedPassword = $foundUser->password;



        if(password_verify($password, $hashedPassword)){
            return $foundUser;
        } else {
            return false;
        }
    }

    public function getUserById($id){
        //Setup query
        $this->db->query('SELECT * FROM users WHERE id = :id');

        //bind the values
        $this->db->bind(':id', $id);

        //set found user to a variable
        $foundUser = $this->db->fetchSingle();

        if($foundUser){
            return $foundUser;
        } else {
            return false;
        }
    }

    public function getUserByUserName($userName){
        //Setup query
        $this->db->query('SELECT * FROM users WHERE userName = :userName');

        //Bind the values
        $this->db->bind(':userName', $userName);

        //Set the found user to a variable
        $foundUser = $this->db->fetchSingle();

        if($foundUser){
            return $foundUser;
        } else {
            return false;
        }
    }
}