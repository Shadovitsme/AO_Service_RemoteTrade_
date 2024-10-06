<?php

declare(strict_types=1);

namespace data;

require_once('db.php');

use database\dbFunctions;


class dataClass
{
    function checkValidData($arFromDocument): void
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

    function setData($arValid, $table): void
    {
        foreach ($arValid as $validItem) {
            $id_good = (int)trim($validItem[0]);
            $idCustomer = (int)trim($validItem[1]);
            $comment = trim($validItem[2]);
            $stat = $validItem[3];
            $query = "INSERT INTO $table (goods_id, customerId, stat, comment) VALUES ($id_good, $idCustomer, $stat,'$comment')";
            dbFunctions::db($query);
        }
    }
    function getClientsData(): array
    {
        $query = 'SELECT id FROM clients';
        $result = dbFunctions::db($query);
        foreach ($result as $re) {
            $arRes[] = (int)trim($re['id']);
        }
        return $arRes;
    }

    function getMerchendise(): array
    {
        $query = 'SELECT id FROM merchendise';
        $result = dbFunctions::db($query);
        foreach ($result as $re) {
            $arRes[] = (int)trim($re['id']);
        }
        return $arRes;
    }
}
