<?php

class Books extends Controller{
    public function __construct(){
        $this->bookModel = $this->model('Book');
        $this->authorModel = $this->model('Author');
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
        $authors = $this->authorModel->getAllAuthorsSortedByLastname();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Add book',
                'body' => 'This is where you add books',
                'bookTitle' => htmlspecialchars(trim($_POST['title'])),
                'subTitle' => htmlspecialchars(trim($_POST['subTitle'])),
                'authorId' => $_POST['author'],
                'series' => htmlspecialchars(trim($_POST['series'])),
                'seriesNum' => htmlspecialchars(trim($_POST['seriesNum'])),
                'bookBody' => htmlspecialchars(trim($_POST['body'])),
                'longBody' => htmlspecialchars(trim($_POST['longBody'])),
                'createdBy' => $_SESSION['userId'],
                'titleErr' => '',
                'authorErr' => '',
                'bodyErr' => '',
                'authors' => $authors
            ];

            //Validate the title
            if(empty($data['bookTitle'])){
                $data['titleErr'] = 'You must enter a title';
            }

            //validate the author
            //Todo fix method that finds the most relevant authorId from a name

            //Validate body
            if(empty($data['bookBody'])){
                $data['bodyErr'] = 'You need to write a short description about the book';
            }

            //check that all errors are empty
            if(empty($data['titleErr']) && empty($data['authorErr']) && empty($data['bodyErr'])){
                $this->bookModel->addBook($data);
                redirect('pages/index');
            } else {
                //return to the addBook page with errors
                $this->view('books/addBook', $data);
            }


        } else {

            $data = [
                'title' => 'Add book',
                'body' => 'This is where you add books',
                'bookTitle' => '',
                'subTitle' => '',
                'authorId' => '',
                'series' => '',
                'seriesNum' => '',
                'bookBody' => '',
                'longBody' => '',
                'createdBy' => '',
                'titleErr' => '',
                'authorErr' => '',
                'bodyErr' => '',
                'authors' => $authors
            ];
    
            $this->view('books/addBook', $data);
        }
    }
    
    public function show($id){
        $data = $this->bookModel->getBookById($id);

        if($data){
            $this->view('books/show', $data);
        } else {
            die('Somthing went wrong, please try again later');
        }
        

    }

}