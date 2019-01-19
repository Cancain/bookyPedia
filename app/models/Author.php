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
}
    