<?php

declare(strict_types=1);

// Функция автозагрузки
spl_autoload_register(function ($class) {
    $prefix = 'MyProject\\';
    $base_dir = __DIR__ . '/MyProject/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});


?>
<!DOCTYPE html>
<html lang="ru">

<body>
    <header>
        <h1>Лабораторные работы по PHP</h1>
    </header>

    <div class="main-container">
        <h2>Лабораторная работа №1</h2>
        <a href="lab1.php" class="lab-link">Открыть работу</a>
        <h2>Лабораторная работа №2</h2>
        <a href="lab2.php" class="lab-link">Открыть работу</a>
        <h2>Лабораторная работа №3</h2>
        <a href="lab3.php" class="lab-link">Открыть работу</a>
        <h2>Лабораторная работа №4</h2>
        <a href="lab4.php" class="lab-link">Открыть работу</a>
        <h2>Лабораторная работа №5</h2>
        <a href="lab5.php" class="lab-link">Открыть работу</a>
        <h2>Лабораторная работа №6</h2>
        <a href="lab6.php" class="lab-link">Открыть работу</a>
       
</body>
</html>