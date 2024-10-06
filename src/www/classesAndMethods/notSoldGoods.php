<?php
require_once('backButton.php');


$connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");
$query = <<<SQL
SELECT goods_name FROM merchendise
WHERE id in 
(SELECT goods_id FROM orders WHERE stat = 0)
SQL;

$result = mysqli_query($connection, $query);

echo '<h3> Товары, которые никогда не продавались </h3>';
foreach ($result as $re) {
    echo $re['goods_name'] . '<br />';
}
mysqli_close($connection); // Закрываем соединение с базой данных