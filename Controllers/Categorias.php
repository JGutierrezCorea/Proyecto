<?php
class Categorias extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    //Llamada a las vistas.
    public function agregar_categoria()
    {
        $data['title'] = 'CPanel - Agregar Producto';
        $this->views->getView('admin', "categorias_agregar", $data);
    }

    public function ver_categorias()
    {
        $data['title'] = 'CPanel - Ver Productos';
        $data['tabla'] = $this->model->ver_categorias();
        $this->views->getView('admin', "categorias_ver", $data);
    }
    //----------------------------------------------

    public function cargar_table_categorias()
    {
        $data = $this->model->ver_categorias();
        $id = 0;
        $estado = 0;
        for ($i = 0; $i < count($data); $i++) {
            $id = $data[$i]['IdCateg'];
            $estado = $data[$i]['estado'];
            $data[$i]['IdCateg'] = $i + 1; // muestra enumeracion de categorias.
            $data[$i]['imagen'] = '<center><img class="elevation-2" src="' . BASE_URL . $data[$i]['imagen'] . '" alt="User Avatar" width="100" heigh="100"></center>';
            if ($data[$i]['estado'] == 0) {
                $data[$i]['estado'] = '<span class="float-left badge bg-success">Activo</span>';
                $est = 1;
            } else {
                $est = 0;
                $data[$i]['estado'] = '<span class="float-left badge bg-danger">Inactivo</span>';
            }
            $data[$i]['acciones'] = '<div>  
                <a name="" id="" class="btn btn-primary btn-sm" href="#" role="button" onclick="actualizar_estado(' . $id . ',' . $estado . ');" title="Actualizar Estado">
                <i class="fas fa-toggle-on"></i> Estado
                </a>
                <a name="" id="" class="btn btn-warning btn-sm" href="#" role="button" onclick="verModalEditarCateg(' . $id . ');" title="Editar Datos">
                <i class="far fa-edit"></i> Editar
                </a>
                <a name="" id="" class="btn btn-danger btn-sm" href="#" role="button" onclick="Eliminar(' . $id . ');" title="Eliminar Registro">
                <i class="far fa-trash-alt"></i> Eliminar
                </a>
                </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function RegistrarCategoria()
    {
        if (isset($_POST['nombre'])) {
            if (isset($_FILES['imgCateg'])) {
                $archivo = $_FILES['imgCateg']['name'];
                $tipo = $_FILES['imgCateg']['type'];
                $ruta_temp = $_FILES['imgCateg']['tmp_name'];
                $tam = $_FILES['imgCateg']['size'];

                $id_num = $this->model->ID_CATEG_IMG();
                if ($this->model->subir_imagen($id_num, $archivo, $tipo, $tam, $ruta_temp)) {
                    $nombre = $_POST['nombre'];
                    $data = $this->model->RegistrarCategoria($nombre, $tipo);
                    if ($data > 0) {
                        $resp = "CORRECTO";
                    } else {
                        $resp = "ERROR CATEGORIA";
                    }
                } else {
                    $resp = "ERROR SUBIR ARCHIVO";
                }
            } else {
                $resp = "ERROR - NO HAY IMAGEN";
            }
            echo json_encode($resp);
        }
        die();
    }

    public function ActualizarCategoria($idCat)
    {
        $strImg = "";
        if (empty($_POST['nombre'])) {
            $resp = "ERROR";
        } else {
            $nombre = $_POST['nombre'];

            if (isset($_FILES['imgCateg']) || empty($_FILES['imgCateg'])) {
                $archivo = $_FILES['imgCateg']['name'];
                $tipo = $_FILES['imgCateg']['type'];
                $ruta_temp = $_FILES['imgCateg']['tmp_name'];
                $tam = $_FILES['imgCateg']['size'];

                $dataIMG = $this->model->info_categoria($idCat);
                //Elimiando imagen anterior
                if (is_writable($dataIMG['imagen'])) {
                    $outPut = unlink($dataIMG['imagen']);
                }
                //------------------------------
                if ($this->model->subir_imagen($idCat, $archivo, $tipo, $tam, $ruta_temp)) {
                    $resp = "IMG-CORRECTO";
                    if (strpos($tipo, "jpeg")) {
                        $strTipo = "jpeg";
                    } else if (strpos($tipo, "jpg")) {
                        $strTipo = "jpg";
                    } elseif (strpos($tipo, "png")) {
                        $strTipo = "png";
                    }
                    $strImg = "Imagen/Categorias/" . $idCat . '.' . $strTipo;
                } else {
                    $resp = "ERROR IMG";
                }
            } else {
                $strImg = ""; //no actualiza imagen
            }
            $data = $this->model->ActualizarCategoria($idCat, $strImg, $nombre);
            if ($data > 0) {
                $resp = "CORRECTO";
            } else {
                $resp = "ERROR REGISTRO";
            }
        }
        echo json_encode($resp);
        die();
    }

    public function estado_activar($id)
    {
        $data = $this->model->estado_categoria($id, 0);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function estado_desactivar($id)
    {
        $data = $this->model->estado_categoria($id, 1);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function info_categoria($id)
    {
        $data = $this->model->info_categoria($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($id)
    {
        $data = $this->model->eliminar_categoria($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

}
?>