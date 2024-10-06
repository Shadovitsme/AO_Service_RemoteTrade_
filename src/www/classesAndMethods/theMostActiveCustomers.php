<?php
require_once('backButton.php');


$connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");
$query = <<<SQL
SELECT clients.name, COUNT(orders.customerId) AS count, orders.customerId
FROM orders
JOIN clients 
ON orders.customerId = clients.id
GROUP BY orders.customerId
ORDER BY count DESC
LIMIT 5;
SQL;

$result = mysqli_query($connection, $query);

echo '<h3> Наиболее активные пользователи </h3>';
foreach ($result as $re) {
    echo $re['name'] . '<br />';
}
mysqli_close($connection); // Закрываем соединение с базой данных