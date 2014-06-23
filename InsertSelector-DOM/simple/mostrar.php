<?php
  $var=$_POST['opciones'];
  	print "<ul>";
	foreach($var as $item){
		echo "<li>$item </li>";
	}
	print "</ul>";
?>
