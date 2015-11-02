<!doctype html>
<html>
<head>
	<title>Заявка на консультацию - Photo Service</title>
	<meta charset="utf-8">
</head>
<body>

<?php
	session_start();

	$db = new mysqli('localhost','root','root','photo');
	
	if(!$db)
		echo "Невозможно подключится к базе данных";
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];	
	
	date_default_timezone_set("Europe/Kiev");
	
	$date = date("Y-m-d H:i:s");
	
	$query = "INSERT INTO `home_consult`(`name`,`email`,`phone`,`date`) VALUES('{$name}','{$email}','{$phone}', '{$date}')";
	$result = $db->query($query);
	
	if(!$result){
		echo "Извините возникла ошибка, попробуйте заново.<br>";
		echo "<a href='index.html'>Отправить заново</a>";
	}
	else{
		echo "<h3>Уважаемый(я) {$name} ваша заявка успешно отправлена. Мы позвоним вам на номер: {$phone}</h3>";
		echo "<br><a href='index.html'>На главную</a>";	
	}
?>

</body>
</html>
