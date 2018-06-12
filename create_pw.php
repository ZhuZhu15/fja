<?php
session_start();
include_once("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<title> Создание логина и пароля </title>
</head>
<body style="margin-left:10px;">
<h2> Создайте свой логин и пароль </h2>

<form action="create_pw.php" method="POST">
 <div class="form-group">
 <label for="login">Логин:</label>
 <br>
<input type="text" name="login">
</div>

<div class="form-group">
<label for="pas">Пароль:</label>
<br>
<input type="password" name="pas">
</div>

<div class="form-group">
<label for="pas">Повторите пароль:</label>
<br>
<input type="password" name="pas1">
</div>

<input type="submit" value="Создать"  class="btn btn-primary">
</form>
</body>
<?php 
if(!empty($_POST['pas']) && !empty($_POST['login'])) {
$login = $_POST['login'];
$password = $_POST['pas'];
$password1 = $_POST['pas1'];
if ($password == $password1) {
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$r = mysqli_query($connection, "INSERT INTO personal (login, password) VALUES ('$login', '$hashed_password')");
echo "<br>" . "<h3 style='color:green'> Пользователь успешно создан </h3>";
}
else {
echo "<h3 style='color:red'> Пароли не совпадают, повторите ввод </h3>";
	}

}
else {}
?>

