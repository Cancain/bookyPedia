<?php
class Page{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function searchAuthorsAndBooks($search){
        //Getting all authors by first name or last name
        //then adds the found authors to a variable
        $this->db->query("SELECT * FROM authors 
                            WHERE firstName LIKE :search
                            OR lastName LIKE :search");
        $this->db->bind('search', '%'.$search.'%');
        $authors = $this->db->fetchMultiple();

        //Getting all books by title name,subtitle or series
        //then adds the found books to a variable
        $this->db->query("SELECT * FROM books 
                            WHERE title LIKE :search
                            OR subtitle LIKE :search
                            or series LIKE :search");
        $this->db->bind('search', '%'.$search.'%');
        $books = $this->db->fetchMultiple();

        //add found books and authors to the data array then returns
        $data = [
            'authors' => $authors,
            'books' => $books
        ];
        return $data;
    }
}