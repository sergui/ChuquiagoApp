<?php
	require_once ("../config/db.php");
    require_once ("../config/conexion.php"); 
    

    
    $json=array();
    if(isset($_GET["tf"])){

        $tf = $_GET["tf"];
        $sql="SELECT * FROM faltas as f WHERE f.estado = 1 AND tipoFalta='{$tf}'";
       
        if($result = $con->query($sql)){
            if($result->num_rows > 0){
                //$jsondata['estado']="correcto";                
                while ($row = $result->fetch_array()) {
                    $json['faltas'][]=$row;                                                    
                }
            }else{
                $faltas['estado']="0";//No existe registros en la consulta
                $json['faltas'][]=$faltas;
                
            }
        }else{
            $faltas['estado']="Error en la consulta";
            $json['faltas'][]=$faltas;
             
        }
        echo json_encode($json);
    }else{
        $faltas['estado']="1";//Error de usuario no encuentra
        $json['faltas'][]=$faltas;
        echo json_encode($json);
    }
    
    $con->close();
?>