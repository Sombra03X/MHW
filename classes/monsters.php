<?php

class Monsters
{
    private $monster_name;
    private $monster_type;
    private $monster_icon;
    private $monster_render;
    private $monster_info;
    private $monster_cutscene;
    private $conn;

    public function __construct($monster_name, $monster_type, $monster_icon, $monster_render, $monster_info, $monster_cutscene, $conn)
    {
        $this->monster_name = $monster_name;
        $this->monster_type = $monster_type;
        $this->monster_icon = $monster_icon;
        $this->monster_render = $monster_render;
        $this->monster_info = $monster_info;
        $this->monster_cutscene = $monster_cutscene;
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

    public function getMonsterIcon()
    {
        return $this->monster_icon;
    }

    public function getMonsterRender()
    {
        return $this->monster_render;
    }

    public function getMonsterInfo()
    {
        return $this->monster_info;
    }

    public function getMonsterCutscene()
    {
        return $this->monster_cutscene;
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

    public function setMonsterIcon($monster_icon)
    {
        $this->monster_icon = $monster_icon;
    }

    public function setMonsterRender($monster_render)
    {
        $this->monster_render = $monster_render;
    }

    public function setMonsterInfo($monster_info)
    {
        $this->monster_info = $monster_info;
    }

    public function setMonsterCutscene($monster_cutscene)
    {
        $this->monster_cutscene = $monster_cutscene;
    }

    // methods
    // create
    public function addMonster()
    {
        // define the query
        $sql = "INSERT INTO monsters (monster_name, monster_type, monster_icon, monster_render, monster_info, monster_cutscene) VALUES 
        (:monster_name, :monster_type, :monster_icon, :monster_render, :monster_info, :monster_cutscene)";

        try
        {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':monster_name', $this->monster_name);
            $stmt->bindParam(':monster_type', $this->monster_type);
            $stmt->bindParam(':monster_icon', $this->monster_icon);
            $stmt->bindParam(':monster_render', $this->monster_render);
            $stmt->bindParam(':monster_info', $this->monster_info);
            $stmt->bindParam(':monster_cutscene', $this->monster_cutscene);

            // execute statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function readAllMonsters()
    {
        // define the query
        $sql = "SELECT * FROM monsters";

        try
        {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // execute statement
            $stmt->execute();

            // fetch monsters
            $monsters = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return monsters
            return $monsters;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function readMonster()
    {
        // define the query
        $sql = "SELECT * FROM monsters WHERE monster_id = :monster_id";

        try
        {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameter
            $stmt->bindParam(':monster_id', $this->monster_id);

            // execute statement
            $stmt->execute();

            // fetch monster
            $monster = $stmt->fetch(PDO::FETCH_ASSOC);

            // return monster
            if ($monster)
            {
                return $monster;
            } else {
                echo "Monster not found.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateMonster()
    {
        // define the query
        $sql = "UPDATE monsters SET monster_name = :monster_name, monster_type = :monster_type, monster_icon = :monster_icon, 
        monster_render = :monster_render, monster_info = :monster_info, monster_cutscene = :monster_cutscene WHERE monster_id = :monster_id";

        try
        {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameters
            $stmt->bindParam(':monster_name', $this->monster_name);
            $stmt->bindParam(':monster_type', $this->monster_type);
            $stmt->bindParam(':monster_icon', $this->monster_icon);
            $stmt->bindParam(':monster_render', $this->monster_render);
            $stmt->bindParam(':monster_info', $this->monster_info);
            $stmt->bindParam(':monster_cutscene', $this->monster_cutscene);

            // execute statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteMonster()
    {
        // define the query
        $sql = "DELETE FROM monsters WHERE monster_id = :monster_id";

        try
        {
            // prepare the statement
            $stmt = $this->conn->prepare($sql);

            // bind the parameter
            $stmt->bindParam(':monster_id', $this->monster_id);

            // execute statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}