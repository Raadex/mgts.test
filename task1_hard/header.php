<?php

session_start();

require_once 'db.php';

$pdo = get_pdo();

if (($_SERVER['REQUEST_URI'] !== '/task1_hard/') && (empty($_GET['login'])) && (empty($_SESSION['user_id']))) {
    header("Location: /task1_hard/");
}

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0 && isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time() + 60, '/task1_hard/');
}

if (((isset($_GET['logout'])) && ($_GET['logout'] === 'yes')) || (!isset($_COOKIE['login']) && isset($_SESSION['user_id']))) {
    unset($_COOKIE['login']);
    setcookie('login', null, 1, '/task1_hard/');
    $_SESSION = [];
    session_destroy();
    header("Location: /task1_hard/");
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    if (login($_POST['login'], $_POST['password'], $pdo)) {
        $idNotAuth = false;
    } else {
        $idNotAuth = true;
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задача 1</title>
</head>

<body>


<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0): ?>

    <a href="/task1/?logout=yes">Выйти</a>

<?php endif;