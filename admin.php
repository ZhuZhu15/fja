
<?php
define('ACCESS', true);
session_start();
if(!isset($_SESSION['access']) || $_SESSION['access']!= 1 ){
  header("location: login_admin"); //проверка админа 
}
else {
  ?> 

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <title> Вывод сумм кликов и денег </title>
  </head>
  <body style="margin-left:10px;">


    <?php
    include_once('db.php');


if (isset($_GET['date']) && isset($_GET['date2'])) //проверка что даты пришли с формы
{
  $d1=strip_tags(trim($_GET['date']));
  $d2=strip_tags(trim($_GET['date2']));
} 
else 
{
  $d1 = new DateTime('-30 days'); //если не пришли то по стандарту последние 30 дней выводит
  $d1 = $d1->format('Y-m-d');
  $d2 = date("Y-m-d");
}

?>
<div class="navbar navbar-inverse" id="nam"> 
  <h4 class="zag">Укажите интересующие вас даты</h4>
</div>

<form method="get" action="admin.php" class="form-inline">
 с  <input type="date" name="date" value="<?php echo $d1;?>" class="form-control mr-sm-2" style="margin-left:10px;"></input>
 по <input type="date" name="date2" value="<?php echo $d2;?>" class="form-control mr-sm-2" style="margin-left:10px;"></input>
 <br>
 <br>
 <input type="submit" value="Отправить" class="btn btn-primary">
</form>
<br>

<?php

$d3 = "Данные с " . $d1 . " по ". $d2; //алерт чтобы точно знать с какими датами работаем
echo '<div class="row">
<div class="col-sm-4">
<div class="alert alert-success">
<strong>' .  $d3 . "</strong>
</div>
</div>
</div> ";
?>

<h3> Легенда </h3>
<div>
 <div style="width: 50px; height: 20px; background: Tomato; display:inline-block"></div>
 <div style="display: inline-block">- Этот заказ необработали ещё</div>
</div>
<div>
 <div style="width: 50px; height: 20px; background: orange; display:inline-block"></div>
 <div style="display: inline-block">- C этим связались но ещё не договорились о встрече</div>
</div>
<div>
 <div style="width: 50px; height: 20px; background: yellow; display:inline-block"></div>
 <div style="display: inline-block">- С этим договорились о встрече</div>
</div>
<div>
 <div style="width: 50px; height: 20px; background: MediumSeaGreen; display:inline-block"></div>
 <div style="display: inline-block">- Заказ исполнен</div>
</div>
<div>
 <div style="width: 50px; height: 20px; background: DodgerBlue; display:inline-block"></div>
 <div style="display: inline-block">- Клиент слился</div>
</div>
<p> Имя в колонке "статус" определяет исполнителя заказа</p>
<input id="myInput" type="text" placeholder="Поиск..."> 
<br>
<br>
<?php include 'order_table.php'; //вывод таблицы с заказами сделал в отдельный файл ?>

</body>
</html>
<?php 
} 
mysqli_close($connection);
?>


<script src="js/admin.js"></script>
