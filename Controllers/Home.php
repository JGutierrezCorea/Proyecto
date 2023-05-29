<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $data['categorias']=$this->model->getCategorias();
        $data['nuevos_productos']=$this->model->getNuevosProductos();
        $this->views->getView('home', "index", $data);
    }

}