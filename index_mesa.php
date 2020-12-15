<!DOCTYPE html>
<html>
<?php 
    include("vista_head.php");
    include("clases.php");
?>
<body>
	<center>
	<div class="container">
		<br>
		<p class="pt-10">Elige tu mesa</p>
		<form action="index_mesa_accept.php" method="POST">
		<select name="mesa">
			<option>Mesa</option>
<?php
		$mesa = new Selector("mesas", "");
		$ej = $mesa->h_query();
		if($ej)
		{
			foreach ($ej AS $row) 
			{
				$id_mesa = $row["id_mesa"];
				$lugar_mesa = $row["lugar_mesa"];
				$sillas_mesa = $row["sillas_mesa"];
				$ocupada = $row["ocupada"];

				if($ocupada == 1)
				{
					echo '<option value="'.$id_mesa.'">Mesa OCUPADA en '.$lugar_mesa.' con '.$sillas_mesa.' sillas y estatus - '.$ocupada.' </option>';
				}
				else
				{
					echo '<option value="'.$id_mesa.'">Mesa en '.$lugar_mesa.' con '.$sillas_mesa.' sillas y estatus - '.$ocupada.'</option>';

				}

			}
		}
?>			
		</select>
		<input type="submit" name="iboton" value="entrar">
		</form>
	</div>
</center>
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
