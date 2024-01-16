<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>update monster 2</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #f44336;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../index.php">Log out</a></li>
    </ul>
</header>
<body>
<h1>Monster update</h1>
<p>Update monster</p>
<h1>Update monster 2</h1>
<p>
    Which monster do you want to edit?
</p>

<?php
require "../../classes/monsters.php";

$monster_id=$_POST["monsterid"];

$monsters1 = new Monsters($monster_id);
$monsters1->updateMonster();
?>
</body>
</html>
