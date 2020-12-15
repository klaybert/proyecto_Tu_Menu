<!DOCTYPE html>
<html>

<?php 
    include("vista_head.php");
?>
<body>

    <div class="wrapper">
<?php
	include("vista.sidebar.php");
?>

        <!-- Page Content  -->
        <div id="content">

<?php
	include("vista.nav_horizontal.php");
?>

            <div class="container-fluid">
                
                <h2>Elige tu Menú</h2>
                
            </div>

            <div class="line"></div>
            <div id="productos" class="container-fluid">
            	Elige tu menú en la parte izquierda
            </div>

              <div class="line"></div>
        </div>
    </div>

    <div id="data">
        
    </div>
 

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  más detalles
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Aqui pondriamos la descripcion
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>
    <script src="funciones_web.js">
 
    </script>   

</body>
</html>