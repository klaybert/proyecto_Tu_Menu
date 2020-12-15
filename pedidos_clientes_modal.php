<?php

include("clases.php");
	echo'<h5>Tus Pedidos</h5>';

/////////////////////////////////////////////////////////////////////////TIENES QUE COMPROBAR EL ISSET
if(isset($_GET["id_menu"]))
{


	$id_menu = $_GET["id_menu"];
	// echo $id_menu."<br>";


	session_start();
	// $_SESSION["user_id"] = 1;
	$id_rest = 1;//Restaurante  1
	$id_mesa = 1; //mesa
	$user_id = $_SESSION["user_id"];
	// echo $user_id;

	//hacemos un select de todos los datos del id_menu que viene, y solo agarramos lo que nos interesa
	$select_menu = new Selector("menus", "WHERE id_menu = '$id_menu'");
	$ej_menu = $select_menu->h_query();
	// echo'<h5>Tus Pedidos</h5>';
	foreach ($ej_menu as $fila) 
	{
		$nom_menu = $fila["nom_menu"];
		$precio_menu = $fila["precio_menu"];	
		$id_iva = $fila["id_iva"];
		// $dto_det_ped = 
	}

	//luego preguntamos si el cliente, tiene pedidos abiertos, es decir, el campo estado de la tabla debe estar en cero
	$select_pedidos = new Selector("pedidos", "WHERE estado_ped = 0 AND user_id = '$user_id'");
	$ej_select_ped = $select_pedidos->h_fetch();
	if($ej_select_ped)
	{
		foreach ($select_pedidos->h_query() as $row_ped) //aqui tenemos que incluir en la tabla detalle_pedidos
		{
			$id_ped = $row_ped["id_ped"];
			$_SESSION["id_ped"]=$id_ped;
			// echo $id_ped;
		}
		// echo "Si, hay un pedido creado, y su numero es id_ped: ".$id_ped;
	}
	else
	{
		// echo "No, no hay pedido creado, asi que creamos un item en la tabla pedido";
		$campos_pedidos = new Selector("pedidos", "");
		$campos_string_ped = $campos_pedidos->h_campos();
		// echo $campos_string_ped;
		$fecha = date("Y-m-d h:m");
		// echo $fecha;
		$valores_ped = "'$id_rest', '$user_id', '$fecha', '$id_mesa', '0'";

		$insert_ped = new Insertor("pedidos", $campos_string_ped, $valores_ped);
		$ej_insert= $insert_ped->h_insert();
		$id_ped = $insert_ped->last_id();
		if($ej_insert)
		{
			// echo "Datos incluidos en la BBDD";
			echo "Producto agregado a tu pedido";
		}
		else
		{
			// echo "No incuidos en la BBDD tabla pedidos, ERROR";
		}
	}
		//he incluimos los datos en el detalle_pedidos item en la tabla detalle_pedidos
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
			// echo "Datos incluidos en la BBDD detale pedidos";
		}
		else
		{
			// echo "No incuidos en la BBDD tabla detalle pedidos, ERROR";
		}
}//Fin del if isset GET

if(isset($_GET["ped"]))
// if(isset($_SESSION["id_ped"]))
{
	// echo"Entramos en el if";
	// session_start();
	$id_ped = $_SESSION["id_ped"];
	$id_ped = $_GET["ped"];
	// echo "El id_ped recibido por GET es: ".$id_ped;
}//Fin del isset GET ped


