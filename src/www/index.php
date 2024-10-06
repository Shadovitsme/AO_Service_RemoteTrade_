<html>
<form action="/classesAndMethods/dataAction.php" enctype="multipart/form-data" method="POST">
    <input type="file" id="data" name="data" accept=".csv" />
    <input name="myActionName" type="submit" value="Добавить заказы" />
</form>

<!-- TODO b. Выбрать имена (name) 5 клиентов, которые сделали больше всего заказов в магазине.  -->
<form action="/classesAndMethods/theMostActiveCustomers.php" method="POST">
    <input name="myActionName" type="submit" value="Наиболее активные клиенты" />
</form>

<!-- TODO c. Выбрать имена (name) 10 клиентов, которые сделали заказы на наибольшую сумму. -->
<form action="/classesAndMethods/theMostGoodCustomers.php" method="POST">
    <input name="myActionName" type="submit" value="Наиболее выгодные клиенты" />
</form>

<!-- TODO  d. Выбрать имена (name) всех товаров, по которым не было доставленных заказов (со статусом “complete”)-->
<form action="/classesAndMethods/dataAction.php" method="POST">
    <input name="myActionName" type="submit" value="Ни разу не проданное" />
</form>

</html>