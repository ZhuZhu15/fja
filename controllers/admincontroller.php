<?php
session_start();
include_once("../db.php");


Class LoginAdmin {
   
    public $login;
    public $pass;
    
    function __construct() {
        $this->login = $_POST['login'];
        $this->pass = $_POST['pas'];
            }
	
	function Check() {
    global $connection;
	$resul = mysqli_query($connection, "SELECT login, password FROM personal
		WHERE login = '$this->login'");
	$ar = mysqli_fetch_array($resul, MYSQLI_ASSOC);
	if ($ar['login'] == $this->login && password_verify($this->pass, $ar['password'])) {
		$_SESSION['access']= 1;
		header("Location: ../admin") ;
	}
	else {
		echo "<h3 style='color:red'> Данные не верны </h3>";
		echo "<h4> Если у вас нет логина и пароля, вы можете создать его <a href='create_pw.php'> здесь </a></h4>";
		$_SESSION['access']= 2;
    }
}
}

    if(!empty($_POST['pas']) && !empty($_POST['login'])){
        $model = new LoginAdmin();
        $model->Check();
    }
    mysqli_close($connection);
    ?>
     