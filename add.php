<?php

include('connect.php');

if (!empty($_POST['text'] && !empty($_POST['name']))) {
    mysqli_query(
        $mysqli,
        "INSERT INTO `table` VALUES(NULL, '$_POST[text]', '$_POST[name]')"
    );
};

$mysqli->close();

header('Location: index.php');