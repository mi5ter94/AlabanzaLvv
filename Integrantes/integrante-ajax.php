<?php 
include "../Include/db_connect.php";

if ($_POST['op'] == "BuscarDatos") {
	$Codigo = $_POST['CodIntegrante'];

	if (!$rowDatos = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lvv_integrantes WHERE CodIntegrante = $Codigo "))) {
		echo('error al Buscar Informacion');
		die();
	}
	$imgRut = $rowDatos['Img'];
?>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 text-center">
				<img  src='../imgIntegrantes/<?=$imgRut?>' class='imgRedonda' />
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4 text-center">
				<label>
					Nombres
				</label>
				<input type="text" id="NombresEdit" class="form-control" value="<?=utf8_encode($rowDatos['Nombres']);?>">
			</div>
			<div class="col-md-4 text-center">
				<label>
					Apellidos
				</label>
				<input type="text" id="ApellidosEdit" class="form-control" value="<?=utf8_encode($rowDatos['Apellidos']);?>">
			</div>
			<div class="col-md-4 text-center">
				<label>
					Celular
				</label>
				<input type="text" id="CelularEdit" class="form-control" value="<?=utf8_encode($rowDatos['Celular']);?>">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-2"></div>
			<div class="col-md-2"><button type="button" class="btn btn-outline-success" onclick="edit(<?=$Codigo?>)">Guardar</button></div>
			<div class="col-md-2"></div>
			<div class="col-md-3"></div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<label>Areas:</label>
				<select multiple class="form-control" id="Areas" ondblclick="agregar(this.value,<?=$Codigo?>)" size="6">
					<?php 
						$Qarea = "SELECT *
								FROM lvv_areas
								WHERE Estado = 1 AND CodArea NOT IN 
								(SELECT CodArea FROM lvv_usuarioarea WHERE CodIntegrante = $Codigo);";

						if (!$queryArea = mysqli_query($db,$Qarea)) {
							echo "error";
							die();
						}
						while ($area = mysqli_fetch_assoc($queryArea)) {
						
					 ?>
						<option  value="<?=$area['CodArea']?>"><?=utf8_encode($area['Nombre']);?></option>

					 <?php 
					 	}
					  ?>
				</select>
			</div>
			<div class="col-md-6">
				<label>Pertenece a:</label>

				<select multiple class="form-control" id="AreasUsada" ondblclick="Quitar(this.value,<?=$Codigo?>)" size="6">
					<?php 
						$Qarea1 = "SELECT a.Nombre,a.CodArea
									FROM lvv_usuarioarea ua
									INNER JOIN lvv_areas a ON ua.CodArea = a.CodArea
									WHERE ua.CodIntegrante = $Codigo;";

						if (!$queryArea1 = mysqli_query($db,$Qarea1)) {
							echo "error";
							die();
						}
						while ($area1 = mysqli_fetch_assoc($queryArea1)) {
						
					 ?>
						<option  value="<?=$area1['CodArea']?>"><?=utf8_encode($area1['Nombre']);?></option>

					 <?php 
					 	}
					  ?>
				</select>
			</div>
		</div>
	</div>
<?php  	
}

if ($_POST['op'] == "Editar") {
	$CodIntegrante = $_POST['CodIntegrante'];


	$Nombres = utf8_decode(str_replace("'", "\'", $_POST['Nombres']));
	$Apellidos = utf8_decode(str_replace("'", "\'", $_POST['Apellidos']));
	$Celular = utf8_decode(str_replace("'", "\'", $_POST['Celular']));



	if ($_POST['Nombres'] != "") {
		$Nombres1 = ",Nombres = '$Nombres'";
	}

	if ($_POST['Apellidos'] != "") {
			$Apellidos1 = ",Apellidos = '$Apellidos'";
		}

	if ($_POST['Celular'] != "") {
		$Celular1 = ",Celular = '$Celular'";
	}

	$update = "UPDATE lvv_integrantes SET Estado = 1 $Nombres1 $Apellidos1 $Celular1 WHERE CodIntegrante = $CodIntegrante";


	if (!$querys = mysqli_query($db,$update)) {
		echo "error actualizando";
		die();
	}

	echo 1;
}


if ($_POST['op'] == "add") {
	$CodArea = $_POST['CodArea'];	
	$Integrante = $_POST['Integrante'];

	$querys = "INSERT INTO lvv_usuarioarea (CodIntegrante,CodArea,Estado) VALUES ($Integrante,$CodArea,1)";

	if (!$query = mysqli_query($db,$querys)) {
		echo "error al insertar area";
		die();
	}
	echo 1;
}

if ($_POST['op'] == "del") {
	$CodArea = $_POST['CodArea'];	
	$Integrante = $_POST['Integrante'];

	$querys = "DELETE FROM lvv_usuarioarea WHERE CodArea = $CodArea AND CodIntegrante = $Integrante";


	if (!$query = mysqli_query($db,$querys)) {
		echo "error al eliminar area $querys";
		die();
	}
	echo 1;
}


if ($_POST['op'] == "NuevoIntegrante") {
?>
<form action="nuevoIntegrante.php" method="post" enctype="multipart/form-data" id="uploadForm" onsubmit="return valida(this)">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 text-center">
				<div id="imagenPrew">
					<img  src='../imgIntegrantes/user.png' class='imgRedonda' id="imgPRe"  />
				</div>
				
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="Imagen" id="intIMG" accept="image/*" onchange="prew(this.value,this)" >
				    <label class="custom-file-label" for="Imagen" id="nombreIMGA">Seleccionar Imagen</label>
				 </div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4 text-center">
				<label>
					Nombres
				</label>
				<input type="text" id="Nombres" name="Nombres" class="form-control">
			</div>
			<div class="col-md-4 text-center">
				<label>
					Apellidos
				</label>
				<input type="text" id="Apellidos" name="Apellidos" class="form-control">
			</div>
			<div class="col-md-4 text-center">
				<label>
					Celular
				</label>
				<input type="text" id="Celular" name="Celular" class="form-control">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-2"></div>
			<div class="col-md-2"><input type="submit" class="btn btn-success" value="Guardar"></div>
			<div class="col-md-2"></div>
			<div class="col-md-3"></div>
		</div>
		<br>
		
	</div>
</form>
<?php 
}

if ($_POST['op'] == "ListInte") {
?>
<select multiple class="form-control" id="IntegranteSelect" onchange="mostrarDatos(this.value)" size="13" >
	<?php 
	$nombre = utf8_decode($_POST['nombre']);


              $query = "SELECT * FROM lvv_integrantes WHERE Estado = 1 ";

              if ($nombre != "Invali06" && $nombre != "") {
              	$query .= ' AND Concat(Nombres," ", Apellidos) like "%'.$nombre.'%"';
              }
              $query .= " Order by CodIntegrante desc";
              	
              if (!$Query = mysqli_query($db,$query)) {
                echo "erro al buscar integrantes";
                die();
              }
              while ($rowI = mysqli_fetch_assoc($Query)) {
            ?>
              <option class="opciones" value="<?=$rowI['CodIntegrante']?>"><?=utf8_encode($rowI['Nombres'])?> <?=utf8_encode($rowI['Apellidos'])?></option>
            <?php } 
            ?>
            </select>
            <?php 
}
 ?>