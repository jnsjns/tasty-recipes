<?php
session_start();


$commentData = file('comments.txt');

if (isset($_GET['logout'])) {
    Session_destroy();
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if (isset($_POST['comment'])) {
    $user = $_SESSION['username'];
    $uniqueId= time();
    $data = $uniqueId . ':' . $user . ':' . $_POST['comment'] . "\n";
    $ret = file_put_contents('comments.txt', $data, FILE_APPEND | LOCK_EX);
    if ($ret === false) {
        die('There was an error writing this file');
    } else {
        echo "$ret bytes written to file";
    }
    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['delete'])){
    var_dump($_POST);
    $deleteInfo = $_POST['delete'];
    list($deleteId, $deleteAuthor) = explode(",", $deleteInfo);
    if($_SESSION['username'] == $deleteAuthor){
        foreach($commentData as $line){
            list($id, $author, $comment) = explode(":", $line);
            if ($id == $deleteId){
                $contents = file_get_contents('comments.txt');
                $contents = str_replace($line, '', $contents);
                file_put_contents('comments.txt', $contents);
            }
        }
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
            <?php if (isset($_SESSION['username'])): ?>
                <p>You are logged in as <?= $_SESSION['username'] ?> <a href="?logout=1">Logout</a></p>

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

            <?php if (count($commentData) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commentData as $row):
                            list($id, $author, $comment) = explode(":", $row)
                            ?>
                            <tr>
                                <td><?= $author ?> said: <?= $comment ?>

                                <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $author): ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="delete" value=<?= $id . ',' . $author?>><br>
                                        <input type="submit" value="delete">
                                    </form>
                                <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>


            <?php if (isset($_SESSION['username'])): ?>
                <form action="" method="post">
                    Write a comment as <?= $_SESSION['username'] ?> <input type="text" name="comment" value="" placeholder="Comment..."><br>
                    <input type="submit" value="Post">
                </form>

            <?php else: ?>
                <p>Please <a href="login.php">Log in</a> to write comments.</p>
            <?php endif; ?>




        </div>

        <div class="footer">
            <p>Tasty Recipes (Trademark 2017)</p>
        </div>

    </body>
</html>
