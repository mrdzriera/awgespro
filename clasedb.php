<?php

class clasedb
{
private $db;
  public function conectar()
    {
	  @$this->db = mysql_pconnect("localhost","root","12345mary") or die("No se puede Conectar a MySQL");

	    if ($this->db)
            mysql_select_db("awgespro");
        //return ($db);
    }

    public function cerrar()
    {
        mysql_close($this->db);
    }


    public function consultaS($sql)
    {
        $resultado = mysql_query($sql);
        return $resultado;
    }


    public function cargarIUD($sql)
    {
        $sql = mysql_query($sql);

		if (mysql_affected_rows() == 1)
            return true;
  		else return false;
    }

	
	public function cargarIUDid($sql){
	
	 $sql = mysql_query($sql);

	return mysql_insert_id();
	}

}

?>
