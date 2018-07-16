<?php

require_once "../../common/Conexion.php";

$con = Conexion::getConexion();

        $query = $con->prepare("select count(*) as avance from sample_lines");

       	$query->execute();
       	$rs = $query->fetch(PDO::FETCH_ASSOC);    	
       	echo json_encode($rs,JSON_FORCE_OBJECT);
       
?>
