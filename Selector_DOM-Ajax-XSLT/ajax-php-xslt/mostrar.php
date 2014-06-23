<?php
	$var=$_POST['input'];
	print "<ul>";
	foreach($var as $item){
		echo "<li>$item </li>";
	}
	print "</ul>";   
?>
