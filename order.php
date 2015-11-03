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
$mPhoto = array(); //Array of exploded matt photos

//exploding gloss photos
foreach($tempGloss as $key => $value){
	if($value != '+'){
		$gPhoto[$key] = explode('+', $value);
	}
	else{
		$gPhoto[$key] = explode('+', "0+0+0+0");
	}
}

//exploding matt photos
foreach($tempMatt as $key => $value){
	if($value != '+'){
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
foreach($glossObject as $i)
	echo $i->getInfo();

foreach($mattObject as $i)
	echo $i->getInfo();


//Create specific folder for each type, format and corresponding quantity
makeGlossDir();
makeMattDir();

//Merge two arrays into one
$fullObject = array_merge($glossObject, $mattObject);
moveToDirGloss();
moveToDirMatt();
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

//Making folders in file system with gloss format
function makeGlossDir(){
	global $glossObject;
	$root = "uploads";
	mkdir($root);
	$expGloss = getQtyExploded($glossObject);
	
	foreach($glossObject as $key => $value){
		if($value->getPosition() && $value->getType() == 'Глянец'){
			mkdir("{$root}/{$_SESSION['user']}/Gloss");
			mkdir("{$root}/{$_SESSION['user']}/Gloss/{$value->getFormat()}");
			
			
			for($l = 0; $l < count($expGloss[$key]); $l++){
				mkdir("{$root}/{$_SESSION['user']}/Gloss/{$value->getFormat()}/{$expGloss[$key][$l]}");
			}
			
		}
	}
}

//Making folders in file system which corresponds to matt format
function makeMattDir(){
	global $mattObject;
	$root = "uploads";
	mkdir($root);
	$expMatt = getQtyExploded($mattObject);
	
	foreach($mattObject as $key => $value){
		if($value->getPosition() && $value->getType() == 'Мат'){
			mkdir("{$root}/{$_SESSION['user']}/Matt");
			mkdir("{$root}/{$_SESSION['user']}/Matt/{$value->getFormat()}");
			
			
			for($l = 0; $l < count($expMatt[$key]); $l++){
				mkdir("{$root}/{$_SESSION['user']}/Matt/{$value->getFormat()}/{$expMatt[$key][$l]}");
			}
			
		}
	}
}

//Making exploded array to generate folders with correct quantity of some format.
function getQtyExploded($arr){
	$temp = array();
	foreach($arr as $key => $value){
		$temp[$key] = $value->explodeQty();
	}
	return $temp;
}

//Making exploded array of positions
function getPosExploded($arr){
	$temp = array();
	foreach($arr as $key => $value){
		$temp[$key] = $value->explodePosition();
	}
	return $temp;
}

//Moving uploaded files from root directory to specific format and quantity folders.
// ***** TO DO *****
function moveToDirGloss(){
	global $glossObject;
	$ext = $_SESSION['ext'];
	$root = "uploads/{$_SESSION['user']}";
	$glossSplited = getPosExploded($glossObject);
	$glossQty = getQtyExploded($glossObject);
	
	for($key = 0; $key < count($glossSplited); $key++){
		if($glossObject[$key]->getPosition() && $glossObject[$key]->getType() == 'Глянец'){

			for($l = 0; $l < count($glossSplited[$key]); $l++){
				rename("{$root}/{$glossSplited[$key][$l]}.{$ext[$l]}", "{$root}/Gloss/{$glossObject[$key]->getFormat()}/{$glossQty[$key][$l]}/{$glossSplited[$key][$l]}.{$ext[$l]}");
			}
			
		}
	}

}

function moveToDirMatt(){
	global $mattObject;
	$ext = $_SESSION['ext'];
	$root = "uploads/{$_SESSION['user']}";
	$mattSplited = getPosExploded($mattObject);
	$mattQty = getQtyExploded($mattObject);
	
	for($key = 0; $key < count($mattSplited); $key++){
		if($mattObject[$key]->getPosition() && $mattObject[$key]->getType() == 'Мат'){

			for($l = 0; $l < count($mattSplited[$key]); $l++){
				rename("{$root}/{$mattSplited[$key][$l]}.{$ext[$l]}", "{$root}/Matt/{$mattObject[$key]->getFormat()}/{$mattQty[$key][$l]}/{$mattSplited[$key][$l]}.{$ext[$l]}");
			}
			
		}
	}

}


?>