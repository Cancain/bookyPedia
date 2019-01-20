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
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Filter post input
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => 'add author',
                    'body' => 'This is where you add authors',
                    'firstName' => ucwords(htmlspecialchars(trim($_POST['firstName']))),
                    'lastName' => ucwords(htmlspecialchars(trim($_POST['lastName']))),
                    'alias' => htmlspecialchars(trim($_POST['alias'])),
                    'shortDesc' => htmlspecialchars(trim($_POST['shortDesc'])),
                    'longDesc' => htmlspecialchars(trim($_POST['longDesc'])),
                    'firstNameErr' => '',
                    'lastNameErr' => '',
                    'shortDescErr' => ''
                ];

                //Validate first name
                if(empty($data['firstName'])){
                    $data['firstNameErr'] = 'You must enter a first name';
                }

                //validate last name
                if(empty($data['lastName'])){
                    $data['lastNameErr'] = 'You must enter a last name';
                }

                //Validate the short description
                if(empty($data['shortDesc'])){
                    $data['shortDescErr'] = 'You must enter a short description';
                }

                //Check that all errors are empty
                if(empty($data['firstNameErr']) && empty($data['lastNameErr']) && 
                empty($data['shortDescErr'])) {

                    $this->authorModel->addAuthor($data);

                    flash('addAuthorSuccess', 'You successfully added an author to the page');
                    redirect('pages/index');

                } else {
                    $this->view('authors/addAuthor', $data);
                }

            } else {                
                $data = [
                    'title' => 'Add author',
                    'body' => 'This is where you add authors',
                    'firstName' => '',
                    'lastName' => '',
                    'alias' => '',
                    'shortDesc' => '',
                    'longDesc' => '',
                    'firstNameErr' => '',
                    'lastNameErr' => '',
                    'shortDescErr' => ''
                ];
                
                $this->view('authors/addAuthor', $data);
                }
            }
        

}

