<?php
    $con = new FoodController();

        if(isset($_GET['peticion'])){

           if($_GET['peticion'] == 'insertar'){
            //funcion para insertar usuario 

                define('RUTA_IMG', '/elbohemioweb/images/');

                $nombreImage= $_FILES['imagen']['name'];
				$tipoImage = $_FILES['imagen']['type'];
				$tam_iamge = $_FILES['imagen']['size'];
                
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'] . RUTA_IMG;
				//MOVEMOS A LA IMAGEN DEL DIRECTORIO TEMPORAL AL directorio escogido
				move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino.$nombreImage );

               $con->guardar();
           }
           if($_GET['peticion'] == 'listaProducto'){
            //funcion para insertar usuario    
                $con->listaProducto();
                //echo "Probando";
           }

           if($_GET['peticion'] == 'eliminar'){
            //funcion para eliminar usuario    
                $con->eliminar();
                //echo "Probando";
           }
           
           if($_GET['peticion'] == 'actualizar'){
            define('RUTA_IMG2', '/elbohemioweb/images/');

            $nombreImage= $_FILES['imagen']['name'];
            $tipoImage = $_FILES['imagen']['type'];
            $tam_iamge = $_FILES['imagen']['size'];
            
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].RUTA_IMG2;
             //MOVEMOS A LA IMAGEN DEL DIRECTORIO TEMPORAL AL directorio escogido
             move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaDestino.$nombreImage );
                //funcion para actualizar usuario   
                $con->actualizar();
           }

           if($_GET['peticion'] == 'login'){
                $con->login();
            }

            if($_GET['peticion'] == 'cerrarsession'){
                $con->salir();
            }

            if($_GET['peticion'] == 'eliminar'){
                $con->eliminar();
            }

            if($_GET['peticion'] == 'mostrar'){
                $con->selectProducto();
            }

            if($_GET['peticion'] == 'addCar'){
                $con->addCar();
            }

            if($_GET['peticion'] == 'showCar'){
                
                $con->showListCar();
            }

            if($_GET['peticion'] == 'ventaProducto'){
                
                $con->productVenta();
            }

            if($_GET['peticion'] == 'vender'){
                
                $con->vender();
            }

            if($_GET['peticion'] == 'venderPedido'){
                
                $con->venderPedido();
            }

            if($_GET['peticion'] == 'ordenar'){
                
                $con->ordenar();
            }

            if($_GET['peticion'] == 'listaPedidos'){
                $con->listPedidos();
            }

            if($_GET['peticion'] == 'opOrden'){
                $con->opcionOrden();
            }

            if($_GET['peticion'] == 'cancelarPedido'){
                $con->cancelPedido();
            }

            if($_GET['peticion'] == 'buscarPedido'){
                $con->buscarPedido();
            }

            if($_GET['peticion'] == 'realizarEntrega'){
                $con->entregaPedido();
                //echo "echo se realizara la entrrega";
            }

            if($_GET['peticion'] == 'ventas'){
                $con->showVentas();
                //echo "echo se realizara la entrrega";
            }

            if($_GET['peticion'] == 'reporte'){
                $con->showReport();
                //echo "echo se realizara la entrrega";
            }

            if($_GET['peticion'] == 'cancelPedido'){
                
                $con->deletePedido($_POST['idPedido']);
            }
            
            if($_GET['peticion'] == 'buscar'){
                
                $con->buscar($_POST['producto']);
            }

            
            if($_GET['peticion'] == 'miCompra'){
                $con->miCompra();
            }

            
        }

        
       
        


