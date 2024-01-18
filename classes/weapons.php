<?php

class Weapons
{
    // properties
    private $weapon_id;
    private $weapon_type;
    private $difficulty_using;
    private $difficulty_mastering;
    private $weapon_info;
    private $weapon_logo;
    private $weapon_overview;
    private $conn;

    // constructor
    public function __construct($weapon_id, $weapon_type, $difficulty_using, $difficulty_mastering, $weapon_info, $weapon_logo,
     $weapon_overview, $conn)
    {
        $this->weapon_id = $weapon_id;
        $this->weapon_type = $weapon_type;
        $this->difficulty_using = $difficulty_using;
        $this->difficulty_mastering = $difficulty_mastering;
        $this->weapon_info = $weapon_info;
        $this->weapon_logo = $weapon_logo;
        $this->weapon_overview = $weapon_overview;
        $this->conn = $conn;
    }

    // getters
    public function getWeaponId()
    {
        return $this->weapon_id;
    }

    public function getWeaponType()
    {
        return $this->weapon_type;
    }

    public function getDifficultyUsing()
    {
        return $this->difficulty_using;
    }

    public function getDifficultyMastering()
    {
        return $this->difficulty_mastering;
    }

    public function getWeaponInfo()
    {
        return $this->weapon_info;
    }

    public function getWeaponLogo()
    {
        return $this->weapon_logo;
    }

    public function getWeaponOverview()
    {
        return $this->weapon_overview;
    }

    // setters
    public function setWeaponId($weapon_id)
    {
        $this->weapon_id = $weapon_id;
    }

    public function setWeaponType($weapon_type)
    {
        $this->weapon_type = $weapon_type;
    }

    public function setDifficultyUsing($difficulty_using)
    {
        $this->difficulty_using = $difficulty_using;
    }

    public function setDifficultyMastering($difficulty_mastering)
    {
        $this->difficulty_mastering = $difficulty_mastering;
    }

    public function setWeaponInfo($weapon_info)
    {
        $this->weapon_info = $weapon_info;
    }

    public function setWeaponLogo($weapon_logo)
    {
        $this->weapon_logo = $weapon_logo;
    }

    public function setWeaponOverview($weapon_overview)
    {
        $this->weapon_overview = $weapon_overview;
    }

    // methods

    // create
    public function createWeapon()
    {
        // define the query
        $sql = "INSERT INTO weapons (weapon_type, difficulty_using, difficulty_mastering, weapon_info, weapon_logo, weapon_overview) VALUES 
        (:weapon_type, :difficulty_using, :difficulty_mastering, :weapon_info, :weapon_logo, :weapon_overview)";

        try{
            // prepare the statement
            $stmt = $this->conn->prepare($query);

            // bind the parameters
            $stmt->bindParam(':weapon_type', $this->weapon_type);
            $stmt->bindParam(':difficulty_using', $this->difficulty_using);
            $stmt->bindParam(':difficulty_mastering', $this->difficulty_mastering);
            $stmt->bindParam(':weapon_info', $this->weapon_info);
            $stmt->bindParam(':weapon_logo', $this->weapon_logo);
            $stmt->bindParam(':weapon_overview', $this->weapon_overview);

            // execute the query
            $stmt->execute();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    // read
    public function readWeapon()
    {
        // define the query
        $sql = "SELECT * FROM weapons";

        try{
            // prepare the statement
            $stmt = $this->conn->prepare($query);

            // execute the query
            $stmt->execute();

            // return the result
            return $stmt;
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    // read single
    public function readSingleWeapon()
    {
        // define the query
        $sql = "SELECT * FROM weapons WHERE weapon_id = :weapon_id";

        try{
            // prepare the statement
            $stmt = $this->conn->prepare($query);

            // bind the parameters
            $stmt->bindParam(':weapon_id', $this->weapon_id);

            // execute the query
            $stmt->execute();

            // fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // return the result
            return $result;
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    // update
    public function updateWeapon()
    {
        // define the query
        $sql = "UPDATE weapons SET weapon_type = :weapon_type, difficulty_using = :difficulty_using, difficulty_mastering = :difficulty_mastering, 
        weapon_info = :weapon_info, weapon_logo = :weapon_logo, weapon_overview = :weapon_overview WHERE weapon_id = :weapon_id";

        try{
            // prepare the statement
            $stmt = $this->conn->prepare($query);

            // bind the parameters
            $stmt->bindParam(':weapon_type', $this->weapon_type);
            $stmt->bindParam(':difficulty_using', $this->difficulty_using);
            $stmt->bindParam(':difficulty_mastering', $this->difficulty_mastering);
            $stmt->bindParam(':weapon_info', $this->weapon_info);
            $stmt->bindParam(':weapon_logo', $this->weapon_logo);
            $stmt->bindParam(':weapon_overview', $this->weapon_overview);
            $stmt->bindParam(':weapon_id', $this->weapon_id);

            // execute the query
            $stmt->execute();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    // delete
    public function deleteWeapon()
    {
        // define the query
        $sql = "DELETE FROM weapons WHERE weapon_id = :weapon_id";

        try{
            // prepare the statement
            $stmt = $this->conn->prepare($query);

            // bind the parameters
            $stmt->bindParam(':weapon_id', $this->weapon_id);

            // execute the query
            $stmt->execute();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}