//###################################### Aqui solo recargamos el carrito ###############

	//ahora hacemos un select * los datos de detalle pedido de acuerdo a la id_ped creada, y ese es el carrito de compras
	// $carrito = new Selector("detalle_pedidos", "INNER JOIN menus USING(id_menu) WHERE id_ped = '$id_ped' group by id_menu");
	// $detalle_carrito = $carrito->h_query();
	// SELECT id_menu, COUNT(*) AS cantidad FROM `detalle_pedidos` WHERE id_ped = 1 GROUP BY id_menu 
	// SELECT iva_menu, nom_menu, id_menu, COUNT(*) AS cantidad FROM `detalle_pedidos` INNER JOIN menus USING(id_menu) WHERE id_ped = 1 GROUP BY id_menu ;
	// SELECT nom_menu, des_menu, precio_menu, cant_det_ped, COUNT(*) AS cantidad_det_ped, id_menu, COUNT(*) AS cantidad FROM `detalle_pedidos` INNER JOIN `menus` USING(id_menu) WHERE id_ped = 1 GROUP BY id_menu ;
	//probamos otra consulta
	// $sql = "SELECT id_menu, COUNT(*) AS cantidad_ped FROM detalle_pedidos WHERE id_ped = '$id_ped' GROUP BY id_menu";
	$sql = "
	SELECT nom_menu, precio_menu, id_menu, COUNT(*) AS cantidad_ped FROM detalle_pedidos 
	INNER JOIN menus 
	USING(id_menu) 
	WHERE id_ped = '$id_ped' 
	GROUP BY id_menu
	";
	$carrito_count = new Selector("", $sql);
	$detalle_carrito = $carrito_count->h_query_libre();

	if($detalle_carrito->num_rows > 0)
	{
				    	// <th scope="col">id_menu</th>//quitamos el id_menu de la tabla
		echo'
		<div class="container">
		<div>
			<input id="id_ped" type="hidden" value="'.$id_ped.'">
		</div>
			<table class="table">
			  	<thead>
				    <tr>
				    	<th scope="col">item</th>
	      				<th scope="col">Nombre</th>
	      				<th scope="col">Precio</th>
	      				<th scope="col">Cantidad</th>
						<th scope="col">Sub-total</th>
					</tr> 
			 	</thead>
			 	<tbody>   				
		';
		//contador de items
		$l=1;
		//totalizador
		$total = 0;
		foreach ($detalle_carrito as $values) 
		{
			$id_menu = $values["id_menu"];
			// echo $id_menu. "Esto es lo que recibimos de la BBDD detalle_pedidos";
			$nom_menu = $values["nom_menu"];
			$precio_det_ped = $values["precio_menu"];
			// $cantidad = $values["cant_det_ped"];
			// $id_iva = $values["id_iva"];
			// $dto_det_ped = $values["dto_det_ped"];
			$cantidad_ped = $values["cantidad_ped"];
					// <td>'.$id_menu.'</td> //quitamos el id_menu de la tabla
			echo'
				<tr>
					<td>'.$l.'</td>
					<td>'.$nom_menu.'</td>
					<td>'.$precio_det_ped.' €</td>
					<td>
						<center> 
							<input id="'.$id_menu.'" type="button" onclick="restar(this.id)" value = "-" min = 0>
						 		<h6 id="'.$id_menu.'">'.$cantidad_ped.'</h6>
						 	<input id="'.$id_menu.'" type="button" onclick="sumar(this.id)" value = "+">
					 	</center> 
					 </td>
					<td>'.$precio_det_ped * $cantidad_ped.' €</td>
				</tr>
			';

			$total = $precio_det_ped * $cantidad_ped + $total;

			//lista incremental de items agregados al carrito
			$l++;
		}
		echo '	<tr></tr>
				<tr>
					<td colspan="5" class="font-weight-bold">Total de compra:</td>
					<td colspan="1" class="font-weight-bold">'.$total.'€</td>
				<tr>
			  </tbody>
			</table>
			</div>
		';
		/*echo '
			<div class="d-flex justify-content-between">
				<div class="d-inline-flex p-2 bd-highlight">Total de compra:</div>
				<div class="d-inline-flex p-2 bd-highlight font-weight-bold">'.$total.'€</div>
				 
			</div>
		';*/
	}
	else
	{
		echo "<div class = 'container'><br><h6>No tienes pedidos en tu lista</h6></div>";
	}

//programamos un botton, pero se sustituyo por la ventana MODAL
// echo 	'<div class="container">
// 			<div class="row justify-content-between">
// 			<input id="'.$id_ped.'" onclick="cerrar_pedido(this.id)" class="btn btn-primary" type="button" value = "Realizar pedido y pagar">
// 			</div>
// 		</div>';

//luego los cargamos a la tabla pedidos
?>


<script type="text/javascript">

	function cerrar_pedido(id_ped)
	{
		alert("cerraremos el pedido:"+id_ped);

	}



	function restar(id_resta)
	{
		// alert(id_resta);
		var id_ped = $("input#id_ped").val(); //viene de el input hidden 
		// alert("el valor de id_ped es: "+id_ped);
		$.post("carrito_res.php", 
			{dato:id_resta, dato2:id_ped}, 
			function(mensajes)
			{
				// alert("<br>mensajes es igual a uno: "+mensajes);
				if(mensajes == "caro")
				{
					//NO ENTIENDO POR QUE NO ENTRA EN ESTE IF
					recarga_carrito(id_ped);
					alert("Se borro el item de tu pedido");

					// $(".container").load("pedidos_clientes.php");
				}
				else
				{
					alert("no estamos dentro de caro");
					// recarga_carrito(id_ped);
				}
				
				//$("#pedidos").load("pedidos_clientes.php"); ////////////AQUÍ ES CUANDO RECARGAS LA PÁGINA
			});
		// 
	}

	function sumar(id_suma)
	{
		//agarramos el id_ped que viene de el input hidden
		var id_ped = $("input#id_ped").val(); 
		//EL id_suma posee el id_menu en cuestion
		$.post("carrito_sum.php", 
			{dato:id_suma, dato2:id_ped}, 
			function(mensajes)
			{
				// alert("<br>mensajes es igual a uno: "+mensajes);
				if(mensajes == "caro")
				{
					//NO ENTIENDO POR QUE NO ENTRA EN ESTE IF
					recarga_carrito(id_ped);
					alert("Se añadió el item de tu pedido");
				}
				else
				{
					alert("no estamos dentro de caro");
					// recarga_carrito(id_ped);
				}
				
				//$("#pedidos").load("pedidos_clientes.php"); ////////////AQUÍ ES CUANDO RECARGAS LA PÁGINA
			});
		// 
	}



</script>
<script src="funciones_web.js"></script>

