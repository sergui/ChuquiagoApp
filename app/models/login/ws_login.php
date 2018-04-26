<?php
    require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");    
    
    $json=array();
    
    if(isset($_GET["user"])&&isset($_GET["password"])){
        $user     = $_GET["user"];
        $password = $_GET["password"];
        $sql = "SELECT u.id_usuario,u.nombre_usuario, u.password, r.nombre as nombre_rol, d.nombre,d.id_docente, d.paterno,d.materno,d.celular
                FROM usuario u, roles r, docente d
                WHERE nombre_usuario = '{$user}' AND u.estado=1  AND u.id_rol= r.id_rol and d.id_user= u.id_usuario";
        $result_of_login_check = $con->query($sql);

        if ($result_of_login_check->num_rows == 1) {
              $result_row = $result_of_login_check->fetch_object();
                 if (password_verify($_GET['password'], $result_row->password)) {
                	$json['usuario']['id_user'] = $result_row->id_usuario;
                    $json['usuario']['user_name'] = $result_row->nombre_usuario;
                    $json['usuario']['nombre'] = $result_row->nombre;
                    $json['usuario']['rol'] = $result_row->nombre_rol;
                    $json['usuario']['ap_paterno'] = $result_row->paterno;
                    $json['usuario']['user_login_status'] = 1;
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