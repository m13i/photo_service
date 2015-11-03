<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=420", user-scalable=false">
	<title>Загрузка фотографий</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="main.css"> 
</head>
<body>

<div id="top"></div>
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
						<li><a id="manual" onclick=window.open('manual.html')>Инструкция</a></li>
						<li><a style="cursor:pointer" data-toggle="modal" data-target="#pupUpWindow">Перезвонить вам?</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#top">Наверх</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>

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
				<form role="form" method="post" action="home_consult.php" target="_blank">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Ваше имя">
					</div>
					
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Ваше email (Необязательное поле)">
					</div>
					
					<div class="form-group">
						<input pattern=".{10,10}" maxlength="10" required title="Слишком короткий номер телефона" name="phone" class="form-control" placeholder="Ваш номер телефона (без тире)">
					</div>
					
					<div class="modal-footer">
						<input type="submit" onclick=sent() class="btn btn-primary btn-success" value="Отправить">
					</div>
					
				</form>
				
				<div class="alert alert-info fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<p>Либо звоните по телефонам: 063-425-70-62 , 095-259-83-17</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="first_form">
	<form method="post" action="upload_image.php" enctype="multipart/form-data">
	    <h1>Загрузка фотографий:</h1>
	    <input class="submit"type="file" name="fileToUpload[]" id="fileToUpload" multiple>
		<center><input class="submit" name="submit" onclick=progressBar() type="submit" value="Загрузить фото" id="upload" ></center>
	</form>
</div>

<div id="progress" style="text-align: center; display:none">
	<p>Подождите пока не отобразятся ваши фото...</p>
	<progress value="90" max="100"></progress>
</div>

<div id="upload_info">
	<p>Уважаемый пользователь! Так как на дворе 21й век вы имеете возможность не отрываясь от дел заказать печать фотографий
		прямо с вашего компютера. Для этого вам возможно понадобиться ознакомиться с простой <a href="manual.html">инструкцией</a>
		в которой подробно описано как осуществить заказ на <strong>пачать фотографий онлайн</strong> - это проще чем вы думаете!
		Также наш сервис предоставляет различные <strong>фотоуслуги</strong>, например, <strong>печать на чашках</strong>, <strong>нанесение изображений на футболки</strong>,
		<strong>печать на бокалах</strong>,
		<strong>фотопечать</strong>, <strong>реставрация фотографий</strong>, <strong>печать на сувенирной продукции</strong>. 
		<br>
		Если у вас есть вопросы вы можете оставить
		<a style="cursor:pointer" data-toggle="modal" data-target="#pupUpWindow"> заявку на консультацию</a>
		<br>
		<center><strong>Мы ценим наших клиентов и нашу работу и поэтому отвечаем за качество!</strong></center>
	</p>
</div>

<script>
	function progressBar(){
		document.getElementById('progress').style.display = "block";
	}
	
	function sent(){
		if(document.getElementsByName('phone')[0].value != ''){
			window.alert("Спасибо! Ваша заявка была отправлена.");
			document.getElementsByClassName('close')[0].click();
		}
	}
</script>

<div style="margin-top: 30%"></div>

<footer>"Photo Service" Все права защищены &copy 2015.</footer>

</body>
</html>
