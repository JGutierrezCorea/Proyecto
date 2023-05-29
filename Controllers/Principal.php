<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        
    }

    public function servicios()
    {
        $data['title'] = 'Servicios';
        $this->views->getView('principal', "servicios", $data);
    }

    public function nosotros()
    {
        $data['title'] = 'Nosotros';
        $this->views->getView('principal', "nosotros", $data);
    }

    public function tienda($page)
    {
        $pagina = (empty($page))?1:$page;
        $porPagina = 5;
        $desde = ($pagina - 1)*$porPagina;
       
        $data['productos'] = $this->model->getProductos($desde,$porPagina);
        $data['pagina'] = $pagina;

        $total = $this->model->getTotalProductos();

        $data['total'] = ceil($total['total']/$porPagina);

        $data['title'] = 'Tienda';
        $this->views->getView('principal', "tienda", $data);
    }

    //Vista detalle de los productos seleccionados.
    public function detalle($idPoducto)
    {
        $data['producto'] = $this->model->getProducto($idPoducto);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "detalle", $data);
    }

    //Vista de los productos por la categoria seleccionada.
    public function categorias($datos)
    {
        $IdCateg = 1;
        $page = 1;
        $array = explode(',', $datos);
        if (isset($array[0])) {
            if (! empty($array[0])) {
                $IdCateg = $array[0]; 
            }
        }
        if (isset($array[1])) {
            if (! empty($array[1])) {
                $page = $array[1]; 
            }
        }
        
        $pagina = (empty($page))?1:$page;
        $porPagina = 5;
        $desde = ($pagina - 1)*$porPagina;
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($IdCateg);
        $data['productos'] = $this->model->getProductosCat($IdCateg,$desde,$porPagina);
        $data['total'] = ceil($total['total']/$porPagina);
        $data['IdCateg'] = $IdCateg;
        $data['title'] = 'Categoria';
        $this->views->getView('principal', "categorias", $data);
    }

    // OBTENER PRODUCTO A PARTIR DE LA LISTA DE CARRITO
    public function listaCarrito() {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        foreach ($json as $producto) {
            $result = $this->model->getProducto($producto['idProducto']);
            $data['IdProducto'] = $result['IdProducto'];
            $data['nombre'] = $result['nombre'] .' '. $result['marca'] .' '. $result['color'];
            $data['precio'] = $result['precio'];
            $data['cantidad'] = $producto['cantidad'];
            $data['imagen'] = $result['imagen'];
            $subtotal = $result['precio'] * $producto['cantidad'];
            $data['subtotal'] = number_format($subtotal,2);
            array_push($array['productos'],$data);
            $total +=$subtotal;
        }
        $array['total'] = number_format($total,2);
        $array['moneda'] = MONEDA;
        echo json_encode($array,JSON_UNESCAPED_UNICODE);
        die();
        
    }

    public function buscarProducto($valor) {
        $data = $this->model->buscarProducto($valor);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }


}