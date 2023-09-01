<?php
	 $server = 'localhost';
	 $name   = 'root';
	 $pass	 = '123';
	 $db_name= 'seikowall';
	  $db = mysqli_connect($server,$name,$pass, $db_name);

	  if($db == false){
	  die('Error'. mysqli_connect_error($db));

	  }
?>