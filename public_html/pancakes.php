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



        <div class="recipe">
            <div class="recipe-title">
                <h2>Pancakes Recipe</h2>
            </div>
            <a target="_blank" href="pancakes.jpg">
                <img src="pancakes.jpg" alt="Pancakes" width="300" height="200">
            </a>

            <div class="img-desc">Pancakes, photo by Pixabay </div>

            <div class="recipe-desc">Prep: 5 min. Bake: 15 min &nbsp;&nbsp;   Yield: 2-4 Servings</div>

            <div class="recipe-title">
                <h3>Ingredients</h3>
            </div>


            <ul class="ingredients">
                <li>1 1/2 cups all-purpose flour</li>
                <li>3 1/2 teaspoons baking powder</li>
                <li>1 teaspoon salt</li>
                <li>1 tablespoon white sugar</li>
                <li>1 1/4 cups milk</li>
                <li>1 egg</li>
                <li>3 tablespoons butter, melted</li>
            </ul>  

            <div class="recipe-title">
                <h3>Directions</h3>
            </div>

            <ul class="directions">
                <li>In a large bowl, sift together the flour, baking powder, salt and sugar.
                    Make a well in the center and pour in the milk, egg and melted butter; mix until smooth.
                </li>
                <li>Heat a lightly oiled griddle or frying pan over medium high heat.
                    Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake.
                    Brown on both sides and serve hot.</li>
            </ul> 

            <div class="recipe-title">
                <h3>Comments</h3>
            </div>


            <div class="boxed">

                <h3>Jonas said:</h3>
                <p>Wow what a great dish it was so fun to make and tasated delicious! This is a very long comment 
                    This is a very long comment This is a very long comment This is a very long comment </p>

            </div>

            <div class="boxed">

                <h3>Martin said:</h3>
                <p>I tried to make this dish but failed again, the recipes on this website are too difficult for me...</p>

            </div>



        </div>

        <div class="footer">
            <p>Tasty Recipes (Trademark 2017)</p>
        </div>

    </body>
</html>