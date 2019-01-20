<?php

class Books extends Controller{
    public function __construct(){
        $this->bookModel = $this->model('Book');
    }

    public function findBook(){

        $books = $this->bookModel->getAllBooks();
        $data = [
            'title' => 'Find books',
            'body' => 'This is where you find books added by other people',
            'books' => $books
        ];

        $this->view('books/findBook', $data);
    }

    public function addBook(){

        $data = [
            'title' => 'Add Book',
            'body' => 'This is where you add Books'
        ];

        $this->view('books/addBook', $data);
    }

}