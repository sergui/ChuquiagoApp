<?php
    class Login{
        private $db_connection = null;
        public $errors = array();
        public $messages = array();

        public function __construct()
        {
            session_start();
            if (isset($_GET["logout"])) {
                $this->salir();
            }
            elseif (isset($_POST["btnlogin"])) {
                $this->VerificarUsuario();
            }
        }

        private function VerificarUsuario()
        {
            if (empty($_POST['usuario'])) {
                $this->errors[] = "Debe escribir un nombre de usuario o email.";
            } elseif (empty($_POST['password'])) {
                $this->errors[] = "Debe escribir una contraseña.";
            }elseif (!empty($_POST['usuario']) && !empty($_POST['password'])) {
                $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                if (!$this->db_connection->set_charset("utf8")) {
                    $this->errors[] = $this->db_connection->error;
                }
                if (!$this->db_connection->connect_errno) {
                    $user_name = $this->db_connection->real_escape_string($_POST['usuario']);
                    #call buscar_usuario
                    $sql = "SELECT id_usuario,nombre, usuario, estado, contrasenia, tipo
                            FROM usuario_login
                            WHERE usuario = '{$user_name}' AND estado=1";
                    $result_of_login_check = $this->db_connection->query($sql);

                    if ($result_of_login_check->num_rows == 1) {
                        $result_row = $result_of_login_check->fetch_object();
                        if (password_verify($_POST['password'], $result_row->contrasenia)) {
    						$_SESSION['id_user'] = $result_row->id_usuario;
                            $_SESSION['user_name'] = $result_row->usuario;
                            $_SESSION['nombre'] = $result_row->nombre;
                            $_SESSION['rol'] = $result_row->tipo;
                            $_SESSION['user_login_status'] = 1;
                        } else {
                            $this->errors[] = "Usuario y/o contraseña no coinciden.";
                        }
                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Problema de conexión de base de datos.".'ppppppp';
                }
            }
        }

        public function salir()
        {
            $_SESSION = array();
            session_destroy();
            $this->messages[] = "Has sido desconectado.";
            header("location: ".ROOT);
        }

        public function estaConectado()
        {
            if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
                return true;
            }
            return false;
        }
    }
?>