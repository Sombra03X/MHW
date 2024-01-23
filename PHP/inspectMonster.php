<?php
require 'header.php';
require '../classes/monsters.php';
require '../classes/dbh.php';

try
{
    if (isset($_GET['id']))
    {
        $monsterId = $_GET['id'];

        // make a new monster object
        $monster = new Monsters(NULL, NULL, NULL, NULL, NULL, NULL, $conn);

        // set id 
        $monster->setMonsterId($monsterId);

        // call readMonster method
        $selectedMonster = $monster->readMonster();

        // display Monster info
        if ($selectedMonster)
        {
            ?>
            <title>MHW - <?php echo $selectedMonster['monster_name'] ?></title>
            <h1><?php echo $selectedMonster['monster_name']; ?></h1>
            <br>
            <h2><?php echo $selectedMonster['monster_type']; ?></h2>
            <br>
            <img id="icon" src="<?php echo $selectedMonster['monster_icon']; ?>" alt="<?php echo $selectedMonster['monster_name']; ?>">
            <br>
            <img id="render" src="<?php echo $selectedMonster['monster_render']; ?>" alt="<?php echo $selectedMonster['monster_name']; ?>">
            <br>
            <paragraph id="info"><?php echo $selectedMonster['monster_info']; ?></paragraph>
            <br>
            <iframe width="560" height="315" src="<?php echo $selectedMonster['monster_cutscene']; ?>" title="YouTube video player" frameborder="0"></iframe>

            <?php
        } else {
            echo "Monster not found.";
        }
    } else {
        echo "Invalid monster ID.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>