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
		$users=array(); 

		$sql="SELECT * FROM usuariostel";
		$registro=mysqli_query($con, $sql) or die (mysqli_error($con));
		while($reg=mysqli_fetch_array($registro)){
			$users[]=$reg;
			//$nombre=$reg['nombre'];
			//echo "<option value='$nombre'>$nombre</option>";
			//return $nombre;
		}
		return $users;
	}

	function getTel($user){
		$con=conexion();
		$telefonos=array();
		$sql="SELECT * FROM telefonos WHERE usuario='$user'";
		$registro=mysqli_query($con, $sql) or die(mysqli_error($con));
		while($reg=mysqli_fetch_array($registro)){
			$tel=$reg['tel'];
			$telefonos[]=$reg;
			//echo "<option value='$tel'>$tel</option>";
		}
		return $telefonos;
	}

	function getXml(){
		$con=conexion(); 
		$users=getUsers();
		$xml = new SimpleXMLElement('<xml/>');


		foreach($users as $user){
			$nombre= $user['nombre'];
			$usuarios= $xml -> addChild('usuario');
			$usuarios -> addChild('nombre', $nombre );
			$telefonos=getTel($nombre);
			foreach($telefonos as $tel){
				$num=$tel['tel'];
				$usuarios -> addChild('telefono', $num );
			}
		}
		Header('Content-type: text/xml');     	
		print($xml->asXML());

	}

	getXml();

?>
