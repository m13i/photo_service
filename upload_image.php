<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=800", user-scalable=false">
	<title>Загрузка фотографий</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="main.css"> 
</head>
<body>

<div id="top"></div>

<?php
	session_start();
	
	//$format_qty = 0; //This variable will store quantity of precise format.
	//$all_qty = $_SESSION['amount']; //It'll store full amount of uploaded images including qty modification.
	
	include_once('fns.php');	
	//Setting up a connection
	$_SESSION['amount'] = 0; //quantity of uploaded images.
	$result = db_connection();
	$arr = $result->fetch_array();
	$_SESSION['user'] = $arr[0];

	if(isset($_POST['submit']) && empty($_POST['submit2'])){
	
		mkdir($_SERVER['DOCUMENT_ROOT']."/photo3/uploads/$_SESSION[user]");
		$uploads_dir = $_SERVER['DOCUMENT_ROOT']."/photo3/uploads/$_SESSION[user]";
		
		//This loop uploads images with incrementing values as their names and sets the proper extension (e.g. 'jpg').		
		foreach($_FILES['fileToUpload']['name'] as $index => $value){
			$tmp_name = $_FILES['fileToUpload']['tmp_name'][$index];
			$name = $_FILES['fileToUpload']['name'][$index];
			$path = pathinfo($name);
			if(getimagesize($tmp_name) !== false) //Checking if uploaded file as truly image
				move_uploaded_file($tmp_name, "$uploads_dir/$index.".$path['extension'] );
			else{ //if uploded file is not an image then throw notification and delete empty folder then exit from script.
				echo "<center><h3>Извините но загружать можно только изображения, возможно вы выбрали лишний файл не являющийся изображением. Повторите заново.</h3></center>";
				echo "<center><a href='upload.php'>Повторить заново</a></center>";
				rmdir($uploads_dir); //Delete empty folder
				exit;
			}
		}
	
	}
	
	//Deleting repeated folders
	//If folder is empty then delete it
	$repeat = (count(glob("$uploads_dir/*")) === 0);
	if($repeat)
		rmdir($uploads_dir);
?>	

<nav class="navbar navbar-default navbar-fixed-top" id="nav">	
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navitem" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
			<div>
				<a id="landing" class="navbar-brand" href="#top" title="Сувенирная продукция и печать фото"><p>Photo Service</p></a>
			</div>
        </div>
		<div>
			<div class="collapse navbar-collapse navbar-collapse-in" id="myNavbar">
				<div>
					<ul class="nav navbar-nav">
						<li class="active"><a onclick=window.open('index.html','_self')>На главную</a></li>
						<li class="active"><a href="#">Каталог товаров</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#top">Наверх</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>

<div class="first_form">
	<h1>Загрузка фотографий:</h1>
	<div>
		<strong>Формат фото:</strong>
		<select id="format" name="format">
			<option value="9x13">9x13</option>
			<option value="10x15">10x15</option>
			<option value="13x18">13x18</option>
			<option value="15x21">15x21</option>
			<option value="20x30">20x30</option>
		</select>
			
		<strong>Тип бумаги:</strong>
		<select id="type" name="type">
			<option value="Глянец">Глянец</option>
			<option value="Мат">Мат</option>
		</select>
			
		<strong>Количество:</strong>
		<input type="text" id="qty" value="1" name="qty" size="1">
		<button type="button" id="selectAll" onclick=select()>Выделить все</button>
		<button type="button" id="unselectAll" onclick=unselect()>Снять все</button>
		<button id="applyAll" onclick=applyToAll()>Применить ко всем выделеным</button>
		<a id="gotoCheckout" href="#checkout">Перейти к оформлению</a>
	</div>
</div>

<?php
	echo "<center>ваш ID " . $_SESSION['user'] . "</center><br>";

	$files = glob("uploads/$_SESSION[user]/*.{jpg,jpeg,png,gif,JPG}", GLOB_BRACE);
		
	foreach($files as $i => $file){
?>
		<div class="box">
			<img src="<?= $file ?>" >
			<div>
				<div>
					<input type="checkbox" name="check" value="check">
					<p>Выделить</p>
				</div>
				<ul>
					<li class="format">Формат: <strong></strong></li>
					<li class="type">Тип бумаги: <strong></strong></li>
					<li class="quantity">Кол-во: <strong></strong></li>
				</ul>
			</div>
		</div>
		
<?php 
	} 
