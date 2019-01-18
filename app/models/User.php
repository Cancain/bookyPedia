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
}