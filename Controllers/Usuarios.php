<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function admin()
    {
        $data['title'] = 'CPanel - Administrador';
        $data['cant_p'] = $this->model->cant_Productos();
        $data['cant_c'] = $this->model->cant_Categorias();
        $this->views->getView('admin', "index", $data);
    }

    public function validar_usuario()
    {
        //$datos = file_get_contents('php://input');
        //$json = json_decode($datos, true);
        if (empty($_POST['correo']) || empty($_POST['clave'])) {
            $msg = 'Los Campos estan vacios.';
        } else {
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $res = $this->model->getUsuario($correo, $clave);
            if ($res) {
                $_SESSION['id'] = $res['IdPersona'];
                $_SESSION['nombres'] = $res['nombres'];
                $_SESSION['apellidos'] = $res['apellidos'];
                $_SESSION['correo'] = $res['correo'];
                $_SESSION['telefono'] = $res['telefono'];
                $_SESSION['rol'] = $res['rol'];
                $_SESSION['estado'] = $res['estado'];
                $msg = $res['rol'];
            } else {
                $msg = 'Usuario y/o Contraseña Incorrecto.';
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function CerrarSesion(){
        session_destroy();
        echo json_encode("Ok", JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>