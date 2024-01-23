<?php
require 'header.php';
?>

<title>MHW - Monsters</title>
<h1>Monsters</h1>

<?php
// include db handler and monsters class
require_once '../classes/dbh.php';
require_once '../classes/monsters.php';

try
{
    // make a new monster object
    $monster = new Monsters(NULL, NULL, NULL, NULL, NULL, NULL, $conn);

    // call readAllMonsters method
    $monsters = $monster->readAllMonsters();

    // display monsters registered in database
    if ($monsters) 
    {
        ?>
        <h3>Press on the monster icon to inspect the monster.</h3>
        <table>
            <thead>
                <tr>
                    <th>Monster name</th>
                    <th>Monster type</th>
                    <th>Monster icon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($monsters as $monster)
                {
                    ?>
                    <tr>
                        <td><?php echo $monster['monster_name']; ?></td>
                        <td><?php echo $monster['monster_type']; ?></td>
                        <td><a href="inspectMonster.php?id=<?php echo $monster['monster_id']; ?>">
                        <img id="img" src="<?php echo $monster['monster_icon']; ?>" 
                        alt="<?php echo $monster['monster_name']; ?>"></a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}