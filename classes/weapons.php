<?php

class Weapons
{
    // properties
    private $weapon_id;
    private $weapon_type;
    private $weapon_name;
    private $weapon_dmg;
    private $weapon_element;
    private $weapon_elementType;
    private $weapon_affinity;
    private $weapon_sharpness;
    private $weapon_image;
    private $conn;

    // constructor
    public function __construct($weapon_id, $weapon_type, $weapon_name, $weapon_dmg, $weapon_element, $weapon_elementType, 
    $weapon_affinity, $weapon_sharpness, $weapon_image, $conn)
    {
        $this->weapon_id = $weapon_id;
        $this->weapon_type = $weapon_type;
        $this->weapon_name = $weapon_name;
        $this->weapon_dmg = $weapon_dmg;
        $this->weapon_element = $weapon_element;
        $this->weapon_elementType = $weapon_elementType;
        $this->weapon_affinity = $weapon_affinity;
        $this->weapon_sharpness = $weapon_sharpness;
        $this->weapon_image = $weapon_image;
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

    public function getWeaponName()
    {
        return $this->weapon_name;
    }

    public function getWeaponDmg()
    {
        return $this->weapon_dmg;
    }

    public function getWeaponElement()
    {
        return $this->weapon_element;
    }   

    public function getWeaponElementType()
    {
        return $this->weapon_elementType;
    }

    public function getWeaponAffinity()
    {
        return $this->weapon_affinity;
    }

    public function getWeaponSharpness()
    {
        return $this->weapon_sharpness;
    }

    public function getWeaponImage()
    {
        return $this->weapon_image;
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

    public function setWeaponName($weapon_name)
    {
        $this->weapon_name = $weapon_name;
    }

    public function setWeaponDmg($weapon_dmg)
    {
        $this->weapon_dmg = $weapon_dmg;
    }

    public function setWeaponElement($weapon_element)
    {
        $this->weapon_element = $weapon_element;
    }   

    public function setWeaponElementType($weapon_elementType)
    {
        $this->weapon_elementType = $weapon_elementType;
    }

    public function setWeaponAffinity($weapon_affinity)
    {
        $this->weapon_affinity = $weapon_affinity;
    }

    public function setWeaponSharpness($weapon_sharpness)
    {
        $this->weapon_sharpness = $weapon_sharpness;
    }

    public function setWeaponImage($weapon_image)
    {
        $this->weapon_image = $weapon_image;
    }

    // methods
    // create weapon
    public function createWeapon()
    {
        // define the query
        $sql = "INSERT INTO weapons (weapon_type, weapon_name, weapon_dmg, weapon_element, weapon_elementType, weapon_affinity, 
        weapon_sharpness, weapon_image) VALUES 
        (:weapon_type, :weapon_name, :weapon_dmg, :weapon_element, :weapon_elementType, :weapon_affinity, :weapon_sharpness, :weapon_image)";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':weapon_type', $this->weapon_type);
            $stmt->bindParam(':weapon_name', $this->weapon_name);
            $stmt->bindParam(':weapon_dmg', $this->weapon_dmg);
            $stmt->bindParam(':weapon_element', $this->weapon_element);
            $stmt->bindParam(':weapon_elementType', $this->weapon_elementType);
            $stmt->bindParam(':weapon_affinity', $this->weapon_affinity);
            $stmt->bindParam(':weapon_sharpness', $this->weapon_sharpness);
            $stmt->bindParam(':weapon_image', $this->weapon_image);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // read all weapons
    public function readWeapon()
    {
        // define the query
        $sql = "SELECT * FROM weapons";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // fetch the results
            $weapons = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return the results
            return $weapons;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateWeapon()
    {
        // define the query
        $sql = "UPDATE weapons SET weapon_type = :weapon_type, weapon_name = :weapon_name, weapon_dmg = :weapon_dmg, 
        weapon_element = :weapon_element, weapon_elementType = :weapon_elementType, weapon_affinity = :weapon_affinity, 
        weapon_sharpness = :weapon_sharpness, weapon_image = :weapon_image WHERE weapon_id = :weapon_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':weapon_type', $this->weapon_type);
            $stmt->bindParam(':weapon_name', $this->weapon_name);
            $stmt->bindParam(':weapon_dmg', $this->weapon_dmg);
            $stmt->bindParam(':weapon_element', $this->weapon_element);
            $stmt->bindParam(':weapon_elementType', $this->weapon_elementType);
            $stmt->bindParam(':weapon_affinity', $this->weapon_affinity);
            $stmt->bindParam(':weapon_sharpness', $this->weapon_sharpness);
            $stmt->bindParam(':weapon_image', $this->weapon_image);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // delete weapon
    public function deleteWeapon()
    {
        // define the query
        $sql = "DELETE FROM weapons WHERE weapon_id = :weapon_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':weapon_id', $this->weapon_id);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}