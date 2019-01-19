<?php

class Authors extends Controller{
    public function __construct(){
        $this->authorModel = $this->model('Author');
        $this->userModel = $this->model('User');
    }

    public function findAuthor(){
        //get all authors from the database
        $authors = $this->authorModel->getAllAuthors();
        


        $data = [
            'title' => 'Find author',
            'body' => 'This is where you find authors added by other people',
            'authors' => $authors
        ];
        
        $this->view('authors/findAuthor', $data);
        }
        
        public function addAuthor(){
        
        $data = [
            'title' => 'Add author',
            'body' => 'This is where you add authors'
        ];
        
        $this->view('authors/addAuthor', $data);
        }
}

