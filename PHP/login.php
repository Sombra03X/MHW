<?php
require 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require '../classes/users.php'; // requires the Users class
    require '../classes/dbh.php'; // requires the database handler

    $username = $_POST["username"];
    $password = $_POST["password"];

    // fetch the user by username
    $user = new Users(NULL, $username, $password, NULL, NULL, $conn);

    $user1 = $user->readUser();
    // verify the password
    if ($user1 && password_verify($password, $user1['password'])) {

        // password is correct
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user1['role'];
        $_SESSION['email'] = $user1['email'];

        header("Location: index.php");
    } else {
        // invalid login credentials
        echo "<p>Invalid username or password.</p>";
    }
}
?>
<title>MHW - login</title>
<h1>Login</h1>
<hr>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <div>
        <label for="username">Username *</label>
        <br>
        <input placeholder="Enter your username" type="text" name="username" id="username" required>
    </div>
    <br>
    <div>
        <label for="password">Password *</label>
        <br>
        <input placeholder="Enter your password" type="password" name="password" id="password" required>
    </div>
    <br>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
<?php
require 'footer.php';
?>