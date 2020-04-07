<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include('connect.php');

    $result = $mysqli->query('SELECT * FROM `fk5`');

    while ($row = $result->fetch_object()) {
        echo "<b>$row->Text</b><i>$row->Name</i><br>";
    }

    $result->free();
    $mysqli->close();

    ?>

    <form action="add.php" method="POST">
        <textarea name="text" cols="30" rows="10"></textarea>
        <input type="text" name="name">
        <input type="submit" value="ok">
    </form>

</body>

</html>