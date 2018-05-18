<?php
	require_once ("../../config/db.php");
    require_once ("../../config/conexion.php");
    

    if(isset($_GET["id_user"])){
        $id_user = $_GET["id_user"];
        $sql="SELECT c.id_curso, c.grado, c.paralelo, a.nombre_asignatura,a.id_asignatura FROM  docente as d RIGHT JOIN tiene as t on d.id_docente = t.id_docente RIGHT JOIN curso as c on c.id_curso = t.id_curso RIGHT JOIN asignatura as a on a.id_asignatura = t.id_asignatura WHERE d.id_user = {$id_user}";
        //echo $sql;
        if($result = $con->query($sql)){
            if($result->num_rows > 0){
                //$jsondata['estado']="correcto";
                while ($row = $result->fetch_array() ) {
                    $json['curso'][]=$row;                   
                }
            }else{
                $curso['estado']="";//No existe registros en la consulta
                $json['curso'][]=$curso;
            }
        }else{
            $curso['estado']="";
            $json['curso'][]=$curso;
        }
        echo json_encode($json);
    }else{
        $curso['estado']="1";//Error de usuario no encuentra
        $json['curso'][]=$curso;
        echo json_encode($json);
    }    
    $con->close();
?>