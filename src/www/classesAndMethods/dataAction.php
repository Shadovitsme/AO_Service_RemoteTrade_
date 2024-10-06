<?php

declare(strict_types=1);

require_once('../../dataClass.php');

use data\dataClass;

require_once('backButton.php');

function getDataFromFile() // получает данные из файла и записывает их в массив массивов
{
    $arRow = (str_getcsv(file_get_contents($_FILES['data']['tmp_name']), ';'));
    for ($i = 0; $i < count($arRow) - 1; $i += 4) {
        $arRes[] = [$arRow[$i], $arRow[$i + 1], $arRow[$i + 2], $arRow[$i + 3]];
    }
    unset($arRes[0]); //удаление первой строки в которой просто описание столбцов
    return $arRes;
}

$dataObject = new dataClass;
$dataObject->checkValidData(getDataFromFile());

$connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");
$query = "SELECT * FROM orders";
$result = mysqli_query($connection, $query);
echo '<h3> валидные данные данные </h3>';
foreach ($result as $re) {
    echo $re['id'] . ' ' . $re['customerId'] . ' ' . $re['goods_id'] . ' ' . $re['comment'] . ' ' . $re['stat'] . '<br />';
}
echo '<hr>';
echo '<h3> невалидные данные </h3>';
$query = "SELECT * FROM nonValidOrdersData";
$result = mysqli_query($connection, $query);
foreach ($result as $re) {
    echo $re['id'] . ' ' . $re['customerId'] . ' ' . $re['goods_id'] . ' ' . $re['comment'] .  ' ' . $re['stat'] . '<br />';
}
mysqli_close($connection); // Закрываем соединение с базой данных