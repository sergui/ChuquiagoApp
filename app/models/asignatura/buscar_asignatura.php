<?php 
	require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");
	require_once ("../../config/route.php"); 
	
	$id_asigantura = $_REQUEST['id_asignatura'];
	#call buscar_cliente... si neciesitas q t devuelva no si hay q aunmetar el if n procedimiento m informas
	$sql = $con->query("SELECT * FROM asignatura WHERE id_asignatura='{$id_asignatura}'");
	$contar =$sql->num_rows;
    if($contar == 0){
        $datos['estado']= "No";
    }else{
    	$datos['estado']= "si";
    	foreach ($sql as $row ) {
		    $datos['asignatura'] = $row;		            
		}
	}
	echo json_encode($datos);
?>