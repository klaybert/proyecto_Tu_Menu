<?php
include("clases.php");
if(isset($_POST["dato"]))
{
	$dato = $_POST["dato"];
	$array_envio = array();
	$selecton = new Selector("categorias", "");
	$campos = $selecton->h_campos_array();
	$ej = $selecton->h_query();

	if($ej)
	{
		$fila = $selecton->h_query();
//hasta aqui trabaja
		foreach($fila as $row) 
		{

			for($i=0;$i<count($campos);$i++)
			{
				array_push($array_envio, $row[$campos[$i]]);
			}
			// print_r(json_encode($array_envio));
			print_r($array_envio);

		}
	}
	else
	{
		echo 1;
	}

}
//WHERE nom_cat LIKE %$dato%
?>