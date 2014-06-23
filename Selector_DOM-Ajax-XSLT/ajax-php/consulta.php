<?php
	function conexion(){
		$conexion=mysqli_connect('localhost', 'root', '', 'practicas');
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		return $conexion;
	}


	function getUsers(){
		$con=conexion(); 
		$sql="SELECT * FROM usuariostel";
		$registro=mysqli_query($con, $sql);// or die(mysqli_error($con));
		while($reg=mysqli_fetch_array($registro)){
			$nombre=$reg['nombre'];
			echo "<option value='$nombre'>$nombre</option>";
		}
	}

	function getTel($user){
		$con=conexion(); 
		$sql="SELECT * FROM telefonos WHERE usuario='$user'";
		$registro=mysqli_query($con, $sql) or die(mysqli_error($con));
		while($reg=mysqli_fetch_array($registro)){
			$tel=$reg['tel'];
			echo "<option value='$tel'>$tel</option>";
		}
	}

	$wth=$_POST['wth'];

	if(isset($wth)){
		if($wth == "users"){
			getUsers();
		}

		if($wth == "tel"){
			$user=$_POST['user'];
			getTel($user); 
		}
	}
?>
