<?php
//todo вынести в отделюную функцию в отдельном файле
$arRow = (str_getcsv(file_get_contents('doc_for_test.csv'), ';'));

for ($i = 0; $i < count($arRow) - 1; $i += 3) {
    $arRes[] = [$arRow[$i], $arRow[$i + 1], $arRow[$i + 2]];
}
unset($arRes[0]);

// Подключение к базе данных
$conn = mysqli_connect("localhost:3307", "root", "123456", "try");

// Запрос к таблице 'users' с условием 'id = 1'
foreach ($arRes as $Res) {
    $id_good = (int)trim($Res[0]);
    $idCustomer = (int)trim($Res[1]);
    $comment = trim($Res[2]);
    $query = "INSERT INTO orders (customerId, goods_id, comment) VALUES ($id_good, $idCustomer, '$comment')";
    $result = mysqli_query($conn, $query);
}


$re = mysqli_query($conn, "SELECT * FROM orders");
// echo $re;
if ($re) {
    // Обработка результата запроса
    while ($row = mysqli_fetch_assoc($re)) {
        echo $row['comment'] . ' ' . $row['customerId'] . ' ' . $row['goods_id'] . '<br />'; // Выводим значение поля 'name' из результата
    }
} else {
    echo "Ошибка запроса: " . mysqli_error($conn);
}

mysqli_close($conn); // Закрываем соединение с базой данных