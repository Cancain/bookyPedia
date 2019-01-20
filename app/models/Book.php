<?php

class Book {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllBooks(){
        $this->db->query('SELECT *,
                            books.id as bookId,
                            books.createdAt as bookCreated,
                            books.longBody as bookLongBody,
                            books.body as bookBody,
                            books.points as bookPoints,
                            books.createdBy as bookCreatedBy,
                            users.id as UserId,
                            users.createdAt as userCreated,
                            authors.id as authorId, 
                            authors.createdAt as authorCreated,
                            authors.longBody as authorLongBody,
                            authors.body as authorBody,
                            authors.points as authorPoints,
                            authors.addedBy as authorCreatedBy
                            FROM books
                            INNER JOIN users
                            ON books.createdBy = users.id
                            INNER JOIN authors
                            ON books.authorId = authors.id
                            ');
        $books = $this->db->fetchMultiple();
        return $books;
    }
}