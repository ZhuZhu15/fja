var cart = {};

function init() {
  //читаем данные из файла
  $.getJSON("goods.json", showColor);
}

function showColor(data) {
  var out="";
  for (var key in data)
  { 
     out += "<button type='button' onclick='chooseColor(\""+data[key].img+"\","+[key]+")' style='background:"
     +data[key].color+"; color: #FFF'>"+data[key].name+"</button>";
     
  }
  $('.goods').html(out)
}


function chooseColor (img, id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     // document.getElementById("demo").src = img;
     $('#demo').attr('src', img);
     $('#but').attr('data-id', id);
    }
  };
  xhttp.open("GET","",true);
  xhttp.send();
}


$(document).ready(function() {
 init();
 loadCart();
 $('#but').on('click', addToCart);
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
    var out = 0;
    for (var key in cart) {
     out = parseInt(out) + parseInt(cart[key]);
    }
    $('#cart').html(out);
    
  }
