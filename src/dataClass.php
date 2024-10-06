<?php

namespace data;

class dataClass
{
    function checkValidData($arFromDocument)
    {
        //проверка на валидность и заполнение валидного и не валидного массива
        $arCustomerId = $this->getClientsData();
        $arGoodsId = $this->getMerchendise();
        foreach ($arFromDocument as $arElem) {
            if ($arElem[3] === 'new') {
                $arElem[3] = 'true';
            } elseif (!empty($arElem[3])) {
                $arElem[3] = 'false';
            } else {
                $arElem[3] = 'NULL';
            }

            if (in_array((int)trim($arElem[0]), $arCustomerId) && in_array((int)trim($arElem[1]), $arGoodsId)) {
                $arValidCustomers[] = $arElem;
            } else {
                $arNotValid[] = $arElem;
            }

            //заполнение заказов
            $this->setData($arValidCustomers, 'orders');

            //заполнение неверных массивов
            $this->setData($arNotValid, 'nonValidOrdersData');
        }
    }

    function setData($arValid, $table)
    {
        // Подключение к базе данных
        $connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");
        foreach ($arValid as $Res) {
            $id_good = (int)trim($Res[0]);
            $idCustomer = (int)trim($Res[1]);
            $comment = trim($Res[2]);
            $stat = $Res[3];
            $query = "INSERT INTO $table (goods_id, customerId, stat, comment) VALUES ($id_good, $idCustomer, $stat,'$comment')";
            $result = mysqli_query($connection, $query);
        }
        mysqli_close($connection); // Закрываем соединение с базой данных
    }


    function getClientsData(): array
    {
        // Подключение к базе данных
        $connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");
        $query = 'SELECT id FROM clients';
        $result = mysqli_query($connection, $query);
        foreach ($result as $re) {
            $arRes[] = (int)trim($re['id']);
        }
        mysqli_close($connection); // Закрываем соединение с базой данных
        return $arRes;
    }

    function getMerchendise(): array
    {

        $connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");

        $query = 'SELECT id FROM merchendise';
        $result = mysqli_query($connection, $query);
        foreach ($result as $re) {
            $arRes[] = (int)trim($re['id']);
        }
        mysqli_close($connection); // Закрываем соединение с базой данных

        return $arRes;
    }
}
