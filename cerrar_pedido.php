<?php
//este fichero lo que hará es que el id_ped que tenemos en la variable de session, actualice su campo estado_ped a 1, y cerramos la variable de session. 
include("clases.php");
if(isset($_POST["datoped"]))
{
session_start();
$id_ped = $_SESSION["id_ped"];
$id_mesa = $_SESSION["id_mesa"];

	$id_ped = $_POST["datoped"];
	$selecton_cerrar = new Updator("pedidos", "estado_ped = 1" ,"WHERE id_ped = '$id_ped'");
	$update = $selecton_cerrar->h_updator();
	if($update)
	{
		echo "El pedido ha sido cerrado";
	}

	$selecton_cerrar_mesa = new Updator("mesas", "ocupada = 0","WHERE id_mesa = '$id_mesa'");
	$cerrar_mesa = $selecton_cerrar_mesa->h_updator();
	if($cerrar_mesa)
	{
		echo " / Mesa ".$id_mesa." disponible";
	}

session_destroy();
}
else
{
	$id_ped = 0;
	echo("No tienes pedidos");
}



?>