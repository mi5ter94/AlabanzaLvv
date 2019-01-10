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
					
					case "comboq":
						if (!$result = mysqli_query($db,$this->Query)) {
							echo '<br>Combo Error: ' . $this->Query;
							return;
						}
     					$html = '<select name="' . $this->Nombre . '" id="' . $this->Nombre . '"';
						if ($this->Clase) {
							$html .= ' class="' . $this->Clase . '"';
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
