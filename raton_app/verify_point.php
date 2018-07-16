<?php
require_once "./common/Conexion.php";

$con = Conexion::getConexion();
		$nickname = $_GET["nickname"];
        $query = $con->prepare("select id,nickname from points where nickname = ?");
       	$query->execute([$nickname]);
       	$rs = $query->fetch(PDO::FETCH_ASSOC);
       	if($rs == false){
       		$dato = array("msg"=>"FALSE");
       		echo json_encode($dato,JSON_FORCE_OBJECT);
	       	}else{
	       	$dato = array("msg"=>"TRUE");
	       	$dato = $dato + $rs;
       		echo json_encode($dato,JSON_FORCE_OBJECT);
       	}
?>