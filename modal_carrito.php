<!-- Button trigger modal-->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCart">Launch modal</button> -->

<!-- Modal: modalCart -->
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
        session_start();
        $id_ped = $_SESSION["id_ped"];
          include("pedidos_clientes.php");
        ?>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary">Pagar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->