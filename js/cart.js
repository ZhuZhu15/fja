var cart = {};

function loadCart() {
	if (localStorage.getItem('cart')){
		
		cart = JSON.parse(localStorage.getItem('cart'));
		showCart(); 
		showMiniCart();
	}
	else {
		$('.cart').html("Корзина пуста");
	}
	console.log(cart);
}


function showCart() {
	if(!isEmpty(cart)) {
		$('.cart').html("Корзина пуста");
	}
	else {
		$.getJSON('goods.json', function(data) {
			var goods = data;
			var out = '<table border="1" class="table-hover table-condensed table-striped" style="width:96%; max-width: 600px; text-align: center;">'+ 
			'<thead class="thead-inverse"><tr><th></th><th>Товар</th><th>Кол-во</th><th>Цена</th><th></th><th></th></tr></thead>'+
			'<tbody>';
			var sum = 0;
			for (var key in cart) {
				out += '<tr><th><button data-id="'+[key]+'" class="del-goods btn-dark">X</button></th>';
				out += '<th><img src="'+goods[key].img+'" class="pic" style="width: 70px;"><p class="name">'+goods[key].name+'</p></th>';
				out += '<th><p class="name">'+cart[key]+'</p></th>';
				out += '<th><p class="cost">'+cart[key]*parseInt(goods[key].cost)+' &#8381;</p></th>';
				out += '<th><button data-id="'+[key]+'" class="plus-goods btn-dark">+</button></th>';
				out += '<th><button data-id="'+[key]+'" class="minus-goods btn-dark">-</button></th>';
				sum +=  cart[key]*parseInt(goods[key].cost);
			}
			console.log(sum);
			out += '</tbody></table>'
			out += '<h4>Итого: '+sum+'&#8381;</h4>'
			$('.cart').html(out);
			$('.del-goods').on('click', delGoods);
			$('.plus-goods').on('click', plusGoods);
			$('.minus-goods').on('click', minusGoods);
		})
	}
}


function delGoods () {
//удаление товара из корзины
var id = $(this).attr('data-id');
delete cart[id];
saveCart();
showCart();
}

function plusGoods () {
//добавление товара в корзину
var id = $(this).attr('data-id');
cart[id]++;
saveCart();
showCart();
}

function minusGoods () {
//уменьшение товара в корзине
var id = $(this).attr('data-id');
if (cart[id] == 1)
{
	delete cart[id];
}
else {
	cart[id]--;
}	
saveCart();
showCart();
}



function saveCart() {
	localStorage.setItem('cart', JSON.stringify(cart));
}

function isEmpty(object) {

	for (var key in object)
		if (object.hasOwnProperty(key)) return true;
	return false;

}
function sendEmail() {

	var ename = $('#ename').val();
	var ephone = $('#ephone').val();
	var email = $('#email').val();
	if (ename!='' && ephone!='' && email!='') {
		if (email.indexOf('@') > -1 && email.indexOf('.') > -1){
			if (isEmpty(cart)) {
				$.post(
					"controllers/cartcontroller",
					{
						"ename" : ename,
						"ephone" : ephone,
						"email" : email,
						"cart" : cart
					},
					function(data) {
						console.log('yspeh');
					}
					);
				alert('zakaz sdelan');
				cart = {};
				saveCart();
				showCart();	
			}
			else {
				alert('Корзина пуста');
			}
		}
		else {
			alert('email не правильный');
		}
		
	}
	else {
		alert('Заполните все поля');
	}

}


$(document).ready(function(){
	loadCart();
	$('.send-email').on('click', sendEmail)
})

function showMiniCart() {

	var out = 0;
	for (var key in cart) {
		out = parseInt(out) + parseInt(cart[key]);
	}
	$('#cart').html(out);
}

$(function(){
	$("#ephone").mask("8(999) 999-99-99", {
		completed: function(){}
	});
});