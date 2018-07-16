<?php
require_once "../../common/Conexion.php";

$con = Conexion::getConexion();
        $query = $con->prepare("select count(*) as SI from sample_lines where captura = 'SI'");
       	$query->execute();
       	$rs = $query->fetch(PDO::FETCH_ASSOC);    

		$query1 = $con->prepare("select count(*) as NO from sample_lines where captura = 'NO'");
       	$query1->execute();
       	$rs1 = $query1->fetch(PDO::FETCH_ASSOC);    

       	$query2 = $con->prepare("select count(*) as TOTAL from sample_lines");
       	$query2->execute();
       	$rs2 = $query2->fetch(PDO::FETCH_ASSOC);   

       	$ar = array($rs,$rs1,$rs2);

       	echo json_encode($ar,JSON_FORCE_OBJECT);
       
?>
