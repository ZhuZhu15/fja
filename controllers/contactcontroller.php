<?php
//читать json

include_once('../db.php');
date_default_timezone_set('Europe/Moscow');


class Contact {

public $date;
public $time;

function __construct() {
$this->date = date('Y-m-d');
$this->time = date('H:i:s');
}

function insertContact() {
global $connection;
$phone = $_POST['phone'];
$name = $_POST['usr'];
$comment = $_POST['comment'];

mysqli_query($connection, "INSERT INTO contact (Name, Phone, Comment, Date, Time)
	VALUES ('$name', '$phone', '$comment', '$this->date', '$this->time')");
}
}


$model = new Contact();
if(isset($_POST['phone'])) 
{
$model->insertContact();
echo "dannie priwli";
}
mysqli_close($connection);

?>