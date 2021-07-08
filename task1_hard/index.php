<?php

require_once(__DIR__ . '/header.php');

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задача 1</title>
</head>
<body>
<?php
if (empty($_SESSION['user_id'])) { ?>
    <form action="/task1_hard/" method="post">
    <label>Логин</label>
    <input type="text" required name="login" value="">
    <label>Пароль</label>
    <input type="password" required name="password" value="">
    <input type="submit" value="Войти">
</form>
<?php
}
else {
    require(__DIR__ . '/include/success.php');
}
if ($isNotAuth) {
    require (__DIR__ . '/include/error.php');
}
?>
<a href="page1.php">Страница 1</a>
<a href="page2.php">Страница 2</a>

<?php

require_once(__DIR__ . '/footer.php');

?>