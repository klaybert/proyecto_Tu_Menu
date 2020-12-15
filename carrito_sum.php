<?php
//php que realiza la suma de items en el carrito de compra
include("clases.php");
if(isset($_POST["dato"]))
{
	$id_menu = $_POST["dato"]; //aqui recibimos el id_menu del click para añadirlo del pedido
	$id_ped = $_POST["dato2"]; //aqui tenemos el id_ped
	// echo "El valor de id ped es: ".$id_ped;

	//buscamos los valores necesarios de id_menu para tenerlos y hacer el insert into en la tabla detalle pedidos
	$select_id_menu = new Selector("menus", "WHERE id_menu = '$id_menu'");
	$ej_menu = $select_id_menu->h_query();
	foreach ($ej_menu as $dato_menu) 
	{
		$nom_menu = $dato_menu["nom_menu"];
		$precio_menu = $dato_menu["precio_menu"];	
		$id_iva = $dato_menu["id_iva"];	
		// $dto_det_ped = Cuando lo necesite	
	}

	//buscamos los campos e incluimos los valores para hacer luego el insert into de detalle_pedidos
		$campos_det_pedidos = new Selector("detalle_pedidos", "");
		$campos_string_det_ped = $campos_det_pedidos->h_campos();
		$cantidad = 1;
		$dto_det_ped = 0;
		$valores_det_ped = "'$id_ped', '$id_menu', '$precio_menu', '$cantidad', '$id_iva', '$dto_det_ped'";


		$insert_det_ped = new Insertor("detalle_pedidos", $campos_string_det_ped, $valores_det_ped);
		$ej_det_insert= $insert_det_ped->h_insert();
		$id_det_ped = $insert_det_ped->last_id();	
		if($ej_det_insert)
		{
			echo "caro";
		}


}


?>
