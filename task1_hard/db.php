<?php

function get_pdo()
{
    $config = include 'config.php';
    $dsn = "mysql:host=$config[host];dbname=$config[db];charset=$config[charset]";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dsn, $config['user'], $config['pass'], $opt);
    return $pdo;
}

function get_user_by_login($login, $pdo) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login LIMIT 1');
    $stmt->execute(array('login' => $login));
    return $stmt->fetch();
}

function login($login, $pass, $pdo)
{
    $user = get_user_by_login($login, $pdo);
    if (!empty($user) && ($pass === $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        if (!isset($_COOKIE['login'])) {
            setcookie('login', $_POST['login'], time() + 60, '/task1_hard/');
        }
        return true;
    }
    return false;
}
