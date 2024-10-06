<?php

declare(strict_types=1);
require_once('backButton.php');
require_once('db.php');

use database\dbFunctions;

$query = <<<SQL
SELECT clients.name, COUNT(orders.customerId) AS count, orders.customerId
FROM orders
JOIN clients 
ON orders.customerId = clients.id
GROUP BY orders.customerId
ORDER BY count DESC
LIMIT 5;
SQL;

$result = dbFunctions::db($query);

echo '<h3> Наиболее выгодные пользователи </h3>';
foreach ($result as $re) {
    echo $re['name'] . '<br />';
}
mysqli_close($connection); // Закрываем соединение с базой данных