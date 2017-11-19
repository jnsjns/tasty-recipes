<?php
session_start();

if(isset($_GET['logout'])) {
    Session_destroy();
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    $accountData = file('accounts.txt');
    $accessData = array();
    foreach ($accountData as $line) {
        list($savedUser, $savedPass) = explode(':', $line);
        $accessData[trim($savedUser)] = trim($savedPass);
    }
    if($accessData[$_POST['username']] === $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Tasty Recipes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="index.css"/> 
    </head>
    <body>
        <div class="header">
            <h1>Tasty Recipes</h1>
            <?php if(isset($_SESSION['username'])): ?>
                <p>You are logged in as <?=$_SESSION['username']?> <a href="?logout=1">Logout</a></p>
                
            <?php else: ?>
            <p><a href="login.php">Log in</a></p>
            <?php endif; ?>
        </div>  

        <ul class="dropdown-ul">
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Recipes</a>
                <div class="dropdown-content">
                    <a href="pancakes.php">Pancakes</a>
                    <a href="meatballs.php">Meatballs</a>
                </div>
            </li>
        </ul>


        <div class="login">
            
            <?php if(isset($_SESSION['username'])): ?>
                <p>You are logged in as <?=$_SESSION['username']?></p>
                <p><a href="?logout=1">Logout</a></p>
            <?php else: ?>

            <h1>Login</h1>
            <form method="post" action="">
                <label><b>Username</b></label>
                <p><input type="text" name="username" value="" placeholder="username"></p>
                <label><b>Password</b></label>
                <p><input type="password" name="password" value="" placeholder="password"></p>

                <button type="submit">Login</button>
            </form>
            <?php endif; ?>
        </div> 





        <div class="footer">
            <p>Tasty Recipes (Trademark 2017)</p>
        </div>

    </body>
</html>