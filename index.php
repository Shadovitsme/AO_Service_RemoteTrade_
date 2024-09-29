<?php
//todo вынести в отделюную функцию в отдельном файле
$arRow = (str_getcsv(file_get_contents('doc_for_test.csv'), ';'));

for ($i = 0; $i < count($arRow) - 1; $i += 3) {
    $arRes[] = [$arRow[$i], $arRow[$i + 1], $arRow[$i + 2]];
}
unset($arRes[0]);