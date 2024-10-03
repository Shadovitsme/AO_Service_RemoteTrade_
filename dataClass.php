<?php

namespace data;

class dataClass
{
    function setOrdersData($arFromDocument)
    {
        // Подключение к базе данных
        $connection = mysqli_connect("localhost:3307", "root", "123456", "try");
        foreach ($arFromDocument as $Res) {
            $id_good = (int)trim($Res[0]);
            $idCustomer = (int)trim($Res[1]);
            $comment = trim($Res[2]);
            $query = "INSERT INTO orders (customerId, goods_id, comment) VALUES ($id_good, $idCustomer, '$comment')";
            $result = mysqli_query($connection, $query);
        }
        mysqli_close($connection); // Закрываем соединение с базой данных
        return $result;
    }

    function getClientsData()
    {
        // Подключение к базе данных
        $connection = mysqli_connect("localhost:3307", "root", "123456", "try");
        //todo реализовать
        mysqli_close($connection); // Закрываем соединение с базой данных
    }

    function getMerchendise()
    {
        // Подключение к базе данных
        $connection = mysqli_connect("localhost:3307", "root", "123456", "try");
        //todo реализовать
        mysqli_close($connection); // Закрываем соединение с базой данных
    }
}
