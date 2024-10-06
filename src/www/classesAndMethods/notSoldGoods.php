<?php
require_once('backButton.php');
require_once('../../db.php');

use database\dbFunctions;

$query = <<<SQL
SELECT goods_name FROM merchendise
WHERE id in 
(SELECT goods_id FROM orders WHERE stat = 0)
SQL;

$result = dbFunctions::db($query);

echo '<h3> Товары, которые никогда не продавались </h3>';
foreach ($result as $re) {
    echo $re['goods_name'] . '<br />';
}
