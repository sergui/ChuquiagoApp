<?php
    require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");    
    
    $json=array();
    
    if(isset($_GET["user"])&&isset($_GET["password"])){
        $user     = $_GET["user"];
        $password = $_GET["password"];
        $sql = "SELECT u.id_usuario,u.nombre_usuario, u.password,u.id_rol,  r.nombre as nombre_rol, t.id_tutor, e.id_rude, d.id_docente, t.nombres as tnom ,t.paterno as tpat,t.materno as tmat, e.nombre as enom,e.paterno as epat,e.materno as emat, d.nombre as dnom,d.paterno as dpat,d.materno as dmat
                FROM usuario u
                LEFT JOIN tutor t on t.id_user = u.id_usuario
                LEFT JOIN estudiante e on e.id_user = u.id_usuario
                LEFT JOIN docente d on d.id_user = u.id_usuario
                LEFT JOIN roles r on r.id_rol = u.id_rol
                WHERE u.nombre_usuario = '{$user}' AND u.estado=1";
        $result_of_login_check = $con->query($sql);

        if ($result_of_login_check->num_rows == 1) {
              $result_row = $result_of_login_check->fetch_object();
                 if (password_verify($_GET['password'], $result_row->password)) {
                	$usuario['id_user'] = $result_row->id_usuario;
                    $usuario['user_name'] = $result_row->nombre_usuario;
                    $usuario['id_rol'] = $result_row->id_rol;
                    $usuario['rol'] = $result_row->nombre_rol;
                    //para Docente
                    if(!is_null($result_row->id_docente)){
                        $usuario['id_objeto'] = $result_row->id_docente;
                        $usuario['nombre'] = $result_row->dnom;
                        $usuario['ap_paterno'] = $result_row->dpat;
                        $usuario['ap_materno'] = $result_row->dmat;    
                    }
                    //para Tutor
                    if(!is_null($result_row->id_tutor)){
                        $usuario['id_objeto'] = $result_row->id_tutor;
                        $usuario['nombre'] = $result_row->tnom;
                        $usuario['ap_paterno'] = $result_row->tpat;
                        $usuario['ap_materno'] = $result_row->tmat;      
                    }
                    //para Estudiante
                    if(!is_null($result_row->id_rude)){
                        $usuario['id_objeto'] = $result_row->id_rude;
                        $usuario['nombre'] = $result_row->enom;
                        $usuario['ap_paterno'] = $result_row->epat;
                        $usuario['ap_materno'] = $result_row->emat;     
                    }                   
                    $json['usuario'][]=$usuario;
                  } else {
                    //$this->errors[] = "Usuario y/o contraseña no coinciden.";
                    $resultar["error"]='ok';
			        $json['usuario'][]=$resultar;
                }
                echo json_encode($json);
        } else {
            //$this->errors[] = "Usuario y/o contraseña no coinciden.";
            $resultar["success"]=0;
		    $resultar["message"]='Ws no Retorna';
		    $json['usuario'][]=$resultar;
		    echo json_encode($json);
        }
          
    }else{
        echo "Hola Luchito :";
    }

        
?>