<?php

class Monsters
{
    // properties
    private $monster_id;
    private $monster_name;
    private $monster_type;
    private $monster_threatLevel;
    private $monster_weakness1;
    private $monster_weakness2;
    private $monster_blight;
    private $monster_status;
    private $monster_image;
    private $monster_characteristics;
    private $conn;

    // constructor
    public function __construct($monster_id, $monster_name, $monster_type, $monster_threatLevel, $monster_weakness1, $monster_weakness2,
    $monster_blight, $monster_status, $monster_image, $monster_characteristics, $conn)
    {
        $this->monster_id = $monster_id;
        $this->monster_name = $monster_name;
        $this->monster_type = $monster_type;
        $this->monster_threatLevel = $monster_threatLevel;
        $this->monster_weakness1 = $monster_weakness1;
        $this->monster_weakness2 = $monster_weakness2;
        $this->monster_blight = $monster_blight;
        $this->monster_status = $monster_status;
        $this->monster_image = $monster_image;
        $this->monster_characteristics = $monster_characteristics;
        $this->conn = $conn;
    }

    // getters
    public function getMonsterId()
    {
        return $this->monster_id;
    }

    public function getMonsterName()
    {
        return $this->monster_name;
    }

    public function getMonsterType()
    {
        return $this->monster_type;
    }

    public function getMonsterThreatLevel()
    {
        return $this->monster_threatLevel;
    }

    public function getMonsterWeakness1()
    {
        return $this->monster_weakness1;
    }

    public function getMonsterWeakness2()
    {
        return $this->monster_weakness2;
    }

    public function getMonsterBlight()
    {
        return $this->monster_blight;
    }

    public function getMonsterStatus()
    {
        return $this->monster_status;
    }

    public function getMonsterImage()
    {
        return $this->monster_image;
    }

    public function getMonsterCharacteristics()
    {
        return $this->monster_characteristics;
    }

    // setters
    public function setMonsterId($monster_id)
    {
        $this->monster_id = $monster_id;
    }

    public function setMonsterName($monster_name)
    {
        $this->monster_name = $monster_name;
    }

    public function setMonsterType($monster_type)
    {
        $this->monster_type = $monster_type;
    }

    public function setMonsterThreatLevel($monster_threatLevel)
    {
        $this->monster_threatLevel = $monster_threatLevel;
    }

    public function setMonsterWeakness1($monster_weakness1)
    {
        $this->monster_weakness1 = $monster_weakness1;
    }

    public function setMonsterWeakness2($monster_weakness2)
    {
        $this->monster_weakness2 = $monster_weakness2;
    }

    public function setMonsterBlight($monster_blight)
    {
        $this->monster_blight = $monster_blight;
    }

    public function setMonsterStatus($monster_status)
    {
        $this->monster_status = $monster_status;
    }

    public function setMonsterImage($monster_image)
    {
        $this->monster_image = $monster_image;
    }

    public function setMonsterCharacteristics($monster_characteristics)
    {
        $this->monster_characteristics = $monster_characteristics;
    }

    // methods
    // create monster
    public function CreateMonster()
    {
        // define the query
        $sql = "INSERT INTO monsters (monster_name, monster_type, monster_threatLevel, monster_weakness1, monster_weakness2, monster_blight,
        monster_status, monster_image, monster_characteristics) VALUES (:monster_name, :monster_type, :monster_threatLevel, :monster_weakness1, 
        :monster_weakness2, :monster_blight, :monster_status, :monster_image, :monster_characteristics)";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':monster_name', $this->monster_name);
            $stmt->bindParam(':monster_type', $this->monster_type);
            $stmt->bindParam(':monster_threatLevel', $this->monster_threatLevel);
            $stmt->bindParam(':monster_weakness1', $this->monster_weakness1);
            $stmt->bindParam(':monster_weakness2', $this->monster_weakness2);
            $stmt->bindParam(':monster_blight', $this->monster_blight);
            $stmt->bindParam(':monster_status', $this->monster_status);
            $stmt->bindParam(':monster_image', $this->monster_image);
            $stmt->bindParam(':monster_characteristics', $this->monster_characteristics);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // read monster
    public function ReadMonster()
    {
        // define the query
        $sql = "SELECT * FROM monsters";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // fetch the results
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return the results
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // update monster
    public function UpdateMonster()
    {
        // define the query
        $sql = "UPDATE monsters SET monster_name = :monster_name, monster_type = :monster_type, monster_threatLevel = :monster_threatLevel, 
        monster_weakness1 = :monster_weakness1, monster_weakness2 = :monster_weakness2, monster_blight = :monster_blight, monster_status = :monster_status, 
        monster_image = :monster_image, monster_characteristics = :monster_characteristics WHERE monster_id = :monster_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':monster_name', $this->monster_name);
            $stmt->bindParam(':monster_type', $this->monster_type);
            $stmt->bindParam(':monster_threatLevel', $this->monster_threatLevel);
            $stmt->bindParam(':monster_weakness1', $this->monster_weakness1);
            $stmt->bindParam(':monster_weakness2', $this->monster_weakness2);
            $stmt->bindParam(':monster_blight', $this->monster_blight);
            $stmt->bindParam(':monster_status', $this->monster_status);
            $stmt->bindParam(':monster_image', $this->monster_image);
            $stmt->bindParam(':monster_characteristics', $this->monster_characteristics);
            $stmt->bindParam(':monster_id', $this->monster_id);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // delete monster
    public function DeleteMonster()
    {
        // define the query
        $sql = "DELETE FROM monsters WHERE monster_id = :monster_id";

        try {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':monster_id', $this->monster_id);

            // execute the query
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}