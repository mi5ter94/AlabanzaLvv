<?php

		class Campo { 
			var $Nombre;
			var $Tipo;
			var $Tamano;
			var $MaxLength;
			var $DefVal;
			var $Clase;
			var $onClick;
			var $onKeyUp;
			var $Disabled;
			var $Valores;
			var $onChange;
			var $titulo;
			//var $Descripcion;
			//var $Mostrar;
			var $Query;
			var $BoundCol;
			var $BoundCol2;
			var $DefVal2;
			var $Option;
			var $Hora;
			var $Src;
			var $Alt;
			var $Data_Toogle;
			var $Data_Target;
			var $Data_Whatever;
			var $Data_Dismiss;
			var $SpanButton;
			//var $html;
			
			public function desplegar() { 
				include "../Include/db_connect.php";
				
				switch ($this->Tipo) {
					case "text":
						$html = '<input type="text"';
						$html .= ' name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						$html .= ' size="' . ($this->Tamano > 0 ? $this->Tamano : '10') . '"';
						if (strlen($this->onClick) > 0) {
         					$html .= ' onChange="' . $this->onClick . '"';
     					}

     					if (strlen($this->onChange) > 0) {
         					$html .= ' onChange="' . $this->onChange . '"';
     					}
     					if (strlen($this->onKeyUp) > 0) {
         					$html .= ' onKeyUp="' . $this->onKeyUp . '"';
     					}
     					if (strlen($this->DefVal) > 0) {
         					$html .= ' value="' . trim($this->DefVal) . '"';
     					}
     					if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
						if (strlen($this->onKeyPress) > 0) {
         					$html .= ' onKeyPress="' . trim($this->onKeyPress) . '"';
     					}
     					if (strlen($this->onBlur) > 0) {
         					$html .= ' onblur="' . trim($this->onBlur) . '"';
     					}

     					if (strlen($this->MaxLength) > 0) {
         					$html .= ' maxlength="' . trim($this->MaxLength) . '"';
     					}
						/*if (strlen($this->OnEnterBuscar) > 0) {
							$html .= ' onKeyUp="' . $this->KeyUp . '"';
						}*/
						$html .= '>';
						echo $html . "\r\n";
						break;
					case "password":
						$html = '<input type="password"';
						$html .= ' name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						$html .= ' size="' . ($this->Tamano > 0 ? $this->Tamano : '10') . '"';
						if (strlen($this->onClick) > 0) {
         					$html .= ' onChange="' . $this->onClick . '"';
     					}
     					if (strlen($this->DefVal) > 0) {
         					$html .= ' value="' . trim($this->DefVal) . '"';
     					}
     					if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
						if (strlen($this->onKeyPress) > 0) {
         					$html .= ' onKeyPress="' . trim($this->onKeyPress) . '"';
     					}
						/*if (strlen($this->OnEnterBuscar) > 0) {
							$html .= ' onKeyUp="' . $this->KeyUp . '"';
						}*/
						$html .= '>';
						echo $html . "\r\n";
						break;
					case 'textarea':
					
						$html = ' <textarea'; 
						$html .= ' name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						$html .= 'cols="'.$this->Cols.'" '; 
						$html .= 'rows="'.$this->Rows.'" '; 
						if (strlen($this->onChange) > 0) {
         					$html .= ' onChange="' . $this->onChange . '"';
     					}
						if ($this->Disabled) {
							$html .= ' Disabled="' . $this->Disabled . '"';
						}
						$html .= '>'.$this->DefVal.'</textarea>';
						echo $html."\r\n";
						break;
					case "comboq":
						if (!$result = mysqli_query($db,$this->Query)) {
							echo '<br>Combo Error: ' . $this->Query;
							return;
						}
     					$html = '<select name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
     					if (strlen($this->onClick) > 0) {
         					$html .= ' onChange="' . $this->onClick . '"';
     					}
     					if (strlen($this->onChange) > 0) {
         					$html .= ' onChange="' . $this->onChange . '"';
     					}
     					$html .= '>' . "\r\n";
     					if (mysqli_num_rows($result) == 0 ) {
          					$html .= '<option value="-1" title="titular">None</option>'."\r\n";
     					} else {
       						if($this->DefVal == '-1'){
         						$html .= '<option value="-1" SELECTED>' . htmlentities('---')."</option>\r\n";
       						} else {
		 						$html .= '<option value="-1">' . htmlentities('')."</option>\r\n";
	   						}
	   					}
    					while ($row = mysqli_fetch_row($result)) {
    					 	if ($this->BoundCol == '') {
								$this->BoundCol = 0;
								$this->BoundCol1 = 1;
								$this->BoundCol2 = 2;
							}

							$Titulos = utf8_encode($row[2]);
							$Titulos = str_replace('\'', "*", $Titulos);
							$Titulos = str_replace("*<br>*", ' ',$Titulos);
							//$Titulos = str_replace("*<br>*", ' ', $row[2]);
							
							$Values= str_replace("'", '\'',$row[$this->BoundCol]);


	    					$html .= "<option value='" . $Values . "' title ='".($Titulos)."'";
         					if ($row[$this->BoundCol] == $this->DefVal) {
               					$html .= " SELECTED";
         					}

         					$texto1= utf8_encode($row[1]);
         					
         					$html .= ">".$texto1."</option>"."\r\n";
     					}
     					if (strlen($this->DefVal2) > 0) {
     						$html .= '<option value="' .$this->DefVal2. '" >'.htmlentities(utf8_encode($this->Option)).'</option>'."\r\n";
     					}
						$html .= "</select>";
    					//$html .= $this->DefVal;
						echo $html . "\r\n";
						break;
					case "comboPicker":
						if (!$result = mysqli_query($db,$this->Query)) {
							echo '<br>Combo Error: ' . $this->Query;
							return;
						}


						$html = "<select class=\"form-control selectpicker\" id=\"{$this->Nombre}\"";

						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
						$html .= ">";
						$html .= "<option value='-1'></option>";
						while ($row = mysqli_fetch_row($result))  {
							$nombres = utf8_encode(str_replace("'", "\'",$row[1]));

							if (strlen($this->DefVal) > 0) {
								if ($this->DefVal == $row[0]) {
									$selecion = "SELECTED";
								}else{
									$selecion = "";
								}
							}
						
							
						$html .= "<option value='".$row[0]."'".$selecion.">".$nombres."</option>";

						

						}

						$html .= "</select>";
						echo $html . "\r\n";


					break;

					case "combol":
						$html = '<select name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
     					if (strlen($this->onClick) > 0) {
         					$html .= ' onChange="' . $this->onClick . '"';
     					}
     					$html .= '>' . "\r\n";
     					$Cant = count($this->Valores);
     					if ($Cant == 0) {
							$html .= '<option value="-1">None</option>'."\r\n";
						} else {
							if($this->DefVal == '-1'){
         						$html .= '<option value="-1" SELECTED>' . htmlentities('---')."</option>\r\n";
       						} else {
		 						$html .= '<option value="-1">' . htmlentities('---')."</option>\r\n";
	   						}
						}
						for ($i = 0; $i < $Cant; $i++) {
							$html .= '<option value="' . $i . '"';
         					if ($i == $this->DefVal) {
               					$html .= " SELECTED";
         					}
         					$html .= '>'. $this->Valores[$i] . '</option>'."\r\n";
						}
						$html .= '</select>';
						echo $html;
						break;
					case "date":
						if (strlen($this->DefVal) < 5) {
						 	$sinfecha = 1;
						} else {
							$fechaTS = strtotime($this->DefVal);
							$diadef = date('d', $fechaTS);
							$mesdef = date('m', $fechaTS);
							$anodef = date('Y', $fechaTS);
						if (strlen($this->Hora)>0) {
							$horadef = date('H:i', $fechaTS);
						}
							if (!checkdate($mesdef, $diadef, $anodef)) {
								$sinfecha = 1;
							} else {
								$sinfecha = 0;
							}
						}
						//--Dia
						$html = '<input type="text"';
						$html .= ' name="Dia' . $this->Nombre . '" id="Dia' . $this->Nombre . '"';
						$html .= ' size="2"';
						if (strlen($this->onClick) > 0) {
         					$html .= ' onblur="' . $this->onClick . '"';
     					}
     					if (strlen($this->DefVal) > 0) {
         					$html .= ' value="' . $diadef . '"';
     					}
     					if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
						$html .= '> - ';
						//--Mes
						$html .= '<select';
						$html .= ' name="Mes' . $this->Nombre . '" id="Mes' . $this->Nombre . '"';
						if (strlen($this->onClick) > 0) {
         					$html .= ' onChange="' . $this->onClick . '"';
     					}
     					if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
						$html .= '>';
						$html .= '<option value="-1"' . ($sinfecha == 1 ? ' SELECTED' : '') . '>---</value>';
						$html .= '<option value="1"' . ($mesdef == 1 ? ' SELECTED' : '') . '>Ene</value>';
						$html .= '<option value="2"' . ($mesdef == 2 ? ' SELECTED' : '') . '>Feb</value>';
						$html .= '<option value="3"' . ($mesdef == 3 ? ' SELECTED' : '') . '>Mar</value>';
						$html .= '<option value="4"' . ($mesdef == 4 ? ' SELECTED' : '') . '>Abr</value>';
						$html .= '<option value="5"' . ($mesdef == 5 ? ' SELECTED' : '') . '>May</value>';
						$html .= '<option value="6"' . ($mesdef == 6 ? ' SELECTED' : '') . '>Jun</value>';
						$html .= '<option value="7"' . ($mesdef == 7 ? ' SELECTED' : '') . '>Jul</value>';
						$html .= '<option value="8"' . ($mesdef == 8 ? ' SELECTED' : '') . '>Ago</value>';
						$html .= '<option value="9"' . ($mesdef == 9 ? ' SELECTED' : '') . '>Sep</value>';
						$html .= '<option value="10"' . ($mesdef == 10 ? ' SELECTED' : '') . '>Oct</value>';
						$html .= '<option value="11"' . ($mesdef == 11 ? ' SELECTED' : '') . '>Nov</value>';
						$html .= '<option value="12"' . ($mesdef == 12 ? ' SELECTED' : '') . '>Dic</value>';

						$html .= '</select> - ';
						//--Ano
						$html .= '<input type="text"';
						$html .= ' name="Ano' . $this->Nombre . '" id="Ano' . $this->Nombre . '"';
						$html .= ' size="2"';
						if (strlen($this->onClick) > 0) {
         					$html .= ' onblur='.$this->onClick.' ';
     					}
     					if (strlen($this->DefVal) > 0) {
         					$html .= ' value="' . $anodef . '"';
     					}
     					if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if ($this->Disabled) {
							$html .= ' DISABLED';
						}
						$html .= '> ';
						if (strlen($this->Hora)>0) {
							$html .= '  <input type="text"';
							$html .= ' size="8"';
							$html .= ' name="Hora' . $this->Nombre . '" id="Hora' . $this->Nombre . '"';
						if (strlen($this->onClick) > 0) {
         					$html .= ' onBlur='.$this->onClick.' ';
     					}
							$html .= ' value="' . $horadef . '" >';
						}
						echo $html . "\r\n";
						break;
					case 'hora':
						if (strlen($this->DefVal) < 5) {
							$sinfecha = 1;
						} else {
							$fechaTS = strtotime($this->DefVal);
							$hora = date('H', $fechaTS);
							$min = date('i', $fechaTS);
						}
						/*********HORA/*****/
						$html .= '  <input type="text"';
						$html .= ' size="1" ';
						$html .= ' name="Hora' . $this->Nombre . '" id="Hora' . $this->Nombre . '"';
							if (strlen($this->onClick) > 0) {
	         					$html .= ' onBlur='.$this->onClick.' ';
	     					}
						$html .= ' value="'.$hora.'" >';
						//*******MINUTOS***///
						$html .= ':<input type="text"';
						$html .= ' size="1" ';
						$html .= ' name="Min' . $this->Nombre . '" id="Min' . $this->Nombre . '"';
							if (strlen($this->onClick) > 0) {
	         					$html .= ' onBlur='.$this->onClick.' ';
	     					}
						$html .= ' value="'.$min.'">';	
						echo $html . "\r\n";
					break;
					case "check":
						$html = '<input type="checkbox" name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						if ($this->DefVal == 1) {
							$html .= ' CHECKED';
						}
						if ($this->Disabled == 1) {
							$html .= ' DISABLED';
						}
						if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if (strlen($this->onClick) > 0) {
         					$html .= ' onChange="' . $this->onClick . '"';
     					}
						$html .= '>';
						echo $html . "\r\n";
						break;
					case "button":
						$html = '<button type="button" name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						
						if (strlen($this->Disabled) > 3) {
							$html .= ' DISABLED = "'.$this->Disabled.'" ';
						}elseif ($this->Disabled == 1) {
							$html .= ' DISABLED ';
						}

						if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
						}
						if (strlen($this->onClick) > 0) {
         					$html .= ' onClick="' . $this->onClick . '"';
     					}
     					if (strlen($this->Data_Target) > 0) {
         					$html .= ' data-target="' . $this->Data_Target . '"';
     					}
     					if (strlen($this->Data_Toogle) > 0) {
         					$html .= ' data-toggle="' . $this->Data_Toogle . '"';
     					}
     					if (strlen($this->Data_Whatever) > 0) {
         					$html .= ' data-whatever="' . $this->Data_Whatever . '"';
     					}
     					if (strlen($this->Data_Dismiss) > 0) {
         					$html .= ' data-target="' . $this->Data_Dismiss . '"';
     					}
						$html .= '>';
						if (strlen($this->SpanButton) > 0) {
         					$html .= ' <span class="'.$this->SpanButton.'"></span>';
     					}
     					$html .= '' . $this->DefVal . '';

						$html .= "</button>";
						echo $html . "\r\n";
						break;
					case "img":
						$html = '<img name="'.$this->Nombre.'" id="'.$this->Nombre.'" ';
						$html .= ' src="'.$this->Src.'" ';
						$html .= 'alt="'.$this->Alt.'" ';

						if (strlen($this->onClick)  > 0) {
							$html .= ' onclick="'.$this->onClick.'" ';
						}

						$html .= ' >';
						echo $html."\r\n";
 					break;

				} // de Switch Tipo Campo
				/*if (strlen($this->onEnterKey) > 0) {
         			$script = '<script type="text/javascript">' . "\r\n";
         			$script .= ' $("#' . $this->Nombre . '").keyup(function(e){
    					var code = e.which; // recommended to use e.which, its normalized across browsers
    					if(code==13)e.preventDefault();
    					if(code==32||code==13||code==188||code==186){
        					$("#displaysomething").html($(this).val());
    					} // missing closing if brace
					});
                   	</script>';
					echo $script;
     			}*/
			} // de Funcion Desplegar
		} // de Class Campo


?>
