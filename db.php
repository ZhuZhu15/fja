<?php
$connection = mysqli_connect ("localhost"); //подключение к серверу
$db = mysqli_select_db($connection, "fjall"); //выбор бд
if (!$connection) //проверка соединения с сервером
{
	echo "Net soedineniya" . "<br>";
}
if (!$db) //проверка существования бд
{
	echo "Net bazi dannih";
}
?>
