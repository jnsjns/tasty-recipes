<?php
session_start();


$commentData = file('meatball-comments.txt');

if (isset($_GET['logout'])) {
    Session_destroy();
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if (isset($_POST['comment'])) {
    $user = $_SESSION['username'];
    $uniqueId= time();
    $data = $uniqueId . ':' . $user . ':' . $_POST['comment'] . "\n";
    $ret = file_put_contents('meatball-comments.txt', $data, FILE_APPEND | LOCK_EX);
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
                $contents = file_get_contents('meatball-comments.txt');
                $contents = str_replace($line, '', $contents);
                file_put_contents('meatball-comments.txt', $contents);
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
                <h2>Swedish Meatballs Recipe</h2>
            </div>
            <a target="_blank" href="meatballs.jpg">
                <img src="meatballs.jpg" alt="Meatballs" width="300" height="200">
            </a>

            <div class="img-desc">Swedish meatballs, photo by Pixabay </div>

            <div class="recipe-desc">Prep: 30 min. Bake: 1 hour &nbsp;&nbsp;   Yield: 8-10 Servings</div>

            <div class="recipe-title">
                <h3>Ingredients</h3>
            </div>


            <ul class="ingredients">
                <li>4 eggs</li>
                <li>1 cup milk</li>
                <li>8 slices white bread, torn</li>
                <li>2 pounds ground beef</li>
                <li>1/4 cup finely chopped onion</li>
                <li>4 teaspoons baking powder</li>
                <li>1 to 2 teaspoons salt</li>
                <li>1 teaspoon pepper</li>
                <li>2 tablespoons shortening</li>
                <li>2 cans (10-3/4 ounces <i>each</i>) condensed cream of chicken soup, undiluted</li>
                <li>2 cans (10-3/4 ounces <i>each</i>) condensed cream of mushroom soup, undiluted</li>
                <li>1 can (12 ounces) evaporated milk</li>
                <li>Minced fresh parsley</li>
            </ul>  

            <div class="recipe-title">
                <h3>Directions</h3>
            </div>

            <ul class="directions">
                <li>In a large bowl, beat eggs and milk. Add bread; mix gently and let stand for 5 minutes. 
                    Add beef, onion, baking powder, salt and pepper; mix well (mixture will be soft).
                    Shape into 1-in. balls.
                </li>
                <li>In a large skillet, brown meatballs, a few at a time, in shortening. Place in an ungreased 3-qt. baking dish.
                    In a bowl, stir soups and milk until smooth; pour over meatballs. Bake, uncovered at 350&deg; for 1 hour. Sprinkle with parsley.
                    <b>Yield:</b> 8-10 servings.</li>
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
                                <td><p class="comment-author"><?= $author ?>: </p>
                                    <p class="comment-text">   <?= $comment ?></p>

                                <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $author): ?>
                                    <form class ="delete-form" action="" method="post">
                                        <input type="hidden" name="delete" value=<?= $id . ',' . $author?>><br>
                                        <input type="submit" value="Delete">
                                    </form>
                                <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>


            <?php if (isset($_SESSION['username'])): ?>
                <form class="post-form" action="" method="post">
                    Write a comment as <?= $_SESSION['username'] ?>:
                    <input type="text" name="comment" value="" placeholder="Comment..."><br>
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
