<?php

class Tables_show
{
	function __construct()
	{
		$this->con = new mysqli("localhost", "root", "", "tumenu_KOT");
		$this->con->query("SET NAMES'utf8'");		
	}

	function h_tables()
	{
		$sql = "SHOW TABLES";
		return $this->con->query($sql);
	}
}

class Selector
{
	private $tabla, $condicion;

	function __construct($t, $cond)
	{
		$this->tabla = $t;
		$this->condicion = $cond;
		$this->con = new mysqli("localhost", "root", "", "tumenu_KOT");
		$this->con->query("SET NAMES'utf8'");
	}

	function h_query()
	{
		$sql = "SELECT * FROM $this->tabla $this->condicion";
		// var_dump($sql);
		return $this->con->query($sql);
	}

	function h_query_libre()
	{
		$sql = "$this->condicion";
		// var_dump($sql);
		return $this->con->query($sql);
	}

	function h_query_campos($campos)
	{
		$sql = "SELECT $campos FROM $this->tabla $this->condicion";
		return $this->con->query($sql);		
	}

	function h_fetch()
	{
		$sql = "SELECT * FROM $this->tabla $this->condicion";
		$ej = $this->con->query($sql);
		// var_dump($ej);
		return $ej->fetch_array();
	}

	function numero_rows()
	{
		$sql = "SELECT * FROM $this->tabla $this->condicion";
		// $ej = $this->con->mysqli_query($sql);	
		// return mysqli_num_rows($ej);
		return $this->con->query($sql);
	}

	function h_campos()
	{
		$sql = "SHOW COLUMNS FROM $this->tabla";
		$ej = $this->con->query($sql);
		$campos_array = "";
		foreach ($ej as $row) 
		{
			$campos_array.= $row['Field'].",";	
		}
		$campos_1 = substr($campos_array, 0,-1);
		// var_dump($campos_1);
		return $campos_1;
	}

	function h_campos_array()
	{
		$sql = "SHOW COLUMNS FROM $this->tabla";
		$ej = $this->con->query($sql);
		$campos_array = array();
		foreach ($ej as $row) 
		{
			array_push($campos_array,$row['Field']);	
		}
		return $campos_array;

	}

	//busca el tipo de dato en cada celda de la tabla
	function h_datatype()
	{
		$sql = "DESCRIBE $this->tabla";
		$ej = $this->con->query($sql);
		$datatype = [];
		foreach ($ej as $row) 
		{
			array_push($datatype,$row['Type']);	
		}
		return $datatype;		
	}

}

class Insertor
{
private $tabla, $campos, $valores;

	function __construct($t, $camp, $val)
	{
		$this->tabla = $t;
		$this->campos = $camp;
		$this->valores = $val;
		$this->con = new mysqli("localhost", "root", "", "tumenu_KOT");
	}

//INSERT INTO this->tabla (nom_non, ) VALUES(NULL, 'dato1', 'dato2', dato3);

// INSERT INTO table_name (column1, column2, column3, ...)
// VALUES (value1, value2, value3, ...);

	function h_insert()
	{
			$sql = "INSERT INTO $this->tabla($this->campos) VALUES(NULL, $this->valores)";
			// var_dump($sql);
			return $this->con->query($sql);
	}

	function last_id()
	{
			return $this->con->insert_id;
	}
}

class Deletor
{
	private $tabla, $condicion;
	function __construct($t, $cond)
	{
		$this->tabla = $t;
		$this->condicion = $cond;
		$this->con = new mysqli("localhost", "root", "", "tumenu_KOT");
	}

	function h_delete()
	{
		$sql = "DELETE FROM $this->tabla $this->condicion";
		// var_dump($sql);
		return $this->con->query($sql);

	}	
// DELETE FROM $this->tabla WHERE id_cod = '$data';
}

class Updator
{
	private $tabla, $stringo, $condicion;	
	function __construct($t, $str, $cond)
	{
		$this->tabla = $t;
		$this->stringo = $str;
		$this->condicion = $cond;
		$this->con = new mysqli("localhost", "root", "", "tumenu_KOT");
	}

	function h_updator()
	{
		$sql = "UPDATE $this->tabla SET $this->stringo $this->condicion";
		// var_dump($sql);
		return $this->con->query($sql);
	}

// UPDATE table_name SET column1=value, column2=value2, WHERE some_column=some_value 

//UPDATE $this->tabla SET campo1 = value1, campo2=value2 WHERE id_cod = '$dato1';

	


}



?>