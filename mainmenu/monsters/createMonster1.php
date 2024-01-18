<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create monster 1</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #f44336;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>
<header>
    <ul>
        <li><a href="../mainmenu.php">Menu</a></li>
        <li><a href="../../index.php">Uitloggen</a></li>
    </ul>
</header>
<body>
<h1>Create kamer 1</h1>
<form action="createMonster2.php" method="post">
    <label for="monster_name">Monster name</label>
    <input type="text" id="monster_name" name="monster_name"><br/>
    <label for="monster_type">Monster type</label>
    <input type="text" id="monster_type" name="monster_type"><br/>
    <label for="monster_threatLevel">Monster threat level</label>
    <input type="text" id="monster_threatLevel" name="monster_threatLevel"><br/>
    <label for="monster_weakness1">Monster Weakness</label>
    <input type="text" id="monster_weakness1" name="monster_weakness1"><br/>
    <label for="monster_weakness2">Monster Weakness 2</label>
    <input type="text" id="monster_weakness2" name="monster_weakness2"><br/>
    <label for="monster_blight">Monster Blight</label>
    <input type="text" id="monster_blight" name="monster_blight"><br/>
    <label for="monster_status">Monster Status</label>
    <input type="text" id="monster_status" name="monster_status"><br/>
    <label for="monster_image">Monster Image</label>
    <input type="text" id="monster_image" name="monster_image"><br/>
    <label for="monster_characteristics">Monster Characteristics</label>
    <input type="text" id="monster_characteristics" name="monster_characteristics"><br/>
    <label for="monster_id">Monster ID</label>
    <input type="text" id="monster_id" name="monster_id"><br/>
    <input type="submit">
</form>
</body>
</html>
