<?php

class Authors extends Controller{

    public function findAuthor(){

        $data = [
            'title' => 'Find author',
            'body' => 'This is where you find authors added by other people'
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

