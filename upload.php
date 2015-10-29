<?php session_start(); ?>

<!DOCTYPE html>
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
	<form method="post" action="upload_image.php" enctype="multipart/form-data">
	    <h1>Загрузка фотографий:</h1>
	    <input class="submit"type="file" name="fileToUpload[]" id="fileToUpload" multiple>
		<center><input class="submit" name="submit" type="submit" value="Загрузить фото" id="upload" ></center>
	</form>
</div>

</body>
</html>
