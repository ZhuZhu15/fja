var cart = {};



function init() {
  //читаем данные из файла
  $.getJSON("goods.json", showColor); //достаем данные из jsona и отправляем в showColor
}

function showColor(data) {
  var out="";
  var color="";
  for (var key in data)
  { 
    //тут создаются кнопки с атрибутами, которые потом уходят в chooseColor
    out += "<button type='button' class='btn-color' onclick='chooseColor(\""+data[key].img+"\","+[key]+", \""+data[key].name+"\")' style='background:"+data[key].color+";color: #FFF;'>"+data[key].name+"</button>";
 }
 $('.colors').html(out);
}


function chooseColor (img, id, name) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     // здесь приходят данные с кнопок
     $('#kanken-pic').attr('src', img);
     $('.but').attr('data-id', id);
     $('.name').text(name);
     $('.chosed-color').text(name);
   }
 };
 xhttp.open("GET","",true);
 xhttp.send();
}



$(document).ready(function() {
 init(); //тут инитится джсон
 loadCart(); //загружается корзина
 $('.but').on('click', addToCart); //по клику на кнопку срабатываем addTocart
})

function addToCart() {
  var id = $(this).attr('data-id'); //забирает атрибут data-id у товара
//console.log(id);
if (cart[id] == undefined){
  cart[id] = 1; //если такого товара не было то присваивается единица
}
else {
  cart[id]++; //был то ++
}
//console.log(cart);
showMiniCart(); //показывается корзина в хидере
saveCart(); //сайвится массив 
showMiniCartDiv(); //показывается фикс. корзина
}

function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart)); //в локал стор загоняем массив 
}
function loadCart() {
  if (localStorage.getItem('cart')){ //получаем массив из локал стора, если он есть
    cart = JSON.parse(localStorage.getItem('cart'));
    showMiniCart();
    showMiniCartDiv();
  }
}

function showMiniCart() {

  var out = 0;
  for (var key in cart) {
   out = parseInt(out) + parseInt(cart[key]);
 }
 $('#cart').html(out);
 $('#cart2').html(out);
}

function showMiniCartDiv() {
 if(isEmpty(cart)){
  $('.fixed').show();
}
}

function isEmpty(object) {

  for (var key in object)
    if (object.hasOwnProperty(key)) return true;
  return false;

}


$(".knopka").on("click", function() {

  var name = $('#usr').val();
  var phone = $('#phone').val();
  var comment = $('#comment').val();
  if (name!='' && phone!='' && comment!='') {
    $.post(
      "controllers/contactcontroller.php",
      {
        "usr" : name,
        "phone" : phone,
        "comment" : comment  
      },
      function() {
        console.log('yspeh');
      }
      );
    alert('Мы обязательно свяжемся с вами');
  }
  location.reload();
});


function redirectToCart(){
 window.location = "cart";
}

function scrollToGoods() {
document.getElementById("goods").scrollIntoView({
  behavior: "smooth"
});
}

function scrollToContact() {
document.getElementById("contact").scrollIntoView({
  behavior: "smooth"
});
}

$(function(){
  $("#phone").mask("8(999) 999-99-99", {
    completed: function(){}
  });
});