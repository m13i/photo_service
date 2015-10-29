<?php

$currency = "&#8372"; //UAH currency sign.

$prices = array(
		'9x13' => 1.8,
		'10x15' => 1.9,
		'13x18' => 3.7,
		'15x21' => 3.9,
		'20x30' => 9.0
);

function db_connection(){
	$db = new mysqli('localhost','root','root','photo');
	$table = $db->select_db('user');
	
	$query = "INSERT INTO `user`() VALUES()";

	if(isset($_POST['submit'])){
		$db->query($query);
		$query = "SELECT MAX(`id`) FROM `user`";
		$result = $db->query($query);
		//$db->query("DELETE FROM `user` WHERE MAX(`id`)-1"); //Script adds excess record to user-DB then needed to delete it.
		return $result;
	}
	
	return 0;
	
}

?>
