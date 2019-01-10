<?php 

include "../Include/db_connect.php";
$errorNombre = 0;

if ($_FILES["Imagen"]["error"] > 0) { // subida de la imagen a la carpeta de imgIntegrantes
	echo "error al cargar archivo";
}else{
	$permitidos = array("image/gif","image/png","image/jpg","image/jpeg");
	$limite_kb = 2000000;
	if (in_array($_FILES["Imagen"]["type"] , $permitidos)) {
		$ruta = "../imgIntegrantes/";
		$nombreimg = str_replace(" ", "_", $_FILES["Imagen"]["name"]);
		$archivo = $ruta.$nombreimg;
		if (!file_exists($archivo)) {
			$result = move_uploaded_file($_FILES["Imagen"]["tmp_name"], $archivo);
				if ($result) {
					$imgSubida = 1;
				}else{
					echo "error al mover";
					$errorNombre++;
				}
		}else{
			echo "El nombre de la Imagen coincide con otra. Por favor Cambiar el nombre de la imagen a subir.";
			$errorNombre++;
		}
	}else{
		echo "archivo no permitido, Ingrese una imagen";
		$errorNombre++;
	}
}

if ($errorNombre == 0) {
	$queryIN  = "INSERT INTO lvv_integrantes (Estado";
	$queryIN2 = " VALUES (1";

	$queryIN  .= ",Nombres";
	$queryIN2 .= ",'".utf8_decode(str_replace("'", "\'", $_POST['Nombres']))."'";


	$queryIN  .= ",Apellidos";
	$queryIN2 .= ",'".utf8_decode(str_replace("'", "\'", $_POST['Apellidos']))."'";


	if ($_POST['Celular'] != "") {
		$queryIN  .= ",Celular";
		$queryIN2 .= ",'".$_POST['Celular']."'";
	}

	if ($imgSubida == 1) {
		$queryIN  .= ",Img";
		$queryIN2 .= ",'$nombreimg'";
	}

	$queryIN  .= ")";
	$queryIN2 .= ")";


	if (!$Query = mysqli_query($db,$queryIN.$queryIN2)) {
		echo("error al insertar datos en la Base de Datos <br><br>$queryIN.$queryIN2 ");
		die();
	}
	else{
		echo '<script>window.location="index.php";</script>';
	}
}
	

 ?>