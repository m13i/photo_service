<!doctype html>
<html>
<head>
	<title>Магазин сувенирной продукции - Photo Service</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="cart_style.css">
	<link rel="stylesheet" href="main.css"> 
</head>
<body>

	<div id="top"></div>
    <nav class="navbar navbar-default navbar-fixed-top" id="nav">
			
        <div class="container-fluid">
            <div class="navbar-header">

                <!--Logo Button-->
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
							<li class="active"><a onclick=window.open('index.html','_blank') title="Печать фотографий">На главную</a></li>
							<li class="active"><a onclick=window.open('upload.php','_blank') title="Заказать фотопечать">Заказать печать</a></li>
							<li class="active"><a onclick=window.open('shop_manual.html','_blank') title="Изготовление сувенирной продукции">Инструкция</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#top">Наверх</a></li>
						</ul>
					</div>
				</div>
			</div>
        </div>
    </nav>
	
	<!--BEGIN OF CART!-->
	<div class="cart-view-table-front">
		<h3>Корзина</h3>
		<form action="" method="post">
			<table width="100%" cellpadding="6" cellspacing="0">
				<tbody>
					<tr class="odd">
						<td>Кол-во: <input type="number" size="2" step="1" value="1" name="product_qty[]"></td>
						<td>Чашка белая</td>
						<td><input type="checkbox" name="remove_code[]" value="">Удалить</td>
					</tr>
					<td colspan="4">
						<button type="submit">Обновить</button>
						<a href="view.php" class="button">Оформить</a>
					</td>
				</tbody>
			</table>
		</form>
	</div>
	<!--END OF CART!-->
	
	<ul class="products">
		<h1>Каталог сувенирной продукции</h1>
		<!-- White cup !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Чашка белая</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/cup.jpg">
				</div>
				<div class="product-desc">
					Чашка белая для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>50 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="cup_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Colored cup !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Чашка цветная</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/color_mug.jpg">
				</div>
				<div class="product-desc">
					Чашка цветная для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>70 грн.</strong>
					
					<fieldset>
						<label>
							<span>Цвет:</span>
							<select name="product_color">
								<option value="red">Красный</option>
								<option value="brown">Коричневый</option>
								<option value="black">Черный</option>
								<option value="green">Зеленый</option>
								<option value="yellow">Желтый</option>
								<option value="blue">Голубой</option>
								<option value="pink">Розовый</option>
								<option value="grey">Серый</option>
								<option value="maroon">Бордовый</option>
							</select>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="cup_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!--Magin cup!-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Чашка магическая</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/magic_mug.jpg">
				</div>
				<div class="product-desc">
					Чашка на которая меняеться при изменении температуры.
				</div>
				<div class="product-info">
					Цена: <strong>100 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="cup_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		
		<!-- Latte cup !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Чашка Латте</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/latte.jpg">
				</div>
				<div class="product-desc">
					Чашка для латте для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>90 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="cup_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Big Cup !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Чашка большая</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/big_mug.jpg">
				</div>
				<div class="product-desc">
					Чашка белая большая для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>110 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="cup_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Goblet !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Бокал</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/goblet.png">
				</div>
				<div class="product-desc">
					Бокал для пива для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>150 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="cup_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- T-Shirt !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Футболка</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/shirt.jpg">
				</div>
				<div class="product-desc">
					Футболка для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>120 грн.</strong>
					
					<fieldset>
						<label>
							<span>Размер:</span>
							<select name="product_size">
								<option value="s">S</option>
								<option value="m">M</option>
								<option value="l">L</option>
								<option value="xl">XL</option>
								<option value="xxl">XXL</option>
								<option value="xxxxl">XXXL</option>
							</select>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="shirt_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Pillow !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Подушка</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/pillow.jpeg">
				</div>
				<div class="product-desc">
					Подушка с цветным ободом для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>170 грн.</strong>
					
					<fieldset>
						<label>
							<span>Цвет:</span>
							<select name="product_color">
								<option value="red">Красный</option>
								<option value="brown">Коричневый</option>
								<option value="black">Черный</option>
								<option value="green">Зеленый</option>
								<option value="yellow">Желтый</option>
								<option value="blue">Голубой</option>
								<option value="pink">Розовый</option>
								<option value="grey">Серый</option>
								<option value="maroon">Бордовый</option>
							</select>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="pillow_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Plate !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Тарелка</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/plate.jpg">
				</div>
				<div class="product-desc">
					Тарелка большая и маленькая для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>180 грн.</strong>
					
					<fieldset>
						<label>
							<span>Размер:</span>
							<select name="product_size">
								<option value="big">Большая</option>
								<option value="little">Маленькая</option>
							</select>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="plate_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Carpet !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Коврик для мышки</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/carpet.jpg">
				</div>
				<div class="product-desc">
					Коврик для компьютерной мыши для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>90 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="carpet_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Money box !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Копилка</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/moneybox.jpg">
				</div>
				<div class="product-desc">
					Копилка для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>130 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="moneybox_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!-- Stone circled !-->
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Камень закругленый</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/stone.jpg">
				</div>
				<div class="product-desc">
					Камень закругленый для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>190 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="stone_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<li class="product">
			<form action="" method="post">
				<div class="product-content">
					<h3>Камень квадратный</h3>
				</div>
				<div class="product-thumb">
					<img src="cart_img/stone2.jpg">
				</div>
				<div class="product-desc">
					Камень квадратный для нанесения изображения.
				</div>
				<div class="product-info">
					Цена: <strong>190 грн.</strong>
					
					<fieldset>
						<label>
							<div class="spacer"></div>
							<span>Шаблон:</span>
							<input type="number" name="cup_template" step="1" value="0" >
							<br>
							<span>Кол-во:</span>
							<input type="number" name="stone2_qty" step="1" value="1">
						</label>
					</fieldset>
					
					<input type="hidden" name="product_code" value="">
					<input type="hidden" name="type" value="add">
					<div align="center">
						<button type="submit" class="add_to_cart">В корзину</button>
					</div>
				</div>
			</form>
		</li>
		
		<!--END OF UL!-->
	</ul>
</body>
</html>