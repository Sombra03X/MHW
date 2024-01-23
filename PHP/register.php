<?php
require 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require '../classes/users.php'; // includes the users class
    require '../classes/dbh.php'; // includes the database handler

    $username = $_POST["username"];
    $noHashPassword = $_POST["password"];
    $password = password_hash($noHashPassword, PASSWORD_DEFAULT);
    $email = $_POST["email"];

    // create object
    $user = new Users(NULL, $username, $password, $email, NULL, $conn);

    // call the create method
    $user->createUser();
?>
    
    <p>Registration succesfull.</p>
    <br>
    <a class="button" href="login.php">Login here!</a>

    <?php
}
?>

<title>MHW - Register</title>
<h1>Register</h1>
<p>Create your account</p>
<hr>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
    <div>
        <label for="username">Username *</label>
        <br>
        <input type="text" name="username" id="username" required>
    </div>
    <br>
    <div>
        <label for="password">Password *</label>
        <br>
        <input type="password" name="password" id="password" required>
    </div>
    <br>
    <div>
        <label for="email">Email *</label>
        <br>
        <input type="email" name="email" id="email" required>
    </div>
    <br>
    <div>
        <button type="submit" value="Register">Register</button>
    </div>
    </form>
    <br>
    <a class="button" href="login.php">Already have an account? Login here!</a>
    <?php
    require 'footer.php';
    ?>