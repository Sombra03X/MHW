<?php
require 'header.php';

// check permissions
if (isset($_SESSION['username']) && $_SESSION['role'] == 'developer' or $_SESSION['role'] == 'admin')
{
    ?> 

<head>
    <title>MHW - Users</title>
</head>
<body>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>Email</th>
                <th>role</th>
                <?php if (isset($_SESSION['email']) && ($_SESSION['role'] == 'developer' || $_SESSION['role'] == 'admin')) {
                 echo "<th>Action</th>";
                } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            // database connection file
            include "../classes/dbh.php";

            // Include User class file
            include "../classes/users.php";

            try {
                // create a new User object
                $user = new Users(null, null, null, null, null, $conn);

                // Call the read function
                $users = $user->readAllUsers();

                // Loop through the user data and generate table rows
                foreach ($users as $user) {
                    echo "<tr>
                    <td>" . $user['user_id'] . "</td>
                    <td>" . $user['username'] . "</td>
                    <td>" . $user['email'] . "</td>
                    <td>" . $user['role'] . "</td>
                    <td>";
                    if (isset($_SESSION['email']) && ($_SESSION['role'] == 'developer' || $_SESSION['role'] == 'admin') && $user['role'] == 'visitor') {
                        // promote to admin
                        echo '<a href="promote.php?id=' . $user['user_id'] . '"><p>Promote to Admin</p></a>';
                    }
                    else if (isset($_SESSION['email']) && $_SESSION['role'] == 'developer' && $user['role'] == 'admin') {
                        // demote to user
                        echo '<a href="demote.php?id=' . $user['user_id'] . '"><p>Demote to Visitor</p></a>';
                    }
                    else {
                        echo '';
                    }
                    echo "</td>
                    </tr>";
                }
            } catch (Exception $e) {
                // Handle exceptions
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "<p>You don't have permission to access this page.</p><br>";
            echo "<a class='button' href='index.php'>Back to home</a>";
        }