<?php
//читать json

include_once('../db.php');
$json = file_get_contents('../goods.json');
$json = json_decode($json, true);
date_default_timezone_set('Europe/Moscow');

class dBase {
	
public $date;
public $time;

	function __construct() {
$this->date = date('Y-m-d');
$this->time = date('H:i:s');
	}
	
public function insertData() {
global $connection;
global $json;
$order_number = mysqli_query($connection, "SELECT order_number FROM orders WHERE date = (SELECT MAX(date) FROM orders) && time = (SELECT MAX(time) FROM orders WHERE date = (SELECT MAX(date) FROM orders))");
$ar_order = mysqli_fetch_array($order_number, MYSQLI_ASSOC);
$max_order_number = $ar_order['order_number']+1;

$ephone = $_POST['ephone'];
$ename = $_POST['ename'];
$email = $_POST['email'];
$cart = $_POST['cart'];


foreach ($cart as $id=>$count) {
	$goods_name = $json[$id]['name'];
	echo $max_order_number . "<br>" . $goods_name . "<br>" . $count . "<br>" . $ename ."<br>" . $email ."<br>" . $ephone ."<br>" . $this->date ."<br>" . $this->time;
	mysqli_query($connection, "INSERT INTO orders (order_number, Kanken_name, Kanken_count, Kanken_cost, Client_name, Client_mail, Client_phone, date, time)
		VALUES ('$max_order_number' ,'$goods_name', '$count', '$count'*2300, '$ename', '$email', '$ephone', '$this->date', '$this->time')");
}
}

public function updateColor() {
global $connection;
$update_order = $_POST['update_order'];
$new_color = $_POST['new_color'];
mysqli_query($connection, "UPDATE orders SET color = '$new_color' WHERE order_number = '$update_order'");
}

public function updatePerfomer() {
global $connection;
$perfomer = $_POST['perfomer'];
$update_order2 = $_POST['update_order2'];
mysqli_query($connection, "UPDATE orders SET perfomer = '$perfomer' WHERE order_number = '$update_order2'");
}
}

$model = new dBase();

if (isset($_POST['ephone'])){
	$model->insertData();
	echo "dannie priwli " . $_POST['ephone'];
}
if (isset($_POST['new_color'])){
	$model->updateColor();
}
if (isset($_POST['perfomer'])){
	$model->updatePerfomer();
}


mysqli_close($connection);


?>