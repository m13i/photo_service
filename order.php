<?php
session_start();
date_default_timezone_set("Europe/Kiev");
?>

<!doctype html>
<html>
<head>
	<title>Отправлено - photo-service</title>
	<meta charset="utf-8" >
</head>
<body>

<?php

include_once('photo.php');

$tempGloss = array();
$tempGloss[0] = $_POST['gloss9x13'];
$tempGloss[1] = $_POST['gloss10x15'];
$tempGloss[2] = $_POST['gloss13x18'];
$tempGloss[3] = $_POST['gloss15x21'];
$tempGloss[4] = $_POST['gloss20x30'];

$tempMatt = array();
$tempMatt[0] = $_POST['matt9x13'];
$tempMatt[1] = $_POST['matt10x15'];
$tempMatt[2] = $_POST['matt13x18'];
$tempMatt[3] = $_POST['matt15x21'];
$tempMatt[4] = $_POST['matt20x30'];

//Explode gloss
$gPhoto = array(); //Array of exploded gloss photos
$mPhoto = array();

foreach($tempGloss as $key => $value){
	if($value){
		$gPhoto[$key] = explode('+', $value);
	}
	else{
		$gPhoto[$key] = explode('+', "0+0+0+0");
	}
}

foreach($tempMatt as $key => $value){
	if($value){
		$mPhoto[$key] = explode('+', $value);
	}
	else{
		$mPhoto[$key] = explode('+', "0+0+0+0");
	}
}
	
$glossObject = array(); //Array of gloss photo object

//Setting gloss photo object
foreach($gPhoto as $key => $value){
	$glossObject[$key] = new Photo($gPhoto[$key][0], $gPhoto[$key][1],$gPhoto[$key][2],$gPhoto[$key][3]);
}

$mattObject = array(); //Array of matt photo objects

//Setting matt photo object
foreach($mPhoto as $key => $value){
	$mattObject[$key] = new Photo($mPhoto[$key][0], $mPhoto[$key][1], $mPhoto[$key][2], $mPhoto[$key][3]);
}

//outputting all objects
/*foreach($glossObject as $i)
	echo $i->getInfo();

foreach($mattObject as $i)
	echo $i->getInfo();*/


$fullObject = array_merge($glossObject, $mattObject); //Merged two arrays together
makeDir();
moveToDir();
//Setting all POST variable to send to the DB.
$date = date("Y-m-d H:i:s");
$user = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$db = new mysqli('localhost','root','root','photo');
$query = "INSERT INTO `order`(`id`,`name`,`email`,`phone`, `date`) VALUES($_SESSION[user], '$user', '$email','$phone', '$date')";
$result = $db->query($query);

echo "<h2>Уважаемый " . $user . " Ваш номер заказа: " . $_SESSION['user'] . "</h2>";

if($result){
	echo "<h3 style='color: green;'>Спасибо! Ваш заказ был успешно отправлен. Мы свяжемся с вами в ближайшее время</h3><a href='upload.php'>На главную</a>";
	
	
}
else{
	echo "<h3 style='color: red;'>К сожалению ваш запрос не удалось обработать. Попробуйте заново либо попробуйте зайти позже. Просим извенения за неудобства.</h3><a href='upload.php'>На главную</a>";
}

?>

</body>
</html>

<?php

function makeDir(){
	global $fullObject;
	$root = "uploads";
	mkdir($root);
	
	foreach($fullObject as $key => $value){
		if($value->getPosition() && $value->getType() == 'Глянец'){
			mkdir("{$root}/{$_SESSION['user']}/Gloss");
			mkdir("{$root}/{$_SESSION['user']}/Gloss/{$value->getFormat()}");
			mkdir("{$root}/{$_SESSION['user']}/Gloss/{$value->getFormat()}/{$value->getQty()}");
		}
		else if($value->getPosition() && $value->getType() == 'Мат'){
			mkdir("{$root}/{$_SESSION['user']}/Matt");
			mkdir("{$root}/{$_SESSION['user']}/Matt/{$value->getFormat()}");
			mkdir("{$root}/{$_SESSION['user']}/Matt/{$value->getFormat()}/{$value->getQty()}");
		}
	}
}

function moveToDir(){
	/*global $fullObject;
	$ext = $_SESSION['ext'];
	$root = "uploads/{$_SESSION['user']}";
	$splited = array();

	foreach($fullObject as $i => $v){
			$splited[$i] = $v->explodePosition();
	}
		
	foreach($fullObject as $key => $v){
		if($v->getType() == 'Глянец'){
			if($splited[$i][0]){
				
			}
		}
	}*/
	
	/*for($i = 0; $i < count($splited); $i++){
		for($j = 0; $j < count($splited[$i]); $j++){
			echo $splited[$i][$j] . "  ";
		}
		echo "<br>";
	}*/
}

?>