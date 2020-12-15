<?php
session_start();
if(isset($_SESSION["id_mesa"]))
{
     //include("clases.php");  
    $id_mesa = $_SESSION["id_mesa"];
    echo "Si hay session, el id_mesa es: ".$id_mesa;
    //Aqui ocupamos la mesa en la tabla
    // $mesa_ocu = new Updator("mesas", "ocupada = 1","WHERE id_mesa = '$id_mesa'");
    // $mesa_ocu->h_updator();

}
else
{
    echo "<p>Tienes que elegir una mesa, no hay session</p>";
    header("location:index_mesa.php");
}

?>
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
                    <nav id="navbar_hor" class="navbar navbar-expand-lg navbar-light bg-light">
                    <?php
                    	include("vista.nav_horizontal.php");
                    ?>
                    </nav>
                    <div class="container-fluid">
                        <h2>Elige tu Menú</h2>
                    </div>

                    <div class="line"></div>
                <!-- <div class="container"> -->
                    <div class="row">
                        <!-- aqui tenemos los menus -->
                        <div id="productos" class="col-8">
                        	Elige tu menú en la parte izquierda
                        </div>

                        <!-- aqui tenemos los pedidos -->
                        <div id="pedidos" class="col-3" style="display: none">
                            <h5>Pedidos</h5>
                        </div>
                    </div>
                <!-- </div> -->

                  <div class="line"></div>
                </div>
    </div>

    <div id="data">
        
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
