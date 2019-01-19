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
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['emailErr'] = 'Sorry, email already registered';
                }
            }

            //Validate the username
            //cannot be empty
            if(empty($data['userName'])){
                $data['userNameErr'] = 'You must enter a user name';
            } else {
                if($this->userModel->getUserByUserName($data['userName'])){
                    $data['userNameErr'] = 'Sorry, that username is already taken';
                }
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
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanetize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Initialize the data
            $data = [
                'title' => 'Login',
                'body' => 'This is where you login to the site',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailErr' => '',
                'passwordErr' => ''
            ];
            
            //validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'You have not entered an email';
            }

            //Validate password
            if(empty($data['password'])){
                $data['passwordErr'] = 'You have not entered a password';
            }

            if($this->userModel->findUserByEmail($data['email'])){
                //Found user
            } else {
                $data['emailErr'] = 'Cannot find any user with that email';
            }

            //make sure all errors are empty
            if(empty($data['emailErr']) && empty($data['passwordErr'])){

                $loggedInUser = $this->userModel->loginUser($data['email'], $data['password']);
                
                if($loggedInUser){
                    $this->setUserSession($loggedInUser);
                } else {
                    $data['passwordErr'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }


            } else {
                $this->view('users/login', $data);
            }

        }

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

    public function setUserSession($user){
        $_SESSION['userEmail'] = $user->email;
        $_SESSION['userName'] = $user->userName;
        $_SESSION['userId'] =  $user->id;
        redirect('index');
    }

    public function profile(){
        $user = $this->userModel->getUserById($_SESSION['userId']);

        $data = [
            'title' => $user->userName ."'s profile page",
            'userName' => $user->userName,
            'email' => $user->email,
            'createdAt' => $user->createdAt
        ];

        $this->view('users/profile', $data);
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();

        redirect('users/login');
    }
}