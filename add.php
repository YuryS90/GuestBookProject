<?php
session_start();

include('funb.php');
include('config.php');
include('connect.php');

if (!(isset($_SESSION['bantime']) && ($_SESSION['bantime'] > time()))) {
    if (censor($_POST['text'])) {
        $mysqli->query(
            "INSERT INTO `fk5` VALUE (NULL,'$_POST[text]', '$_POST[name]')"
        );
    } else {
        $_SESSION['bantime'] = time() + 15;
    }
}
$mysqli->close();

header('location: index.php');