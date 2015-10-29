<!doctype html>
<html>
<head>
	<title>Отправлено - photo-service</title>
	<meta charset="utf-8">
</head>
<body>
<?php

session_start();

date_default_timezone_set("Europe/Kiev");

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
	//echo "<h2>Уважаемый " . $user . " Ваш номер заказа: " . $_SESSION['user'] . "</h2>";
}
else{
	echo "<h3 style='color: red;'>К сожалению ваш запрос не удалось обработать. Попробуйте заново либо попробуйте зайти позже. Просим извенения за неудобства.</h3><a href='upload.php'>На главную</a>";
	//echo "<h2>Уважаемый " . $user . " Ваш номер заказа: " . $_SESSION['user'] . "</h2>";
}

?>

</body>
</html>