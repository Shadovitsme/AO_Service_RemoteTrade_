<?php

declare(strict_types=1);

require_once('/home/ukki/Documents/TestTask_AO_Servise_RemoteTrade_/dataClass.php');

use data\dataClass;

function getDataFromFile() // получает данные из файла и записывает их в массив массивов
{
    //todo вынести в отделюную функцию в отдельном файле
    $arRow = (str_getcsv(file_get_contents('/home/ukki/Documents/TestTask_AO_Servise_RemoteTrade_/somethingTest/doc_for_test.csv'), ';'));

    for ($i = 0; $i < count($arRow) - 1; $i += 3) {
        $arRes[] = [$arRow[$i], $arRow[$i + 1], $arRow[$i + 2]];
    }
    unset($arRes[0]); //удаление первой строки в которой просто описание столбцов
    return $arRes;
}

$dataObject = new dataClass;
$dataObject->setOrdersData(getDataFromFile());

$connection = mysqli_connect("localhost:3307", "root", "123456", "try");
$query = "SELECT * FROM orders";
$result = mysqli_query($connection, $query);
foreach ($result as $re) {
    echo $re['id'] . ' ' . $re['customerId'] . ' ' . $re['goods_id'] . ' ' . $re['comment'] . '<br />';
}
mysqli_close($connection); // Закрываем соединение с базой данных