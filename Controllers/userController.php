<?php
    $con = new userController();

        if(isset($_GET['peticion'])){

           if($_GET['peticion'] == 'insertar'){
            //funcion para insertar usuario    
                $con->guardar();
           }
           if($_GET['peticion'] == 'listaUser'){
            //funcion para insertar usuario    
                $con->listaUser();
                //echo "Probando";
           }

           if($_GET['peticion'] == 'eliminar'){
            //funcion para eliminar usuario    
                $con->eliminar();
           }
           
           if($_GET['peticion'] == 'actualizar'){
                //funcion para actualizar usuario   
                $con->actualizar();
           }

           if($_GET['peticion'] == 'login'){
                //funcion para logearse 
                $con->login();

            }

            if($_GET['peticion'] == 'cerrarsession'){
                //funcion para logearse 
                $con->salir();
            }

            
            if($_GET['peticion'] == 'crearCuenta'){
                //funcion para logearse 
                $con->crearCuenta();
            }

            if($_GET['peticion'] == 'profile'){
                //funcion para logearse 
                $con->profile();
            }
            
        }

       
        


//echo "conectando al controlador";
    class userController{

      
        private $model;
        public function __construct()
        {
            require_once("C:/xampp/htdocs/elbohemioweb/Models/UserModel.php");
            $this->model = new UserModel();

            session_start();
			ob_start();

            define('RUTA_URL', 'http://localhost/elbohemioweb/');

        }


        public function guardar(){
           
           $nombre = $_POST['nombre'];
           $apellido = $_POST['apellidos'];
           $telefono = $_POST['telefono'];
           $direccion = $_POST['direccion'];
           $usuario = $_POST['usuario'];
           $pass = $_POST['pass'];
           $tipo = $_POST['tipoUsuario'];


            //$id = $this->model->insertar($nombre);
          $res =   $this->model->insertar($nombre, $apellido, $telefono, $direccion, $usuario, $pass, $tipo);

          
          if($res){
            $con = new userController();
            //echo "la consulta se reealizo satisfactoriamente";
            $_SESSION['insertUser'] = "ok";
            $con->listaUser();
          }
            //return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");

           //echo $nombre;
            //header("Location:../index.php");
        }





        public function crearCuenta(){
           
           $nombre = $_POST['nombre'];
           $apellido = $_POST['apellidos'];
           $telefono = $_POST['telefono'];
           $direccion = $_POST['direccion'];
           $usuario = $_POST['usuario'];
           $pass = $_POST['pass'];
           $tipo = 2;

          $res =   $this->model->insertar($nombre, $apellido, $telefono, $direccion, $usuario, $pass, $tipo);

          if($res){
            $con = new userController();
            $_SESSION['register'] = "ok";
        //$con->listaUser();

            echo "El usuario  se ha registrado con exito";
            header("Location:../index.php");
          }
            //return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");

           //echo $nombre;
            //header("Location:../index.php");
        }



        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }

        public function listaUser(){
            //return ($this->model->showP() != false) ? $this->model->showP() : header("Location:index.php");
        
           $res = $this->model->listUser();
            //eturn $res;
            $_SESSION['data'] = $res;
            //echo "Probando Controlador";
           // print_r($res);
           header("Location: ".RUTA_URL."Views/users/viewUser.php");

           //echo "dddd";
        }

        public function actualizar(){


            if(isset($_GET['profile'])){
                $id = $_SESSION['idUser'];
            }else{
                $id = $_POST['idUsuario'];
            }

          
            $nombre = $_POST['nombre'];
           $apellido = $_POST['apellidos'];
           $telefono = $_POST['telefono'];
           $direccion = $_POST['direccion'];
           $usuario = $_POST['usuario'];
           $pass = $_POST['pass'];
           $tipo = $_POST['tipoUsuario'];


            $res = $this->model->update($id, $nombre, $apellido, $telefono, $direccion, $usuario, $pass, $tipo);

            if($res){
                


                if(isset($_GET['profile'])){
                    $con = new userController();
                    $_SESSION['updateUser'] = "ok";
                    $con->profile();

                }else{
                    $con = new userController();
                    $_SESSION['updateUser'] = "ok";
                    $con->listaUser();
                }
            }

           
        }

        public function eliminar(){
            $id = $_GET['idU'];

           $res =  $this->model->delete($id);

           if($res){
                $con = new userController();
                $_SESSION['deleteUser'] = "ok";
                $con->listaUser();
           }
        }

        public function profile(){
            $id = $_SESSION['idUser'];

           $result =  $this->model->show($id);

           if($result){
               // $con = new userController();
                //_SESSION['deleteUser'] = "ok";
                $_SESSION['profile'] = $result;
                //$con->listaUser();

                header("Location: ".RUTA_URL."Views/users/profile.php");
           }
        }

        public function login(){

            $user = $_POST['user'];
            $pass = $_POST['pass'];

           $res =  $this->model->login($user, $pass);
           
           foreach($res as $user){
                $idUser = $user['idUsuario'];
           }

          

            if($res){
                //$con = new userController();
                //$con->listaUser();
                $_SESSION['usersession'] =  $res;
                $_SESSION['idUser'] =  $idUser;
                $_SESSION['login'] = "ok";
                header("Location: ".RUTA_URL."views/admin/admin.php");

            }else{
                $_SESSION['login'] = "no";
                header("Location: ".RUTA_URL."index.php");
            }
        }

        public function salir(){
            session_reset();
            session_destroy();

            header("Location: ".RUTA_URL."index.php");

        }
    }

?>