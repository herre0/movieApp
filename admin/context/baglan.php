<?php  

try {
	$db=new PDO("mysql:host=localhost;dbname=movie",'root','desabi54');
	
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>