<?php
include("clases.php");
session_start();
$id_mesa = $_SESSION["id_mesa"];

if(isset($_POST["dato"]))
{
	// echo "Hola mundo";
    $mesa_ocu = new Updator("mesas", "ocupada = 1","WHERE id_mesa = '$id_mesa'");
    $ej = $mesa_ocu->h_updator();
    if($ej)
    {
    	echo "check";
    }
}
?>