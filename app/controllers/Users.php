<?php
class Users extends Controller {

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        $title = 'Register';
        $body = 'This is where you register an account';


        //Checking for posts
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                'title' => $title,
                'body' => $body,
                'email' => trim($_POST['email']),
                'userName' => trim($_POST['userName']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'emailErr' => '',
                'userNameErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => ''
            ];

            //Validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'You must enter a valid email';
            } else {
                //TODO: check for duplicate emails
            }

            //Validate the username
            //cannot be empty
            if(empty($data['userName'])){
                $data['userNameErr'] = 'You must enter a user name';
            }

            //Validate password
            //cannot be empty or less then 6 characters
            if(empty($data['password'])){
                $data['passwordErr'] = 'You must enter a password';
            } elseif(strlen($data['password']) < 6) {
                $data['passwordErr'] = 'Your password must be atleast 6 characters long';
            }

            //Validate confirm password
            //cannot be empty and must match the other password
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordErr'] = "You must confirm your password";
            } else {
                if($data['password'] != $data['confirmPassword']){
                    $data['confirmPasswordErr'] = 'Your passwords does not match';
                }
            }

            //Check that all error messages are empty
            if(empty($data['emailErr']) && empty($data['userNameErr']) 
            && empty($data['passwordErr']) && empty($data['confirmPasswordErr'])){

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $data['confirmPassword'] = password_hash($data['confirmPassword'], PASSWORD_DEFAULT);

                $this->userModel->registerUser($data);

                flash('registerSuccess', 'You are now registered and can log in');
                redirect('users/login');

            } else {
                $this->view('users/register', $data);
            }

            

        } else {
            $data = [
                'title' => $title,
                'body' => $body,
                'email' => '',
                'userName' => '',
                'password' => '',
                'confirmPassword' => '',
                'emailErr' => '',
                'userNameErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => ''
            ];
            $this->view('users/register', $data);
        }

        
    }

    public function login(){

        $data = [
            'title' => 'Login',
            'body' => 'This is where you login to the site',
            'email' => '',
            'password' => '',
            'emailErr' => '',
            'passwordErr' => ''
        ];

        $this->view('users/login', $data);
    }
}