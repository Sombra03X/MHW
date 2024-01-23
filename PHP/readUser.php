<?php
require 'header.php';
// Include necessary files and dependencies
require_once '../classes/dbh.php';  // database connection file
require_once '../classes/users.php'; // Users class file

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Create an instance of the Users class
$user = new Users(NULL, $_SESSION['username'], NULL, NULL, NULL, $conn);

// Read user data
$userData = $user->readUser();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // check if the update button is clicked
    if (isset($_POST['update']))
    {
        // Retrieve form data
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];
    $newRole = $_POST['newRole'];

    // Update user data
    $user->setUsername($newUsername);
    $user->setEmail($newEmail);
    $user->setPassword($newPassword);
    $user->setRole($newRole);
    $user->updateUser();

    // Redirect to user account info page
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
    } elseif (isset($_POST['delete'])) {
        // Delete user
        $user->deleteUser();

        // Redirect to the login page
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
    <title>MHW - <?php echo $userData['username']?></title>
    <h2>Update User Data</h2>
    
    <form method="post" action="">
        <div>
            <label for="userId">User ID:</label>
            <br>
            <input type="text" id="userId" name="userId" value="<?php echo $userData['user_id']; ?>" readonly>
        </div>
        <br>
        <div>
            <label for="newUsername">Username:</label>
            <br>
            <input type="text" id="newUsername" name="newUsername" value="<?php echo $userData['username']; ?>" required>
        </div>
        <br>
        <div>
            <label for="newEmail">Email:</label>
            <br>
            <input type="email" id="newEmail" name="newEmail" value="<?php echo $userData['email']; ?>" required>
        </div>
        <br>
        <div>
            <label for="newPassword">Password:</label>
            <br>
            <input type="password" id="newPassword" name="newPassword" value="">
        <div>
            <label for="newRole">Role:</label>
            <br>
            <input type="text" id="newRole" name="newRole" value="<?php echo $userData['role']; ?>" readonly>
        </div>
        <br>
        <div>
            <button type="submit" name="update">Update</button>
        </div>
        <br>
        <div>
            <button type="submit" name="delete">Delete</button>
        </div>
    </form>
    
    <p><a class="button" href="readUser.php">Back to Account Info</a></p>
</body>
</html>