?>	

<div id="checkout"></div>
<br><br><br>

<div><a id="gotoTop" href="#top">На верх</a></div>

<div class="order">
		<form method="post" action="order.php">
			<h4 id="total">Общее количество фотографий: <strong></strong></h4>
			<h4 id="totalPrice">Общая стоимость: <strong></strong></h4><br>
			<h4>Доставка: <strong>40 грн.</strong></h4>
			Ваше имя:<input type="text" pattern={0} required title="Вы ничего не ввели" name="username" placeholder="Имя" >
			Ваш email:<input type="text" pattern={0} required title="Вы ничего не ввели" name="email" placeholder="Email">
			Ваш телефон:<input type="text" pattern=".{10,10}" maxlength="10" 
				required title="Слишком короткий номер телефона" name="phone" placeholder="Телефон">
			<input type="submit" name="submit2" value="Отправить заказ">
		</form>
</div>

<div id="delivery">Внимание! Оплата производиться только при получении заказа.<br> 
					Стоимость доставки 40 грн.<br><br>
					<strong>При заказе на сумму више 300 грн. ДОСТАВКА БЕСПЛАТНО.</strong><br>
	<a href="#info">Узнать больше о доставке</a>
</div>

<div id="more">
	<table>
		<tbody>
			<tr>
				<td>Формат</td>
				<td>Кол-во</td>
			</tr>
			<tr>
				<td>9x13</td>
				<td class="moreTotal"></td>
			</tr>
			<tr>
				<td>10x15</td>
				<td class="moreTotal"></td>
			</tr>
			<tr>
				<td>13x18</td>
				<td class="moreTotal"></td>
			</tr>
			<tr>
				<td>15x21</td>
				<td class="moreTotal"></td>
			</tr>
			<tr>
				<td>20x13</td>
				<td class="moreTotal"></td>
			</tr>
		</tbody>
	</table>
</div>


<div id="info"></div>
<br>

<div id="deliveryInfo">
	При осуществлении заказа через наш интернет магазин оплата производиться только при получении вами вашего заказа.
	Наш курьер доставит заказ в любую точку киева. Если же ваш заказа привышает 300 грн <strong>доставка бесплатно.</strong> Также возможна <strong>отправка по почте</strong>.
	<br>
	Уважаемый клиент! Мы с радостью свяжемся с вами по любым вашим вопросам. Оставьте <a data-toggle="modal" data-target="#pupUpWindow">заявку на консультацию</a>

	<div class="modal fade" id="pupUpWindow">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-name" style="text-align:center;">
							<h3>Заявка на консультацию</h3>
						</div>
					</div>
					
					<div class="modal-body">
						<form role="form" method="post" action="consultation.php">
							<div class="form-group">
								<input type="text" name="cname" class="form-control" placeholder="Ваше имя">
							</div>
							<div class="form-group">
								<input pattern=".{10,10}" maxlength="10" required title="Слишком короткий номер телефона" name="cphone" class="form-control" placeholder="Ваш номер телефона (без тире)">
							</div>
							
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary btn-success" value="Отправить">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>

<script>

//For calculation formats that user chosen.
var formatQty = {
	'9x13'  : 0,
	'10x15' : 0,
	'13x18' : 0,
	'15x21' : 0,
	'20x30' : 0
};

//Saves prices for each photo format
var price = {
	'9x13'  : 1.8,
	'10x15' : 1.9,
	'13x18' : 3.7,
	'15x21' : 3.9,
	'20x30' : 9.0
};

function select() {
	var box = document.getElementsByName('check');
				
	for(i = 0; i < box.length; i++){
		if(!box[i].checked){
			box[i].checked = true;
		}
	}

}
	
function unselect() {
	var box = document.getElementsByName('check');
				
	for(i = 0; i < box.length; i++){
		if(box[i].checked){ 
			box[i].checked = false;
		}
	}

}
	
function applyToAll(){
	for(var i in formatQty){
		formatQty[i] = 0;
	}
	
	var check = document.getElementsByName('check');
	var len = check.length;
	var format = document.getElementById('format');
	var type = document.getElementById('type');
	var qty = document.getElementById('qty');
		
	for(var i = 0; i < len; i++){
		if(check[i].checked){
			document.getElementsByClassName('format')[i].getElementsByTagName('strong')[0].innerHTML = format.value;
			document.getElementsByClassName('type')[i].getElementsByTagName('strong')[0].innerHTML = type.value;
			document.getElementsByClassName('quantity')[i].getElementsByTagName('strong')[0].innerHTML = qty.value;
		}
	}
	outputObject();		
}

