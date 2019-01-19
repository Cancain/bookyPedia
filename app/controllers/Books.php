<?php

class Books extends Controller{

    public function findBook(){

        $data = [
            'title' => 'Find books',
            'body' => 'This is where you find books added by other people'
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