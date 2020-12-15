<?php
//php que realiza la RESTA de items en el carrito de compra
include("clases.php");
if(isset($_POST["dato"]))
{
	$id_menu = $_POST["dato"]; //aqui recibimos el id_menu del click para añadirlo/eliminarlo del pedido
	$id_ped = $_POST["dato2"]; //Aqui recibimos el valor de id_ped
	// echo "El valor de id ped es: ".$id_ped;

	//tenemos que eliminar el ultimo registro de la tabla detalle pedidos, donde exista el id_menu
	// pero primero tenemos que preguntar si hay id_menu en la tabla

	$selecton = new Selector("detalle_pedidos", "WHERE id_ped = '$id_ped' AND id_menu = '$id_menu' order by id_det_ped DESC LIMIT 1");
	$ej = $selecton->h_fetch();
	if($ej)//quiere decir que llego un fetch 
	{
		foreach ($selecton->h_query() AS $row) 
		{
			$id_det_ped = $row["id_det_ped"];
			// echo $id_det_ped."este es el ultimo<br>";
			//ahora borramos
			$deleton = new Deletor("detalle_pedidos", "WHERE id_det_ped = '$id_det_ped'");
			$deleton->h_delete();
			echo "caro";
		}
	}
	else
	{
		echo "No hay nada que borrar";
	}
}


?>