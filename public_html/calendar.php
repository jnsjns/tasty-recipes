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

        <div class="calendar">
            <header>

                <h2>November 2017</h2>

            </header>
            <table>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
                <tr>
                    <td> &nbsp;</td>
                    <td> &nbsp;</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td class="selected">16
                        <a href="meatballs.html">
                            <img src="meatballs.jpg" alt="Meatballs">
                        </a>
                    </td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>27</td>
                    <td class="selected">28
                        <a href="pancakes.html">
                            <img src="pancakes.jpg" alt="Pancakes">
                        </a>
                    </td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td>&nbsp; </td>
                    <td> &nbsp;</td>
                </tr>
            </table>
        </div>





        <div class="footer">
            <p>Tasty Recipes (Trademark 2017)</p>
        </div>

    </body>
</html>