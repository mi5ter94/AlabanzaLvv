<?php 
include "../Include/db_connect.php";
include "ChristianFields.php";


if ($_POST['op'] == "imgInte") {
	$codInte = $_POST['CodInt'];

	if (!$row = mysqli_fetch_assoc(mysqli_query($db,"SELECT Img FROM lvv_integrantes WHERE CodIntegrante = $codInte"))) {
		echo "error";
		die();
	}
	$imgFin = $row['Img'];

	if ($imgFin == "") {
		$imgFin = "user.png";
	}
	echo "<img  src='../imgIntegrantes/$imgFin' class='imgRedonda' />";
}
 ?>