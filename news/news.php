<?php
// Подключаем класс для работы с новостями
require_once "NewsDB.class.php";

// Создаем объект для работы с новостями
$news = new NewsDB();

// Переменная для хранения сообщений об ошибках
$errMsg = "";

// Проверяем запрос на удаление новости
if (isset($_GET['del'])) {
    require "delete_news.inc.php";
}

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "save_news.inc.php";
}
?>
<!DOCTYPE html>
<html>

<body>
  <h1>Последние новости</h1>
  
  <?php
  // Выводим сообщение об ошибке, если оно есть
  if (!empty($errMsg)) {
      echo "<div class='error-message'>{$errMsg}</div>";
  }
  
  // Выводим новости
  require "get_news.inc.php";
  ?>
  
  <h2>Добавить новость</h2>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    Заголовок новости:<br>
    <input type="text" name="title"><br>
    Выберите категорию:<br>
    <select name="category">
      <option value="1">Политика</option>
      <option value="2">Культура</option>
      <option value="3">Спорт</option>
    </select>
    <br />
    Текст новости:<br>
    <textarea name="description" cols="50" rows="5"></textarea><br>
    Источник:<br>
    <input type="text" name="source"><br>
    <br>
    <input type="submit" value="Добавить!">
  </form>
</body>
</html>