function getFullQty(a){

	var name = document.getElementsByClassName('format');
	var qty = document.getElementsByClassName('quantity');
	var count = name.length;
	
	for(var i = 0; i < count; i++){
		if(name[i].getElementsByTagName('strong')[0].innerHTML === a){
			formatQty[a] += parseInt(qty[i].getElementsByTagName('strong')[0].innerHTML);
		}
	}
}

//Checking if Object formatQty is corrent or not.
function outputObject(){
	var more = document.getElementsByClassName('moreTotal');
	var count = more.length;
	var temp = []; //Temp array to save object with numeric indexes
	
	fillObject();
	
	for(var i in formatQty){
		temp.push(formatQty[i]); //Pushing object values to numeric array 'temp'
	}
	
	for(var i = 0; i < count; i++){
		more[i].innerHTML = temp[i]; //Make table cells to be values of numeric array.
	}

	document.getElementById('total').getElementsByTagName('strong')[0].innerHTML = getTotalQty();
	document.getElementById('totalPrice').getElementsByTagName('strong')[0].innerHTML = 
	getPrice() + " грн.";
}

function outputTotal(){
	var a = getTotalQty();
	window.alert("Total: " + a);
}

//Change object values for each element
function fillObject(){
	for(var i in formatQty){
		getFullQty(i);
	}
}

//Calculate the total count of all uploaded photos and each its identical count.
function getTotalQty(){
	var total = 0;
	var qty = document.getElementsByClassName('quantity');
	var count = qty.length;
	
	for(var i = 0; i < count; i++){
		total += parseInt(qty[i].getElementsByTagName('strong')[0].innerHTML);
	}
	
	if(isNaN(total))
		return 0;
		
	return total;
}

//This function is needed to calculate the total price of all uploaded images...
function getPrice(){
	var totalPrice = 0;
	
	for(var i in formatQty){
		totalPrice += formatQty[i] * price[i];
	}
	
	return totalPrice.toFixed(2);
}

//BEGINNING OF DOING SOMETHING WIERD........................................

//How many different photos have got the same format.
function freq(){
	var format = document.getElementsByClassName('format');
	var len = format.length;
	var frequency = {
		'9x13'  : 0,
		'10x15' : 0,
		'13x18' : 0,
		'15x21' : 0,
		'20x30' : 0
	};

	for(var i = 0; i < len; i++){
		for(var key in formatQty){
			if(format[i].getElementsByTagName('strong')[0].innerHTML == key){
				frequency[key]++
			}
		}
	}
	
	for(var i in frequency){
		window.alert(i + " = " + frequency[i]);
	}
}

function howMany(){
	var res = getFreq('9x13');
	window.alert(res);
}

//Returns the frequency of only element
function getFreq(elem){
	var format = document.getElementsByClassName('format');
	var len = format.length;
	var frequency = 0;
	
	for(var i = 0; i < len; i++){
		if(format[i].getElementsByTagName('strong')[0].innerHTML == elem){
			frequency++;
		}
	}
	return frequency;
}
//ENDING OF DOING SOMETHING WIERD BUT THIS WAS VERY NECESSARY FOR COMPLETE THIS TASK.............

//these are jQuery functions to make scrolling to top and checkout smoothly.
//Make navbar buttons which are anchors to scroll smoothly
$(document).ready(function(){
		$("#nav").on("click","a", function (event) {
			event.preventDefault();
			var id  = $(this).attr('href'),
			top = $(id).offset().top;
			$('body,html').animate({scrollTop: top}, 500);
		});
});
//Make go to top href smoothly
$(document).ready(function(){
	$('#gotoTop').click(function(e){
		e.preventDefault();
		var id = $(this).attr('href'),
		top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 500);
	});
});

//Make go to checkout href smoothly
$(document).ready(function(){
	$('#gotoCheckout').click(function(e){
		e.preventDefault();
		var id = $(this).attr('href'),
		top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 500);
	});
});

</script>

</body>
</html>	 
