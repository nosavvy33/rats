<?php
require_once "./common/Conexion.php";

$con = Conexion::getConexion();
	$nickname = $_GET["nickname"];
        $query = $con->prepare("select id,location_id,nickname,element from points where nickname = ?");
       	$query->execute([$nickname]);
       	$rs = $query->fetch(PDO::FETCH_ASSOC);    	
       	$location = $rs["location_id"];
       	$idpunto = $rs["id"];

       	$query2 = $con->prepare("select client_id, name, address1, description from locations where id = ?");
       	$query2->execute([$location]);
       	$rs2 = $query2->fetch(PDO::FETCH_ASSOC); 
       	$client = $rs2["client_id"];

       	$query3 = $con->prepare("select id, name from clients where id = ?");
       	$query3->execute([$client]);
       	$rs3 = $query3->fetch(PDO::FETCH_ASSOC);

       	$query4 = $con->prepare("select points.nickname,points.element , locations.address1, locations.description, clients.name from points,locations, clients where points.nickname = ? and locations.id=? and clients.id = ?"); 
       	$query4->execute([$nickname,$location,$client]);
       	$rs4 = $query4->fetch(PDO::FETCH_ASSOC);
       	/*array_push($rs4, $idpunto);
       	array_push($rs4, $client);*/
       	$ar = array("idpunto"=>$idpunto,"idcliente"=>$client,"iduser"=>5);
       	$rs4 = $rs4+$ar;
       	echo json_encode($rs4,JSON_FORCE_OBJECT);
       	/*
{"nickname":"R0001","element":"Cebadero","address1":"av venezuela cuadra n","description":"la de molitalia","name":"Molitalia","idpunto":"1008","idcliente":"2","iduser":5}
       	*/

?>