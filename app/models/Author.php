<?php

class Author{
    private $db;
    
    public function __construct(){
        $this->db = new Database();
    }

    public function getAllAuthors(){
        $this->db->query('SELECT *, 
                            authors.id as authorId,
                            users.id as userId,
                            users.userName as userName,
                            authors.createdAt as authorCreated,
                            users.createdAt as userCreated
                            FROM authors
                            INNER JOIN users
                            ON authors.addedBy = users.id
                            ORDER BY authors.points DESC');
        $authors = $this->db->fetchMultiple();
        return $authors;
    }

    public function addAuthor($data){
        $this->db->query('INSERT INTO authors (firstName, lastName, alias, body, longBody, addedBy) 
                            VALUES (:firstName, :lastName, :alias, :body, :longBody, :addedBy)');

        $this->db->bind('firstName', $data['firstName']);
        $this->db->bind('lastName', $data['lastName']);
        $this->db->bind('alias', $data['alias']);
        $this->db->bind('body', $data['shortDesc']);
        $this->db->bind('longBody', $data['longDesc']);
        $this->db->bind('addedBy', $_SESSION['userId']);

        $this->db->execute();


    }
}
    