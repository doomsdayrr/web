<?php
declare(strict_types=1);

// Autoloader function - assuming index.php setup or similar
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

use MyProject\Classes\NumbersSquared;

// Task 1: Demonstrate NumbersSquared
$startNum = 3;
$endNum = 7;
$numbersSquared = new NumbersSquared($startNum, $endNum);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №5 - Итераторы</title>
</head>
<body>
   
    <div class="task-container">
        <h3>Результат итерации объекта с числами от <?= $startNum ?> до <?= $endNum ?>:</h3>
        <div class="output">
            <pre><?php
                foreach($numbersSquared as $num => $square){
                    echo "Квадрат числа $num = $square\n";
                }
            ?></pre>
        </div>

        <h3>Диаграмма классов для NumbersSquared</h3>
        <div class="plantuml-diagram">
            <p>Диаграмма классов, созданная с помощью PlantUML:</p>
            <img src="lab5/diagram.png" alt="Диаграмма классов NumbersSquared">
        </div>
    </div>

    <div class="task-container">
        <p>Проверить работу скрипта <code>news.php</code> можно по ссылке:</p>
        <a href="news/news.php" class="lab-link">Перейти к новостям (news.php)</a>
    </div>

</body>
</html> 