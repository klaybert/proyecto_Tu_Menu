<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id_mesa = $_SESSION["id_mesa"];
//creamos la sesion de la mesa
echo "La mesa es: ".$id_mesa;

//creamos la sesison de usuario
$_SESSION["user_id"] = $id_mesa; //Le asignamos como GUEST#numero al mismo que la mesa
$user_id = $_SESSION["user_id"];
echo "<p>Bienvenido usuario: ".$user_id."</p>";
// $user_id = $_SESSION["user_id"];
// $_SESSION["id_mesa"] = $id_mesa;

if(isset($_SESSION["id_ped"]))
{
  $id_ped = $_SESSION["id_ped"];

echo'
          
                <div class="container-fluid justify-content-between">';


echo '
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menú</span>
                    </button>


                <button id="actualizar_ped" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCart" onclick="actualizar_pedido('.$id_ped.')">
                    Ver tu Pedido X
                </button>
                </div>
           
';
                    // <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    //     <i class="fas fa-align-justify"></i>
                    // </button>
//<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCart" onclick="actualizar_pedido('.$id_ped.')">
}
else
{
echo'
           
                <div class="container-fluid justify-content-between">';

echo '
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menú</span>
                    </button>




                </div>

';
                    // Esto estaba antes, quitamos el button negro<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    //     <i class="fas fa-align-justify"></i>
                    // </button>
}

?>


<!-- Modal: modalCart -->

<script src="funciones_web.js"></script>
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tu pedido</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <?php
        // session_start();
        $id_ped = $_SESSION["id_ped"];
          include("pedidos_clientes.php");
        ?>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" id="<?php echo $id_ped;?>" onclick="cerrar_pedido(this.id)">Pagar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal: modalCart -->