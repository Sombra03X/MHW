<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
class Users
{
    // Properties
    private $user_id;
    private $username;
    private $password;
    private $email;
    private $role;
    private $conn;

    // Constructor
    public function __construct($user_id = NULL, $username, $password, $email, $role = NULL, $conn = NULL)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->conn = $conn;
    }

    // getters
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    // setters
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    // Methods
    // Create user
    public function createUser()
    {
        // define the query
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':email', $this->email);
            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Read user
    public function readUser()
    {
        // define the query
        $sql = "SELECT * FROM users WHERE username = :username";

        try {
            // prepre the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':username', $this->username);

            // execute the query
            $stmt->execute();

            // fetch the results
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // return the results
            if ($result) {
                $this->user_id = $result['user_id'];
                $this->username = $result['username'];
                $this->password = $result['password'];
                $this->email = $result['email'];
                $this->role = $result['role'];
                return $result;
            } else {
                echo "User not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Read all users
    public function readAllUsers()
    {
        // define the query
        $sql = "SELECT * FROM users";

        try
        {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // execute statement
            $stmt->execute();

            // fetch users
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return users
            if ($users)
            {
                return $users;
            } else {
                echo "No users found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // update user role
    public function updateUserRole($user_id, $new_role) {
        // define the query
        $sql = "UPDATE users SET role = :role WHERE user_id = :user_id";
        try{
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind parameters to the placeholder
            $stmt->bindParam(":role", $new_role);
            $stmt->bindParam(":user_id", $user_id);

            // execute the prepared statement
            $stmt->execute();
        } catch (PDOException $e) {
            // handle exceptions
            echo "Error: " . $e->getMessage();
        }
    }

    // Update user
    public function updateUser($newPassword = null)
    {
        // Define the query
        $sql = "UPDATE users SET username = :username, email = :email, role = :role";

        // Include password update only if a new password is provided
        if ($newPassword !== null) {
            $sql .= ", password = :password";
        }

        $sql .= " WHERE user_id = :user_id";

        try {
            // Prepare the statement

             $stmt = $this->conn->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':role', $this->role);
            $stmt->bindParam(':user_id', $this->user_id);

            // Include password binding only if a new password is provided
            // if ($newPassword) {
                 $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                 $stmt->bindParam(':password', $hashedPassword);
             //}

            // Execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
        }
    }

    // Delete user
    public function deleteUser()
    {
        // define the query
        $sql = "DELETE FROM users WHERE user_id = :user_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':user_id', $this->user_id);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}