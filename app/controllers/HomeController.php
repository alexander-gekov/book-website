<?php

class HomeController extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        if(isLoggedIn()){
            redirect('books/index');
        }
        else{
            redirect('users/login');
        }
    }

}
