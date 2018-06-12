var cart = {};

function init() {
  //читаем данные из файла
  $.getJSON("goods.json", goodsOut);
}

function goodsOut(data) {

  console.log(data);
  var out="";
  for (var key in data)
  { 
    out += '<div class="col" style="display:inline-block; margin-right: 50px">';
    out += '<img src="'+data[key].img+'" alt="" class="pic" style="width:200px;">';
    out += '<h4 class="name">'+data[key].name+'</h4>';
    out += '<p class="cost">'+data[key].cost+'</p>';
    out += '<button class="btn btn-dark but" data-id="'+[key]+'">Добавить в корзину</button> </div>';
  }
  $('.goods-out').html(out);
  $('.but').on('click', addToCart);
}

$(document).ready(function() {
 init();
 loadCart();
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
}

function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
}
function loadCart() {
  if (localStorage.getItem('cart')){

    cart = JSON.parse(localStorage.getItem('cart'));
    showMiniCart();
  }
}

function showMiniCart() {
    /*//показываю мини корзину
    var card = document.getElementById("cart").innerHTML;
    card = card.replace(/<\/?[^>]+>/g,'');
if (card == "Корзина")
     {
    var out = 0;
     }
else 
    { 
    var out = parseInt(card.replace(/\D+/g,""));
    }
    out += 1;
    alert("Товар добавлен в корзину");
    document.getElementById("cart").innerHTML = "<a href='cart.php'>Корзина("+out+")</a>";
    //addToCart();
    //saveCart();
    */
    var out = 0;
    for (var key in cart) {
     out = parseInt(out) + parseInt(cart[key]);
    }
    $('#cart').html(out);
    
  }

/*
function addToCart() {
var D = document; // shortcut
var cart = D.getElementById("result");

var pic = D.createElement('img');
var onclick_pic = D.getElementById("pic-green");
pic.src = onclick_pic.src;
pic.style.width = "200px";
cart.appendChild(pic);


var name  = D.createElement('h4');
var onclick_name = D.getElementById("name-green");
name.innerHTML += onclick_name.innerHTML;
cart.appendChild(name);


var cost  = D.createElement('p');
var onclick_cost = D.getElementById("cost-green");
cost.innerHTML += onclick_cost.innerHTML;
cart.appendChild(cost);



}

function saveCart() {
    //сохраняем корзину
   // var data = "privet";
  //  localStorage.setItem('cart', data);
  //  alert(localStorage.getItem('cart'));
}

function gotoCart() {


document.location="cart.php?id="+cart.innerHTML;
}
*/
