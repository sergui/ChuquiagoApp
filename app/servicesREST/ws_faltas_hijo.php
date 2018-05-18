<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php"); 
    
    $json=array();
    if(isset($_GET["id_rude"])&& isset($_GET["fecha"])){
        $id_rude = $_GET["id_rude"];
        $fecha = $_GET["fecha"];
        $sql="SELECT k.gestion, f.tipoFalta, f.descripcion, fc.obseracion, fc.fecha, a.nombre_asignatura
        FROM kardex as k  
        RIGHT JOIN faltas_cometidas fc ON fc.id_kardex=k.id_kardex AND DATE(fc.fecha)='{$fecha}'
        RIGHT JOIN faltas f ON f.id_falta = fc.id_falta
        RIGHT JOIN asignatura a ON a.id_asignatura = fc.id_asignatura
        WHERE k.id_rude = {$id_rude}";
        //echo $sql;
        if($result = $con->query($sql)){
            if($result->num_rows > 0){
                //$jsondata['estado']="correcto";                
                while ($row = $result->fetch_array()) {
                    $json['faltashijo'][]=$row;                                                    
                }
            }else{
                $faltashijo="";//No existe registros en la consulta
                $json['faltashijo'][]=$faltashijo;                
                               
            }
        }else{
            $faltashijo="";
            $json['faltashijo'][]=$faltashijo; 
                       
        }
        echo json_encode($json);
    }else{
        $faltashijo['estado']="1";//Error de usuario no encuentra
        $json['faltashijo'][]=$faltashijo;
        echo json_encode($json);
    } 
      
    $con->close();
?>