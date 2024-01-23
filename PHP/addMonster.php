<?php
require 'header.php';

// check permissions

if (ISSET($_SESSION['username']) && ($_SESSION['role'] == 'developer' || $_SESSION['role'] == 'admin')) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // call db handler and monster class
        require_once '../classes/monsters.php';
        require_once '../classes/dbh.php';

        // retrieve form data
        $monster_name = $_POST['monster_name'];
        $monster_type = $_POST['monster_type'];
        $monster_icon = $_POST['monster_icon'];
        $monster_render = $_POST['monster_render'];
        $monster_info = $_POST['monster_info'];
        $monster_cutscene = $_POST['monster_cutscene'];

        // create monster object
        $monster = new Monsters($monster_name, $monster_type, $monster_icon, $monster_render, $monster_info, $monster_cutscene, $conn);

        // call addMonster method
        $monster->addMonster();

        // confirmation & redirect
        echo "<p>Monster added successfully!</p><br>";
        echo "<a class='button' href='monsterList.php'>To monster list</a>";
        exit();
    }
    ?>
    <head>
    <title>MHW - Add Monster</title>
    </head>

    <h1>Add a monster</h1>
    <hr>
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <div>
        <label for="monster_name">Monster name *</label>
        <br>
        <input type="text" name="monster_name" id="monster_name" required>
    </div>
    <br>
    <div>
        <label for="monster_type">Monster type *</label>
        <br>
        <select name="monster_type" id="monster_type" required>
            <option value="Temnoceran">Temnoceran</option>
            <option value="Bird Wyvern">Bird Wyvern</option>
            <option value="Flying Wyvern">Flying Wyvern</option>
            <option value="Piscine Wyvern">Piscine Wyvern</option>
            <option value="Carapaceon">Carapaceon</option>
            <option value="Amphibian">Amphibian</option>
            <option value="Fanged Beast">Fanged Beast</option>
            <option value="Leviathan">Leviathan</option>
            <option value="Snake Wyvern">Snake Wyvern</option>
            <option value="Brute Wyvern">Brute Wyvern</option>
            <option value="Fanged Wyvern">Fanged Wyvern</option>
            <option value="Elder Dragon">Elder Dragon</option>
            <option value="???">???</option>
        </select>
    </div>
    <br>
    <div>
        <label for="monster_icon">Monster icon *</label>
        <br>
        <input type="text" name="monster_icon" id="monster_icon" required>
    </div>
    <br>
    <div>
        <label for="monster_render">Monster render *</label>
        <br>
        <input type="text" name="monster_render" id="monster_render" required>
    </div>
    <br>
    <div>
        <label for="monster_info">Monster info *</label>
        <br>
        <textarea name="monster_info" id="monster_info" cols="30" rows="10" required></textarea>
    </div>
    <br>
    <div>
        <label for="monster_cutscene">Monster cutscene *</label>
        <br>
        <input type="text" name="monster_cutscene" id="monster_cutscene" required>
    </div>
    <br>
    <div>
        <button type="submit" value="Add monster">Add monster</button>
    </div>
    </form>
    <br>
    <a class="button" href="monsterList.php">Cancel</a>

        <?php
        require 'footer.php';
}
?>