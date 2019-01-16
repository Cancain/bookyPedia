<?php
class Users extends Controller {

    public function register(){

        $data = [
            'title' => 'Register',
            'body' => 'This is where you register an account on this site'
        ];

        $this->view('users/register', $data);
    }

    public function login(){

        $data = [
            'title' => 'Login',
            'body' => 'This is where you login to the site'
        ];

        $this->view('users/login', $data);
    }
}