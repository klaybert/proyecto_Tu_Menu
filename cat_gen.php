<?php
include("clases.php");
if(isset($_POST["datos"]))
{
	$selecton = new Selector("categorias_generales", "");
	$array_envio = [];
	$array_reciclo = [];
	$array_cambio = [];
	$campos = $selecton->h_campos_array();
	$ej = $selecton->h_query();
	if($ej)
	{
		//Este foreach busca 
		foreach($ej as $row) 
		{

			for($i=0;$i<count($campos);$i++)
			{
				if($i==0)
				{
					$array_reciclo = [];
					//Aqui buscamos la subcategoria
					//hacemos un nuevo objeto
					$sub_cat = new Selector("categorias", "WHERE id_cat_gen = '".$row[$campos[$i]]."'");
					$campos_cat = $sub_cat->h_campos_array();
					$fila = $sub_cat->h_query();
					// $fila = $sub_cat->h_query_campos("id_cat");
					if($fila)
					{
						foreach ($fila as $cat) 
						{
							for($j=0; $j<count($campos_cat);$j++)
							{
								//aqui obtenemos las subcategorias
								array_push($array_reciclo, $cat[$campos_cat[$j]]);
							}
							
						}
						$array_cambio = $array_reciclo;

					}
				}


				array_push($array_envio, $row[$campos[$i]]);

			}
			array_push($array_envio, $array_cambio);

		}
		print_r(json_encode($array_envio));
	}
	else
	{
		echo 1;
	}
}


?>