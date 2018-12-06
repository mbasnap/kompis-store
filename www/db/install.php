<meta charset="utf-8">
<?php 
//подключение к файлу базы данных
$db = new SQLite3('my.db');

//Саму базу данных уже создавать не нужно, так как my.db и есть база
//if ($db->exec("CREATE DATABASE myphp")) echo "База данных создана<br>";

//Создаем таблицу пользователей
if ($db->exec("CREATE TABLE IF NOT EXISTS 'user'
               ('id' INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL  UNIQUE , 
               'name' VARCHAR(20), 
               'age' INT(3), 
               'city' VARCHAR(50))"))
echo "Таблица пользователей создана<br>";

//вводим демо данные в таблицу
if($db->exec("INSERT INTO user VALUES (1,'Andrey',15,'Odessa')")) echo "Демо данные внесены<br>";
if($db->exec("INSERT INTO user VALUES (2,'Vitaliy',28,'Dnepr')")) echo "Демо данные внесены<br>";

echo "-------------------------------------------<br>";

//выводим демо данные
$results = $db->query('SELECT * FROM user');
while ($row = $results->fetchArray()) {
    echo "Результат<br>";
    echo "id:".$row['id']." Имя: ".$row['name']." Возраст: ".$row['age']." Город: ".$row['city'];
}

//Закрываем соединение с базой.
$db->close();

?>
<p><a href="/">На главную</a></p>