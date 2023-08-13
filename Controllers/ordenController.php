<?php
    $con = new OrdenController();

        if(isset($_GET['peticion'])){

           if($_GET['peticion'] == 'showCar'){
                $con->showCar();

           }
           if($_GET['peticion'] == 'addCar'){
                $con->guardar();
               // echo "ProbandoControlador";
            }
            if($_GET['peticion'] == 'delete'){
                $con->delete($_GET['id']);
            }

            if($_GET['peticion'] == 'ordenar'){
                
                $con->ordenar();
            }


            
           
        }

       


//echo "conectando al controlador";
    class OrdenController{

      
        private $model;
        private $userModel;
        public function __construct()
        {
           
            //require_once("C:/xampp/htdocs/elbohemioweb/Models/userModel.php");
            include("../Models/userModel.php");
            $this->userModel = new UserModel();

            session_start();
			ob_start();
        
            define('RUTA_URL', 'http://localhost/elbohemioweb/');

        }


        public function guardar(){
           
            $idP= $_POST['idProducto'];
            $cant = $_POST['cantidad'];
            $idCliente= $_POST['idCliente'];

        //$id = $this->model->insertar($nombre);
          $res =   $this->model->addProductCar($idP, $cant, $idCliente);

          
          if($res){
            $con = new OrdenController();
            $con->showProductCar();

            $_SESSION['orden'] = "ok";
          }

        }



        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }

        public function showProductCar(){
            //return ($this->model->showP() != false) ? $this->model->showP() : header("Location:index.php");
            $userSession = $_SESSION['idUser'];

            $proCar = $this->model->showProductCarUsersession($userSession);
        
            $res = $this->model->showP();

            $_SESSION['proCar'] = $proCar;

            $_SESSION['data'] = $res;

            if(isset($_GET['tipo'])){
                header("Location: ".RUTA_URL."Views/bebidas/bebidas.php");

            }else{
                header("Location: ".RUTA_URL."Views/comidas/comidas.php");

            }


           //echo "dddd";
        }


        public function showCar(){
            $userSession = $_SESSION['idUser'];

           $proCar = $this->model->showProductCarUsersession($userSession);
        
            $res = $this->model->showP();

            $_SESSION['proCar'] = $proCar;

            header("Location: ".RUTA_URL."Views/productCar.php");

        }


        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }


        public function delete($id){
            $res = $this->model->delete($id);

            if($res){
                $con = new OrdenController();
                //echo "la consulta se reealizo satisfactoriamente";
                $con->showCar();
            }
        }




        public function ordenar(){

            $idUser = $_SESSION['idUser'];

            $user =  $this->userModel->show($idUser); 


            print_r($user);


            $nombreCliente = $user['nombreUsuario'];
            $direccion = $user['direccion'];
            $telefono = $user['telefono'];


            $tipo= $_POST['tipoPedido'];
            $codigo = date("dhis".substr($telefono, 2, -1));

            $orden = $_SESSION['proCar'];
            $cantPro =  count($_SESSION['proCar']);



            $ordenCod = $orden[0]['idCliente'];
 



           //print_r($orden);echo "<br>";
           for ($i=0; $i < $cantPro; $i++) { 
              $idCar = $orden[$i]['idCarrito']; echo "---";
              $idPro = $orden[$i]['idProductos']; echo "---";
              $cant = $orden[$i]['cantidad'];
              $idClienteC = $orden[$i]['idCliente'];
              $status = $orden[$i]['estatus'];

              echo $status."<br>";

              if($status == 1){
                 $res2 =  $this->model->ordenar($nombreCliente, $codigo, $direccion, $idPro, 
                    $telefono, $cant,$$idUser, $tipo, $idCar);
              }

              //$idCliente = $orden[$i]['idCliente'];
              //print_r($orden[$i]['nombre']);echo "---";
             //print_r($orden[$i]['precio']);echo "---";
              //print_r($orden[$i]['cantidad']);

                //$res2 =  $this->model->ordenar($nombreCliente, $codigo, $direccion, $idPro, 
               //$telefono, $cant,$$idUser, $tipo, $idCar);
               // //return $res;

                //echo $idCar;

              //  echo $idClienteC;
                //echo  "Order  COD --".$ordenCod ;
            }

           if($res2){
                $_SESSION['pedido'] = "ok";

                $con = new OrdenController();
                //echo "la consulta se reealizo satisfactoriamente";
               // $con->sendMessage( $nombreCliente,  $telefono);
                header("Location: ".RUTA_URL."Views/orden.php");
           }
                
               
            

               

        }


        public function sendMessage($nombre, $tel){
            require '../vendor/autoload.php';

            $token = "GA230731145005";
            $client = new GuzzleHttp\Client(['verify' => false ]);
            $payload = array(
                        "op" => "registermessage",
                        "token_qr" => $token,
                        "mensajes" => array(
                            array("numero" => "9621082856", "mensaje" => "El pedido del cliente".$nombre."  con el telefono ". $tel),
                            array("numero" => "9621082856", "mensaje" => "Se acaba de realizar un pedido de.."),
                        )
                        
            );

            $res = $client->request('POST', 'https://script.google.com/macros/s/AKfycbyoBhxuklU5D3LTguTcYAS85klwFINHxxd-FroauC4CmFVvS0ua/exec', [

                'headers' => [

                    'Content-Type'     => 'application/json',

                    'Accept' => 'application/json'

                ], 'json' =>  $payload

            ]);

            echo $res->getStatusCode()."<br>";

            echo $res->getBody();
        }
    }

?>