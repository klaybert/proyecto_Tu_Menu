<?php
//Este programa logra mostrar los items que hay en cada menu
include("clases.php");
$cat = $_GET["cat"];

$selecton = new Selector("menus", "WHERE id_cat = '$cat'");
$ej = $selecton->h_query();
	// echo '
	// <div class="container">';
echo '<div class="row text-center">';
foreach ($ej as $row) 
{
	// print_r($row["id_menu"]."<br>");
	$id_menu = $row["id_menu"];
	$nom_menu = $row["nom_menu"];
	$des_menu = $row["des_menu"];
	$precio_menu = $row["precio_menu"];
	$ingredientes_menu = $row["ingredientes_menu"];
	$calorias_menu = $row["calorias_menu"];
	$activo_menu = $row["activo_menu"];
	$id_cat = $row["id_cat"];
	$imagen_menu = $row["imagen_menu"];
	$video_menu = $row["video_menu"];
	// echo $imagen_menu;

echo '
	<div class="col-lg-3 col-md-6 mb-4" >
		<div class="card h-800">
			<center>
			<img src="../TuMenu_admin'.$imagen_menu.'" class="card-img-top rounded pt-2" style="max-width: 150px; max-height: 350px;">
			</center>
			<div class="card-body">
				<h5>'.$nom_menu.'</h5>
				<p class="card-text">'.$precio_menu.'€</p>
				<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter'.$id_menu.'">
					más detalles
				</a>
			</div>
			<div class="card-footer">
				<a id="'.$id_menu.'" onclick="add_pedidos(this.id)" href="#" class="btn btn-primary">Pedir</a>
			</div>

		</div>	
	</div>	
';

//########### echo de la ventana modal de cada item ############
echo'
<div class="modal fade" id="exampleModalCenter'.$id_menu.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
      ';  
echo $nom_menu;
echo '
      </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ';

echo '<p>Descrición: '.$des_menu.'</p>';
echo '<p>Ingredientes: '.$ingredientes_menu.'</p>';
echo '<p>Calorías: '.$calorias_menu.'</p>';
echo '<img src="../TuMenu_admin'.$imagen_menu.'" class="card-img-top rounded pt-2" style="max-width: 300px;">';

echo '
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="'.$id_menu.'" onclick="add_pedidos(this.id)" type="button" class="btn btn-primary" data-dismiss="modal">Pedir</button>
      </div>
    </div>
  </div>
</div>
';

}
echo '</div>';

?>

<!-- 
boton ventana modal
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  más detalles
</a> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        // <h5 class="modal-title" id="exampleModalLongTitle">
        <?php 
        // echo $nom_menu;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        	// echo '<p>Descrición: '.$des_menu.'</p>';
        	// echo '<p>Ingredientes: '.$ingredientes_menu.'</p>';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> 
      </div>
    </div>
  </div>
</div> --> 






<!-- <div class="row text-center">
	<div class="col-lg-3 col-md-6 mb-4">
		<div class="card h-100">
			<center>
				
			<img width="20%" height="20%" src="" class="card-img-top" style="max-width: 20px; max-height: 50px;">
			</center>
			<div class="card-body">
				<h4>CardTitle</h4>
				<p class="card-text">loren ipsum</p>
			</div>
			<div class="card-footer">
				<a href="#" class="btn btn-primary">Find Out more</a>
			</div>

		</div>	
	</div>	
</div> -->
<!-- https://startbootstrap.com/previews/heroic-features -->