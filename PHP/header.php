<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="lamborghini.ico">
    <link href="../CSS/style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <audio id="audio" src="../audio/POAH.m4a" autoplay loop></audio>
    <nav id="nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
            if (isset($_SESSION['username']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'developer')) {
            echo "<li><a href='addMonster.php'>Add a monster</a></li>";
            echo "<li><a href='AddWeapon.php'>Add a weapon</a></li>";
            echo "<li><a href='userList.php'>User List</a></li>";
            }
            ?>
            <li><a href="WeaponList.php">Weapons</a></li>
            <li><a href="MonsterList.php">Monsters</a></li>
            <?php 
            if (!isset($_SESSION['username'])) {
                echo "<li><a href='register.php'>Register</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
            } else {
                echo "<li><a href='readUser.php'>Username: " . $_SESSION["username"] . "</a></li>";
                if ($_SESSION['role'] == 'visitor') {
                    echo "<li>visitor</li>";
                } else if ($_SESSION['role'] == 'admin') {
                    echo "<li>Admin</li>";
                } else {
                    echo "<li>developer</li>";
                }
                echo "<li><a href='readUser.php'>Account info</a></li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            ?>
        </ul>
    </nav>
    <main>