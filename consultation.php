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
	
	$user = $_SESSION['user'];
	$name = $_POST['cname'];
	$phone = $_POST['cphone'];
	
	date_default_timezone_set("Europe/Kiev");
	
	$date = date("Y-m-d H:i:s");
	
	$query = "INSERT INTO `consult`(`id`,`name`,`phone`,`date`) VALUES({$user}, '{$name}', '{$phone}', '{$date}')";
	$result = $db->query($query);
	
	if(!$result){
		echo "Извините возникла ошибка. Возможно вы уже сделали заявку. Ожидайте звонка<br>";
		echo "<a href='upload.php'>Отправить заново</a>";
	}
	else{
		echo "<h3>Уважаемый(я) {$name} ваша заявка успешно отправлена. Мы позвоним вам на номер: {$phone}</h3>";
		echo "<br><a href='index.html'>На главную</a>";	
	}
?>

</body>
</html>