//echo "conectando al controlador";
    class FoodController{

      
        private $model;
        public function __construct()
        {
            //require_once("C:/xampp/htdocs/elbohemioweb/Models/FoodModel.php");
            include("../Models/FoodModel.php");
            $this->model = new FoodModel();

            session_start();
			ob_start();

            define('RUTA_URL', 'http://localhost/elbohemioweb/');

        }


        public function guardar(){
           
           $nombre = $_POST['nombre'];
           $descripcion = $_POST['descripcion'];
           $stok = $_POST['cantidad'];
           $precio = $_POST['precio'];
           $img = $_FILES['imagen']['name'];
           $categoria = $_POST['categoria'];


        //$id = $this->model->insertar($nombre);
          $res =   $this->model->insertar($nombre, $descripcion, $stok, $precio, $img ,$categoria);

          
          if($res){
            $_SESSION['insert'] = "ok";
            $con = new FoodController();
            //echo "la consulta se reealizo satisfactoriamente";
            $con->listaProducto();
          }
            //return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");

           //echo $nombre;
            //header("Location:../index.php");
        }



        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }

        public function listaProducto(){
            //return ($this->model->showP() != false) ? $this->model->showP() : header("Location:index.php");
        
            $res = $this->model->listProducto();
            $numVenta = $this->model->selecMaxVenta();
            //eturn $res;
            $_SESSION['productos'] = $res;
            $_SESSION['idVenta'] = $numVenta;  
            
            //print_r($numVenta);
           // print_r($res);

           if(isset($_GET['tipo'])){

                $tipo = $_GET['tipo'];

                if($tipo == 1){
                    header("Location: ".RUTA_URL."Views/comidas/comidas.php");
                }else{
                    header("Location: ".RUTA_URL."Views/bebidas/bebidas.php");
                }
           }




           //echo "dddd";
        }

        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }

        public function actualizar(){

           $id = $_POST['idProducto'];
           $nombre = $_POST['nombre'];
           $desc = $_POST['descripcion'];
           $stok = $_POST['cantidad'];
           $precio = $_POST['precio'];
           $categoria = $_POST['categoria'];
           $nombreImage =  $_FILES['imagen']['name'];

            
            $res = $this->model->update($id, $nombre, $desc,$stok, $precio, $nombreImage,$categoria);

            $_SESSION['message'] = 'editOk';

            if($res){
                $con = new FoodController();
                $_SESSION['update'] = "ok";
                $con->listaProducto();
            }

           
        }

        public function eliminar(){
            $id = $_POST['idPro'];

           $res =  $this->model->delete($id);

           if($res){
                $_SESSION['delete'] = "ok";
                $con = new FoodController();
                $con->listaProducto();
           }
        }

        public function selectProducto(){
            $id = $_GET['idP'];

           $res =  $this->model->producto($id);

            foreach($res as $tipoP){
                $tipo = $tipoP['categoria'];
            }

            $_SESSION['tipoPro'] = $tipo;


           if($res){
               // $con = new FoodController();
                //$con->listaProducto();
                $_SESSION['showProducto'] = $res;
                header("Location: ".RUTA_URL."views/comidas/show.php");
           }

           //echo $res;
        }

        public function login(){

            $user = $_POST['user'];
            $pass = $_POST['pass'];

           $res =  $this->model->login($user, $pass);

            if($res){
                //$con = new userController();
                //$con->listaUser();
                $_SESSION['usersession'] =  $res;
                //header("Location: ".RUTA_URL."views/home.php");

            }else{
                //echo "error de usuario o contraseña";
                header("Location: ".RUTA_URL."index.php");
            }
        }

        public function salir(){
            session_reset();
            session_destroy();

            header("Location: ".RUTA_URL."index.php");

        }

        //fucnion para agregar productos al carrito
        public function addCar(){

            $idProducto = $_GET['idProducto'];
            $cantidad = $_GET['cantidad'];
            $precio = $_GET['precio'];
            $idVenta = $_GET['idVenta'];

            //echo $_GET['tipo'];

            $pagoTotal = $precio * $cantidad;

           $res =  $this->model->addCar($idProducto, $cantidad,  $pagoTotal, $idVenta);
            
           if($res){
                $con = new FoodController();
                $con->listaProducto();

                //echo "Exiit0o";
            }

        }

        public function showListCar(){
            $numVenta = $_GET['numVenta'];
            $productCar = $this->model->showListCar($numVenta);
            //print_r($productCar);
            $_SESSION['carrito'] = $productCar;
            header("Location: ".RUTA_URL."Views/carrito.php");
        }

        public function productVenta(){
            $idProducto = $_GET['idProducto'];
            $cantidad = $_GET['cantidad'];

           $res =  $this->model->productVenta($idProducto, $cantidad);


           //echo "Probando controlador de venta---" .$idProducto. "---".$cantidad;

        }

        public function vender(){
            $idUser= $_GET['idUser'];
            $numVenta= $_GET['numVenta'];
            $pagoTotal = $_GET['pagoTotal'];

            $res =  $this->model->realizarVenta($idUser, $numVenta, $pagoTotal);
        }

        public function venderPedido(){
            $idUser= $_POST['idUser'];
            $idProducto= $_POST['idProducto'];
            $numVenta= $_POST['numVenta'];
            $pagoTotal = $_POST['pagoTotal'];
            $cantidad = $_POST['cantidad'];
            $idPedido = $_POST['idPedido'];

            $res =  $this->model->venderPedido($idUser, $numVenta, $pagoTotal, $idProducto, $cantidad, $idPedido);
        
            
            if($res){
                $con = new FoodController();
                $con->listPedidos();
            }
        
        }


        public function ordenar(){
            $nombreCliente= $_POST['nombreCliente'];
            $telefono= $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $idProducto = $_POST['idProducto'];
            $cantidad = $_POST['cantidad'];
            $codigo = date("dhis".$cantidad.substr($telefono, 2, -1));

            //$codigo = date("d-m-Y h:i:s");
            $res =  $this->model->ordenar($nombreCliente, $telefono, $direccion, $idProducto, $cantidad, $codigo );

            if($res){
                echo "Los datos se han an isertado con exito";
            }

            //echo  $nombreCliente, $telefono, $direccion, $idProducto, $cantidad;
            
            //header("Location: ".RUTA_URL."Views/orden.php");
        }


        public function listPedidos(){
            $res =  $this->model->listPedidos();
            $_SESSION['busquedaPedido'] = "";
            $_SESSION['pedidos'] = $res;
            header("Location: ".RUTA_URL."Views/pedidos.php");
        
        }


        public function opcionOrden(){
            $idP = $_GET['idProductoOrden'];
            $cantidad = $_GET['cantidadOrden'];

            $_SESSION['idProOrden'] =  $idP;
            $_SESSION['cantOrden'] =  $cantidad;

            header("Location: ".RUTA_URL."Views/orden.php");
        }

        public function cancelPedido(){
            $idPedido = $_POST['idPedido'];

            $res =  $this->model->cancelPedido($idPedido);

            if($res){

                $_SESSION['deletePedido'] = 'ok';

                $con = new FoodController();
                $con->listPedidos();
                
            }

            //header("Location: ".RUTA_URL."Views/orden.php");
        }

        public function buscarPedido(){
            $idPedido = $_POST['codigoPedido'];
            if($idPedido != ""){

                $res =  $this->model->busquedaPedido($idPedido);

                if($res){
                    $_SESSION['pedidos'] = "";
                    $_SESSION['busquedaPedido'] = $res;
                    header("Location: ".RUTA_URL."Views/pedidos.php");
                }else{
                    $_SESSION['busquedaPedido'] = "";
                    $con = new FoodController();
                    $con->listPedidos();
               } 
            }else{
                $_SESSION['busquedaPedido'] = "";
                $con = new FoodController();
                $con->listPedidos();
            }

           

            //header("Location: ".RUTA_URL."Views/orden.php");
        }

        public function deletePedido($id){
            $res = $this->model->cancelPedido($id);

            if($res){
                $con = new FoodController();
                //echo "la consulta se reealizo satisfactoriamente";
                $con->listPedidos();
            }
        }



        public function sendMessage(){
            
            $token = 'HolaNovato';
            $palabraReto = $_GET['hub_challenge'];
            $tokenVerification = $_GET['hub_verify_token'];

            if($token == $tokenVerification){
                echo $palabraReto;
                exit;
            }


            $respuesta = file_get_contents("php://input");
            $respuesta = json_encode($respuesta, true);
            $mensaje = $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
            $telefonoCliente= $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'];
            $id= $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['id'];
            $timestamp= $respuesta['entry'][0]['changes'][0]['value']['messages'][0]['timestamp'];

            if($mensaje!=null){
                file_put_contents("text.txt", $mensaje);
            }
        }


        public function addProCarrito(){

           $data = [
                'nombre' => 'Camisa a cuadros',
                'precio' => 29.95,
                'sexo' => 'Hombre'
            ];


            $_SESSION['carcompra'] = [];
        }

        public function entregaPedido(){
           $proVenta =  $_SESSION['busquedaPedido'];

           print_r($proVenta);
           $idU = 2;
           $numVenta = 10;

            echo  count($proVenta);

            for ($i=0; $i < count($proVenta); $i++) { 
                $idPro = $proVenta[$i]['idProductos'];
                $precio = $proVenta[$i]['precio'];
                $cantidad = $proVenta[$i]['cantidad'];
                $idPedido = $proVenta[$i]['idPedido'];
                $pagoTotal = $precio * $cantidad;

                $res =  $this->model->ventaPedido($idU, $numVenta,$pagoTotal, $idPro, $idPedido, $cantidad);

            }

            if($res){
                $_SESSION['busquedaPedido'] = "";
                $_SESSION['venta'] = "ok";
                $con = new FoodController();
                $con->listPedidos();
            }
 
         }

         public function showVentas(){
            $res =  $this->model->listVentas();

           // print_r($res);
            if($res){
                $_SESSION['ventas'] = $res;
                header("Location: ".RUTA_URL."Views/ventas.php");
            }else{
                $_SESSION['ventas'] = "";
               header("Location: ".RUTA_URL."Views/ventas.php");
            }

        }


        
        public function showReport(){
            $fechaIni = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];

            if(isset($_POST['search'])){
                $res =  $this->model->showReport($fechaIni, $fechaFin);
                if($res){
                    $_SESSION['ventas'] = $res;

                    header("Location: ".RUTA_URL."Views/ventas.php");
                }else{
                    $_SESSION['ventas'] = "";
                    header("Location: ".RUTA_URL."Views/ventas.php");
                }
                
            }
            else{
                $res =  $this->model->showReport($fechaIni, $fechaFin);

                if($res){
                    $_SESSION['report'] = $res;
                    header("Location: ".RUTA_URL."Views/report.php");
                }
            }

           
        }



        public function buscar($producto){
            $result =  $this->model->searchProduct($producto);

            $_SESSION['productFound'] = $result;
           
            print_r($result);

            $_SESSION['productos'] = $result;
          //  $_SESSION['idVenta'] = $numVenta;  
            
          print_r($result);
            //print_r($numVenta);
           // print_r($res);

           foreach($result as $product){
                $tipo = $product['categoria'];
           }


               // $tipo = $_GET['tipo'];

               if($tipo == 1){
                    header("Location: ".RUTA_URL."Views/comidas/comidas.php");
                }else{
                    header("Location: ".RUTA_URL."Views/bebidas/bebidas.php");
                }

        }


        public function miCompra(){
            $idU = $_SESSION['idUser'];

            $result =  $this->model->misCompras($idU);

            $_SESSION['miCompra'] = $result;
           
            print_r($result);

            header("Location: ".RUTA_URL."Views/users/misCompras.php");


        }


        


    }

?>