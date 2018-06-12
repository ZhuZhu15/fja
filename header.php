<?php if (!defined('ACCESS')) {exit;} ?>


<!DOCTYPE html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <script src="js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>-->
 <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">-->
  <script src="js/jquery.maskedinput.min.js"></script>
  <link href="css/style.css" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" class="bg-light">
  <div class="main">

      <!-- панель навигации -->
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">		
      <a class="navbar-brand" href="../">
        <img id="logo" src="img/fjallraven-logo.png" alt="logo">
      </a>
      <a class="navbar-item mynumber" href="#" style="color: white">
        <i class="fa fa-phone" aria-hidden="true"></i> 8(000)8000000
      </a>	
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto item-width">
          <li class="nav-item">
            <a class="nav-link" href="../#">Информация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../#goods" onclick="scrollToGoods(); return false">Ассортимент</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../#contact" onclick="scrollToContact(); return false">Контакты</a>
          </li>
        </ul>
        <ul class="navbar-nav">
         <button class="btn knopka" onclick="redirectToCart()"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Корзина(<span id="cart"></span>)</button>
       </ul>
     </div>
   </nav>
   <!-- панель навигации -->