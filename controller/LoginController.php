<?php
require 'model/LoginModel.php'; //import model 
$m = trim($_GET['m']??'index');//The default function in the controller is named index
$m = strtolower($m);// Lowercase all function names
switch($m){
    case 'index':
        index();
    break;
    case 'handle':
        handleLogin();
        break;
    case 'logout':
        handelLogout();
        break;    
    default:
        index();
    break;
}

function handelLogout()
{
    if(isset($_POST['btnLogout'])){
        //cancel sessions
        session_destroy();
        //GO BACK TO LOGIN PAGE
        header("Location:index.php");
    }
}
function handleLogin(){
    if(isset($_POST['btnLogin'])){
        $username = trim($_POST['username']?? null);
        $username =strip_tags($username); //striptag :delete tags
        $password = trim($_POST['password']??null);
        $password = strip_tags($password);

        $userInfo = checkLoginUser($username, $password);

        if(!empty($userInfo)){

            // account exists
             //save user information session
            $_SESSION['username']=$userInfo['username'];
            $_SESSION['full_name']=$userInfo['full_name'];
            $_SESSION['email']=$userInfo['email'];
            $_SESSION['idUser']=$userInfo['user_id'];
            $_SESSION['roleID']=$userInfo['role_id'];
            $_SESSION['idAccount']=$userInfo['id'];
            // Add it to the admin page
            header("Location:index.php?c=dashboard");
        }else{
            // the account is not the same
             // return to the page being entered and report errors
            header("Location:index.php?state=error");
        }
    }
}

function index(){
    if(isLoginUser()){
        header("Location:index:php?c=dashboard");
        exit();
    }
    require "view/login/index_view.php";
}