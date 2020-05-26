<?php

//Start session
session_start();

function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}

function isAdmin(){
    if(in_array($_SESSION['user_id'],ADMINID)){
        return true;
        die('true');
    }
    else{
        return false;
    }
}
