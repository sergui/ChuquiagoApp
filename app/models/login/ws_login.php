<?php
    require_once ("../../config/db.php");
	require_once ("../../config/conexion.php");    
    
    $json=array();
    
    if(isset($_GET["user"])&&isset($_GET["password"])){
        $user     = $_GET["user"];
        $password = $_GET["password"];
        $sql = "SELECT u.id_usuario,u.nombre_usuario, u.password,r.id_rol, r.nombre as nombre_rol, d.nombre,d.id_docente, d.paterno,d.materno,d.celular
                FROM usuario u, roles r, docente d
                WHERE nombre_usuario = '{$user}' AND u.estado=1  AND u.id_rol= r.id_rol and d.id_user= u.id_usuario";
        $result_of_login_check = $con->query($sql);

        if ($result_of_login_check->num_rows == 1) {
              $result_row = $result_of_login_check->fetch_object();
                 if (password_verify($_GET['password'], $result_row->password)) {
                	$usuario['id_user'] = $result_row->id_usuario;
                    $usuario['user_name'] = $result_row->nombre_usuario;
                    $usuario['nombre'] = $result_row->nombre;
                    $usuario['id_rol'] = $result_row->id_rol;
                    $usuario['rol'] = $result_row->nombre_rol;
                    $usuario['ap_paterno'] = $result_row->paterno;
                    $usuario['ap_materno'] = $result_row->materno;
                    $usuario['id_docente'] = $result_row->id_docente;
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