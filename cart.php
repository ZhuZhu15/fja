<?php
define('ACCESS', true);
include 'header.php'; ?>
   
   <h3 style="margin-left: 15px;"> Товары в корзине </h3>
   <div class="cart" style="width: 100%; margin-left: 5px;"></div>

   <br>

  <div class="email-field">
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label for="ename">Ваше имя:</label>
          <input type="text" name="ename" class="form-control" id="ename" required>
        </div>
        <div class="form-group">
          <label for="ephone">Телефон:</label>
          <input type="text" name="ephone" class="form-control" id="ephone">
        </div>
        <div class="form-group">
          <label for="email">Mail:</label>
          <input class="form-control" name="email" id="email">
        </div>
        <button class="btn btn-dark send-email">Заказать</button>
      </div>
    </div>
  </div>

   <?php include 'footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/cart.js"></script>

