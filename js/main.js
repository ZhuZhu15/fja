var cart = {};



function init() {
  //читаем данные из файла
  $.getJSON("goods.json", showColor);
}

function showColor(data) {
  var out="";
  var color="";
  for (var key in data)
  { 
    out += "<button type='button' class='btn-color' onclick='chooseColor(\""+data[key].img+"\","+[key]+", \""+data[key].name+"\")' style='background:"+data[key].color+";color: #FFF;'>"+data[key].name+"</button>";
 }
 $('.colors').html(out);
}


function chooseColor (img, id, name) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     // document.getElementById("demo").src = img;
     $('#kanken-pic').attr('src', img);
     $('.but').attr('data-id', id);
     $('.name').text(name);
     $('.chosed-color').text(name);
   }
 };
 xhttp.open("GET","",true);
 xhttp.send();
}




/*
function goodsOut(data) {

  console.log(data);
  var out="";
/*  for (var key in data)
  { 
    out += '<div class="col-sm-6 text-center"> <div class="card" style="text-align:center; display:inline-block">';
    out += '<img src="'+data[key].img+'" alt="" class="pic card-img-top" style="max-width:450px;">  <div class="card-body">';
    out += '<h4 class="name card-title">'+data[key].name+'</h4>';
    out += '<p class="card-text cost">'+data[key].cost+'</p>';
    out += '<button class="btn btn-dark but" data-id="'+[key]+'">Добавить в корзину</button> </div> </div> </div>';
    
  }
 // $('.goods-out').html(out);
 $('.but').on('click', addToCart);
}
*/


$(document).ready(function() {
 init();
 loadCart();
 $('.but').on('click', addToCart);
})

function addToCart() {
  var id = $(this).attr('data-id');
//console.log(id);
if (cart[id] == undefined){
  cart[id] = 1;
}
else {
  cart[id]++;
}
//console.log(cart);
showMiniCart();
saveCart();
showMiniCartDiv();
}

function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
}
function loadCart() {
  if (localStorage.getItem('cart')){
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


function sendContact() {

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
}


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