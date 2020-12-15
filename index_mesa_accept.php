<?php
// include("clases.php");
if(isset($_POST["iboton"]))
{
    include("clases.php");  
    $id_mesa = $_POST["mesa"];
    session_start();
    $_SESSION["id_mesa"] = $id_mesa;
    //Aqui ocupamos la mesa en la tabla
    // header("location:index.php");
    // echo '<a href="index.php?mesa='.$id_mesa.'">Index y la mesa es'.$id_mesa.'</a>';
    $mesa_cod = new Selector("mesas", "WHERE id_mesa = '$id_mesa'");
    $codi = $mesa_cod->h_query();
    if($codi)
    {
        foreach ($codi as $row) 
        {
            $palabra = $row["clave"];
            echo "$palabra";
        }
    }

    echo '
    <center>
    <div class="container">
    <h5>Debes introducir tu condimento clave:</h5>
        <form action="index.php" method="POST">
        </form>
            <input type="text" id="condimento" placeholder="Escribe tu condimiento clave" onkeyup="condimento()">
            <input type="hidden" id="clave" value="'.$palabra.'">
    </div>
            <input id="dale" type="submit" name="iboton" disabled onclick="vamos()">
    </center>
    ';

}
else
{
    echo "<p>Tienes que elegir una mesa</p>";
    header("location:index_mesa.php");
    session_destroy();
// echo "Elige tu mesa";
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
    <title></title>
<?php
include("vista_head.php");
?>
</head>
<body>

</body>
</html>
<!--     <input id="dale" type="submit" onclick="condimento()" disabled> -->
<script type="text/javascript">
    function condimento()
    {
        var condi = $("input#condimento").val();
        // alert("condi");

        var clave = $("input#clave").val();        
        // alert(clave);
        if(condi === clave)
        {
            $("input#dale").prop("disabled",false);
        }
        else
        {
            $("input#dale").prop("disabled",true);
            // alert("not equal");
        }
    }

    function vamos()
    {
        // alert("hola estamos en vamos");
        var ocupa = "vamos";
            $.post(
                "ocupa_mesa.php",
                {dato:ocupa},
                function(mensajes)
                {
                    // alert(mensajes);
                    if(mensajes == "check")
                    {
                        alert("Bienvenido");
                        // window.location.href = "index.php";
                        $(location).attr('href', 'index.php');
                    }
                });        
    }


</script>