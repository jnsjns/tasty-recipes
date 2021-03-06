<?php
session_start();

if(isset($_GET['logout'])) {
    Session_destroy();
    header('Location:  ' . $_SERVER['PHP_SELF']);
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


        <div class="row">
            <div class="column side">
                <h2>A recipe for everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
            </div>
            <div class="column middle">
                <h2>Welcome to the Tasty Recipes Website</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>

            </div>
            <div class="column side">
                <h2>Custom food calendar</h2>
                <p>Here on Tasty Recipes we provide you with a custom made food calendar 
                    that is updated every month with daily recipes. Follow along and make today's recipe! Follow the link below
                    to go to the calendar</p>
                <p>
                    <a href="calendar.html">CALENDAR</a>
                </p>

            </div>
        </div>   

        <div class="footer">
            <p>Tasty Recipes (Trademark 2017)</p>
        </div>

    </body>
</html>
