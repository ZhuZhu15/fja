<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<title> Стартовая страница </title>
</head>
<body style="margin-left:10px;">
	<h2> Введите логин и пароль, чтобы получить доступ к данным </h2>

	<form action="controllers/admincontroller" method="POST">
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

		<input type="submit" value="Войти"  class="btn btn-primary">
	</form>
</body>
