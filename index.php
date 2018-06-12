<?php 
define('ACCESS', true);
include 'header.php' ?>

   <!-- контент страницы -->
   <button class="fixed" onclick="redirectToCart()"><div class="cart-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i>(<span id="cart2"></span>)</div></button>

   <div class="container">
    <div align="center">
      <h2 style="color:red">Здесь инфа о товаре</h2>
      <p>Ещё инфа о товаре</p>
      <p>ещё больше инфы о товаре </p>
      <p>И ещё больше инфы о товаре <span class="badge badge-secondary">New</span></h1></p>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail">
            <img src="/img/card1.jpg" alt="Lights" style="width:100%">
            <div class="caption text-center">
              <p>Здесь характеристики товара</p>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail">
            <img src="/img/card2.jpg" alt="Nature" style="width:100%">
            <div class="caption text-center">
              <p>И здесь тоже характеристики</p>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail">
            <img src="/img/card3.jpg" alt="Fjords" style="width:100%">
            <div class="caption text-center">
              <p>И вот тут тоже характеристики</p>
            </div>
        </div>
      </div>
    </div>
  
  <!-- контент страницы -->

  <!-- слайдер -->
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/na.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          <h3>На учебу!</h3>
          <p>Еще текст</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="img/nc.jpg" alt="Chicago">
        <div class="carousel-caption">
          <h3>На улицу!</h3>
          <p>еще текст</p>
        </div>   
      </div>
      <div class="carousel-item">
        <img src="img/nb.jpg" alt="New York">
        <div class="carousel-caption">
          <h3>В поход!</h3>
          <p>еще текст</p>
        </div>   
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  <!-- слайдер -->
 
  <!-- контент страницы -->
  <div id="goods">
    <div class="jumbotron jumbotron-fluid text-center" id="jum">
      <h1>Наш ассортимент</h1> 
    </div>
  </div>
  <div class="container">
    <div class="row goods-out">
     <div class="col-sm-6 text-center"> 
       <div class="card" style="text-align:center; display:inline-block">
         <img id="kanken-pic" src="img/1.jpg" alt="" class="pic card-img-top" style="max-width:400px;">  
         <div class="card-body">
          <h4 class="name card-title">Gray</h4>
          <p class="card-text cost">2300 &#8381;</p>
          <button class="btn but" data-id="1">Добавить в корзину</button> </div> </div> </div>

          <div class="col-sm-6 text-center second-col"> 
           <div class="card card-background" style="text-align:center; display:inline-block">
            <h4> Выбери свой цвет: <br/><span class="chosed-color">Gray</span> </h4>
             <div class="card-body">
            <div class="colors">
            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- контакты -->
      <br>
      <div id="section3">
        <div class="container">
          <div class="row">
            <div class="col-sm-6"> <!-- описание контактов -->
              <div class="container"  id="contact">
                <h2 class="w3-wide w3-center">Контакты</h2>
                <p class="w3-opacity w3-center"><i>Остались вопросы? Свяжитесь с нами!</i></p>
                <div class="w3-row w3-padding-32">
                  <div class="w3-col m6 w3-large w3-margin-bottom contacts">
                    <i class="fa fa-map-marker"></i> Москва<br>
                    <i class="fa fa-phone"></i> 89999999<br>
                    <i class="fa fa-envelope"> </i> backpack.msk@ya.ru<br>
                    <i class="fa fa-instagram"></i><br>
                    <i class="fa fa-vk"></i><br>
                    <br>
                   
                  </div>
                </div> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="usr">Ваше имя:</label>
                <input type="text" name="usr" class="form-control" id="usr" required>
              </div>
              <div class="form-group">
                <label for="phone">Ваш номер телефона</label>
                <input type="text" name="phone" class="form-control" id="phone" required>
              </div>
              <div class="form-group">
                <label for="comment">Комментарии:</label>
                <textarea class="form-control" name="comment" rows="4" id="comment" maxlength="500"></textarea>
              </div>
              <button type="submit" class="btn knopka" onclick="sendContact()">Отправить</button>
            </div>

          </div>
        </div>
      </div> 

    </div>
    </div>

    <?php include 'footer.php' ?>

<script src="js/main.js"></script>

