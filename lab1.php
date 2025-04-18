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

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

// Создание обычных пользователей
$user1 = new User('Иван', 'ivan123', 'password1');
$user2 = new User('Мария', 'maria456', 'password2');
$user3 = new User('Петр', 'petr789', 'password3');

// Создание привилегированного пользователя
$superUser = new SuperUser("Admin User", "admin", "adminpass", "Administrator");

?>
<!DOCTYPE html>
<html lang="ru">

<body>
    <div class="container">
        <h1>Система управления пользователями</h1>
        <h2>Обычные пользователи</h2>
        <?php
        $regularUsers = [$user1, $user2, $user3];
        foreach ($regularUsers as $user) {
            echo '<div class="user-card">';
            echo '<div class="user-info"><strong>Имя:</strong> ' . htmlspecialchars($user->name) . '</div>';
            echo '<div class="user-info"><strong>Логин:</strong> ' . htmlspecialchars($user->login) . '</div>';
            echo '</div>';
        }
        ?>

        <h2>Привилегированный пользователь</h2>
        <div class="user-card super-user-card">
            <?php
            $superUserInfo = $superUser->getInfo();
            foreach ($superUserInfo as $key => $value) {
                $labels = [
                    'name' => 'Имя',
                    'login' => 'Логин',
                    'role' => 'Роль'
                ];
                $label = $labels[$key] ?? ucfirst($key);
                echo '<div class="user-info"><strong>' . $label . ':</strong> ' . htmlspecialchars($value) . '</div>';
            }
            ?>
        </div>

        <div class="stats">
            <h2>Статистика</h2>
            <p>Всего обычных пользователей: <?php echo User::getUserCount(); ?></p>
            <p>Всего привилегированных пользователей: <?php echo SuperUser::getSuperUserCount(); ?></p>
        </div>
    </div>

    <?php
    // Удаление пользователей
    echo '<div class="container" style="margin-top: 20px;">';
    echo '<h2>Удаление пользователей</h2>';
    echo '<div class="user-card">';
    
    // Начинаем буферизацию вывода
    
    
    // Сначала очищаем массив обычных пользователей
    unset($regularUsers);
    
    // Теперь удаляем отдельные переменные пользователей
    unset($user3);
    unset($user2);
    unset($user1);
    
    // В конце удаляем привилегированного пользователя
    unset($superUser);
    
    // Получаем содержимое буфера и очищаем его
    
    
    // Выводим все сообщения внутри блока
    
    echo '</div>';
    echo '</div>';
    ?>
</body>
</html> 