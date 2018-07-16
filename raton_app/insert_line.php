<?php

require_once "./common/Conexion.php";

$con = Conexion::getConexion();

date_default_timezone_set("America/Lima");
$fecha_hora = date("Y-m-d H:i:s");
$idpoint = $_POST["idpoint"];
$iduser = $_POST["iduser"];
$idclient = $_POST["idcliente"];
$status = $_POST["status"];
$state = $_POST["state"];
$recebado = $_POST["recebado"];
$captura = $_POST["captura"];

$query = $con->prepare("insert into samples (client_id,user_id,created_at,updated_at) values (?,?,?,?)");
       	$query->execute([$idclient,$iduser,$fecha_hora,$fecha_hora]);
       	$query2 = $con->prepare("select id from samples where user_id = ? order by id desc limit 1");
       	$query2->execute([$iduser]);
       	$rs = $query2->fetch(PDO::FETCH_ASSOC);
       	$idsample = $rs["id"];
 
       	$query3 = $con->prepare("insert into sample_lines (point_id,sample_id,status,state,created_at,updated_at,recebado,user_id, captura) values (?,?,?,?,?,?,?,?,?)");
       	$query3->execute([$idpoint,$idsample,$status,$state,$fecha_hora,$fecha_hora,$recebado,$iduser,$captura]);

?>
