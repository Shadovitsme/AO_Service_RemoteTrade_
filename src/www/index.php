<html>
<form action="/classesAndMethods/dataAction.php" enctype="multipart/form-data" method="POST">
    <input type="file" id="data" name="data" accept=".csv" />
    <input name="myActionName" type="submit" value="Добавить заказы" />
</form>

<form action="/classesAndMethods/theMostActiveCustomers.php" method="POST">
    <input name="myActionName" type="submit" value="Наиболее активные клиенты" />
</form>

<form action="/classesAndMethods/notSoldGoods.php" method="POST">
    <input name="myActionName" type="submit" value="Ни разу не проданное" />
</form>

</html>