<?php
session_start();

//testing users
$userinfo = array(
                'user1'=>'password1',
                'user2'=>'password2'
                );

$username=$_POST['username']; 
$password=$_POST['password']; 

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
    }
}
?>