<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php"); 
    
    $json=array();
    if(isset($_GET["id_docente"])){
        $id_docente = $_GET["id_docente"];
        
        $sql="SELECT DISTINCT(c.id_curso) AS id_curso
        , CONCAT(c.grado,' ' ,c.paralelo)AS curso
        FROM curso c
        , kardex k
        WHERE c.id_curso=k.id_curso AND k.id_asesor = {$id_docente}
            AND k.gestion=YEAR(NOW())";
        //echo $sql;
        if($result = $con->query($sql)){
            if($result->num_rows > 0){
                //$jsondata['estado']="correcto";                
                while ($row = $result->fetch_array()) {
                    $json['id_docente'][]=$row;                                                    
                }
            }else{
                $id_docente="";//No existe registros en la consulta
                $json['id_docente'][]=$id_docente;                
                               
            }
        }else{
            $id_docente="";
            $json['id_docente'][]=$id_docente; 
                       
        }
        echo json_encode($json);
    }else{
        $id_docente['estado']="1";//Error de usuario no encuentra
        $json['id_docente'][]=$id_docente;
        echo json_encode($json);
    } 
      
    $con->close();
?>