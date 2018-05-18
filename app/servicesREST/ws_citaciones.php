<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php"); 
    
    $json=array();
    if(isset($_GET["id_tutor"]) && isset($_GET["fecha"])){
        $id_tutor = $_GET["id_tutor"];
        $fecha = $_GET["fecha"];
        $sql="SELECT CONCAT(es.nombre, es.paterno ,es.materno)as nombre_completo, c.citacion, c.fecha , k.id_curso, TIME(c.fecha) as hora
        FROM encargado e
        RIGHT JOIN estudiante es ON e.id_rude = es.id_rude
        RIGHT JOIN kardex k ON k.id_rude = es.id_rude
        RIGHT JOIN citacion c ON c.id_kardex=k.id_kardex AND DATE(c.fecha)='{$fecha}'        
        WHERE e.id_tutor = {$id_tutor}";
        //echo $sql;
        if($result = $con->query($sql)){
            if($result->num_rows > 0){
                //$jsondata['estado']="correcto";                
                while ($row = $result->fetch_array()) {
                    $json['citacion'][]=$row;                                                    
                }
            }else{
                $citacion['estado']="0";//No existe registros en la consulta
                $json['citacion'][]=$citacion;                
            }
        }else{
            $citacion['estado']="Error en la consulta";
            $json['citacion'][]=$citacion;             
        }
        echo json_encode($json);
    }else{
        $citacion['estado']="1";//Error de usuario no encuentra
        $json['citacion'][]=$citacion;
        echo json_encode($json);
    } 
      
    $con->close();
?>