<?php
require_once "../../common/Conexion.php";

$con = Conexion::getConexion();
        try{
 $query = $con->prepare("select sum(if(state='Sin Acceso',1,0)) as TOT_SIN_ACCESO, sum(if(state='Retirado/Cliente',1,0)) as TOT_RETIRADO_CLIENTE, sum(if(state='Operativo',1,0)) as TOT_OPERATIVO, sum(if(state='Perdido',1,0)) as TOT_PERDIDO, sum(if(state='Dañado',1,0)) as TOT_DANADO, sum(if(state='Sustituido',1,0)) as TOT_SUSTITUIDO from sample_lines");

       	$query->execute();

       	$rs = $query->fetch(PDO::FETCH_ASSOC);  
       	echo json_encode($rs);
        }catch(PDOException $e){
        	echo $e->getMessage();
        }
       

?>