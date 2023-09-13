<?php
	 $server = 'localhost';
	 $name   = 'root';
	 $pass	 = '';
	 $db_name= '';
	  $db = mysqli_connect($server,$name,$pass, $db_name);

	  if($db == false){
	  die('Error'. mysqli_connect_error($db));

	  }
?>
