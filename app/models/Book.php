<?php

class Book {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAllBooks(){
        //set up sql query
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

        //fetch all found and put in a variable then return found books
        $books = $this->db->fetchMultiple();
        return $books;
    }

    public function addBook($data){
        //set up sql query
        $this->db->query('INSERT INTO books(title, subTitle, authorId, series, seriesNum, body, longBody, createdBy)
                            VALUES (:title, :subTitle, :authorId, :series, :seriesNum, :body, :longBody, :createdBy)');

        //Bind parameters
        $this->db->bind('title', $data['bookTitle']);
        $this->db->bind('subTitle', $data['subTitle']);
        $this->db->bind('authorId', $data['authorId']);
        $this->db->bind('series', $data['series']);
        $this->db->bind('seriesNum', $data['seriesNum']);
        $this->db->bind('body', $data['bookBody']);
        $this->db->bind('longBody', $data['longBody']);
        $this->db->bind('createdBy', $data['createdBy']);

        //execute query
        $this->db->execute();
    }

    public function getBookById($id){
        //set up sql query
        $this->db->query('SELECT books.*, 
                        authors.firstName, authors.lastName, 
                        users.userName FROM books
                        INNER JOIN authors
                        ON books.authorId = authors.id
                        INNER JOIN users
                        ON books.createdBy = users.id
                        WHERE books.id = :id');
        
        //Bind parameters
        $this->db->bind('id', $id);

        //set fetched data to a variable
        $data = $this->db->fetchSingle();

        //if it found a book return it else return false
        if($data){
            return $data;
        } else {
            return false;
        }
    }

    public function getBooksByAuthorId($id){
        //set up sql query
        $this->db->query('SELECT * FROM books
                            WHERE authorId = :id');
        
        //Bind parameters
        $this->db->bind('id', $id);

        //fetch all found books
        $books = $this->db->fetchMultiple();
        
        //return found books, returns false if noone found
        if($books){
            return $books;
        } else {
            return false;
        }
    }
}