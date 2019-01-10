<?php
require '../../Include/db_connect.php';
$queryDias = "SELECT * FROM lvv_servicios WHERE Estado = 1";
if (!$qDias = mysqli_query($db,$queryDias)) {
    echo "error al buscar areas";
    die();
}

$queryArea = "SELECT * FROM lvv_privilegios WHERE Estado = 1";
if (!$Qarea = mysqli_query($db,$queryArea)) {
    echo "error al buscar areas";
    die();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#table_general{
			background-color: #eeeeee;
			border-collapse: collapse;
			width: 100%;
		}


		th, td{
			/*border:solid 1px;*/
			padding: 3px;
			border-right: solid 1px;
			border-right-color: silver;
		}
		.cabeceraTH{
			text-align: center;
			vertical-align: middle;
			background-color: rgb(6,79,104);
			border-bottom: solid 3px;
			color: white;
			width: 65px;
			
		}
		.areas{
			padding: 5px;

		}

		.imgRedondas {
		    width:40px;
		    height:40px;
		    border-radius:100px;
		    margin-bottom: 5px;
		}
		.Integrante{
			margin-top: -10px;
			text-align: right;
		}
		.integranteIMG{
			display: block;
			margin-left: 0;

		}
		.trPAR{
			background-color: #dedede;
			border-bottom: solid 1px;
		}
		.tdArea{
			text-align: center;
			background-color: #246355;
			color: white;
			border-bottom: solid 1px;
		}
		#logoAnos{
			width:225px;
		}
		#fechasD{
			
		}
	</style>
</head>
<body>
	<?php //recibo el nombre CodPrivilegio  CodServicio o dia ?>

<table id="table_general">
		<tr id="cabecera">
			<th class="cabeceraTH"></th>
		
		<?php 
			while ($qDia = mysqli_fetch_assoc($qDias)) {// nombre de los servicios o dias 
				 $fechas = "fecha".$qDia['CodServicio'];
				 if ($_POST[$fechas] != "") {
				 	$fechaDia = date("d/m/Y",strtotime($_POST[$fechas]));
				 }else{
				 	$fechaDia = "";
				 }
			?>
          <th class="cabeceraTH"><?=utf8_encode($qDia['Nombre'])?><br><br><span id="fechasD"><?=$fechaDia?></span></th>
        <?php } ?>
        </tr>
	
		
		<?php 
		   $noTr = 0;
			while ($rowArea = mysqli_fetch_assoc($Qarea)) {
				$noTr++;
				if ($noTr%2==0) {
					$clasePar = "trPAR";
				}else{
					$clasePar = "trINPAR";
				}
				$nombres = str_replace(" ", "", $rowArea['Nombre']);	

				if (!$qDias2 = mysqli_query($db,$queryDias)) {
				    echo "error al buscar areas";
				    die();
				}	
		?>		
			<tr class="areas <?=$clasePar?>">
				
				<th class="tdArea"><?=$rowArea['Nombre'];?></th>
				<?php
				while ($qDia2 = mysqli_fetch_assoc($qDias2)) {
					$NombrePost = $nombres." ".$rowArea['CodPrivilegio']." ".$qDia2['CodServicio'];
					$nombrePost = str_replace(" ", "_", $NombrePost);
					$CodUsuario = $_POST[$nombrePost];
				?>
				<td class="Inte">
					<?php 
						if ($CodUsuario > 0) {
							if (!$rowU = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM lvv_integrantes WHERE CodIntegrante = $CodUsuario"))) {
								$CodUsuario = "Error Asooc";
							}
							
							$nombreIntegrante = utf8_encode($rowU['Nombres'])." ".utf8_encode($rowU['Apellidos']);
							
							if ($rowU['Img'] == "") {
								$img = 'user.png';
							}else{
								$img = $rowU['Img'];
							}
						}else{
							$nombreIntegrante = "";
							$img = 'user.png';
						}

					 ?>
					<span class="integranteIMG"><img  src='../../imgIntegrantes/<?=$img?>' class='imgRedondas'/></span>
					<span class="Integrante"><?=$nombreIntegrante?></span>										 
				</td>
			   <?php 
			   		}
			    ?>
			</tr>

		<?php 
			}
		 ?>
			
</table>


</body>
</html>