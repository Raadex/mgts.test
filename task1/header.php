<?php

session_start();

if (($_SERVER['REQUEST_URI'] !== '/task1/') && (empty($_GET['login'])) && (empty($_SESSION['user']))) {
    header("Location: /task1/");
}

if (isset($_SESSION['user']) && isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time() + 60, '/task1/');
}

if (((isset($_GET['logout'])) && ($_GET['logout'] === 'yes')) || (!isset($_COOKIE['login']) && isset($_SESSION['user']))) {
    unset($_COOKIE['login']);
    setcookie('login', null, 1, '/task1/');
    $_SESSION = [];
    session_destroy();
    header("Location: /task1/");
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $logins = require(__DIR__ . '/include/login.php');
    $passwords = require(__DIR__ . '/include/password.php');
    $userIndex = array_search($_POST['login'], $logins);
    if (($userIndex !== false) && ($_POST['password'] === $passwords[$userIndex])) {
        $_SESSION['user'] = $logins[$userIndex];
        if (!isset($_COOKIE['login'])) {
            setcookie('login', $_POST['login'], time() + 60, '/task1/');
        }
    } else {
        $isNotAuth = true;
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


<?php if (isset($_SESSION['user'])): ?>

    <a href="/task1/?logout=yes">Выйти</a>

<?php endif;