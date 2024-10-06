<html>
<form action="/classesAndMethods/dataAction.php" method="POST">
    <input name="myActionName" type="submit" value="Выполнить" />
</form>
<!-- сделать сюды запросы которые я пока не начала делать -->
<form action="/classesAndMethods/dataAction.php" method="POST">
    <input name="myActionName" type="submit" value="1" />
</form>
<form action="/classesAndMethods/dataAction.php" method="POST">
    <input name="myActionName" type="submit" value="2" />
</form>
<form action="/classesAndMethods/dataAction.php" method="POST">
    <input name="myActionName" type="submit" value="3" />
</form>

<?php
$connection = mysqli_connect("docker-mysql-1:3306", "root", "123456", "doczilla");
$query = "SELECT * FROM clients";
$result = mysqli_query($connection, $query);
foreach ($result as $re) {
    echo $re['name'] . '<br />';
}
mysqli_close($connection);

?>

</html>