<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php"); 
    
    $json=array();
    if(isset($_GET["id_curso"])){
        $id_curso = $_GET["id_curso"];
        $sql="SELECT e.nombre, e.paterno, e.materno, e.sexo, e.id_rude, k.id_kardex, e.estado FROM estudiante as e, curso as c, kardex as k  WHERE c.id_curso = k.id_curso AND e.id_rude = k.id_rude AND c.id_curso = {$id_curso} ORDER BY e.paterno ASC";
       
        if($result = $con->query($sql)){
            if($result->num_rows > 0){
                //$jsondata['estado']="correcto";                
                while ($row = $result->fetch_array()) {
                    $json['estudiantes'][]=$row;                                                    
                }
            }else{
                $estudiantes="";//No existe registros en la consulta
                $json['estudiantes'][]=$estudiantes;
                
            }
        }else{
            $estudiantes="";
            $json['estudiantes'][]=$estudiantes;
             
        }
        echo json_encode($json);
    }else{
        $estudiantes['estado']="1";//Error de usuario no encuentra
        $json['estudiantes'][]=$estudiantes;
        echo json_encode($json);
    } 
      
    $con->close();
?>