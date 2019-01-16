<?php
class Pages extends Controller{
    public function __construct(){
        
    }

    public function index(){

        $data = [
            'title' => 'Welcome to Bookypedia',
            'body' => 'This is a site for you who likes books and would like to connect to other people. Feel free to add, vote, edit, review any books'
        ];

        $this->view('pages/index', $data);
    }

}