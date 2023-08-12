<?php
    class OrdenModel{
        private $PDO;

        public function __construct()
        {
            require_once("C:/xampp/htdocs/elbohemioweb/config.php/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function addProductCar($idP, $cant, $idCliente){
            $stament = $this->PDO->prepare("INSERT INTO carrito VALUES(0, :idP, :cant, now(), :idCliente, 1)");
            
            $stament->bindParam(":idP", $idP);
            $stament->bindParam(":cant", $cant);
            $stament->bindParam(":idCliente", $idCliente);

            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM username where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }

        public function showP(){
            $stament = $this->PDO->prepare("SELECT * FROM productos");
           // $stament->bindParam(":id",$id);
            //return ($stament->execute()) ? $stament->fetch() : false ;

            return ($stament->execute()) ? $stament->fetchAll() : false ;

        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM username");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }



        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM carrito WHERE idCarrito = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }





        public function showProductCarUsersession($userSession){
            $stament = $this->PDO->prepare("SELECT productos.idProductos, productos.nombre, productos.precio, productos.imagen, carrito.estatus, carrito.cantidad, carrito.idCarrito, carrito.idCliente
                                            FROM productos INNER JOIN carrito
                                            ON productos.idProductos = carrito.idProducto where carrito.idCliente = :id and carrito.estatus = 1 ");
            $stament->bindParam(":id", $userSession);
             //return ($stament->execute()) ? $stament->fetch() : false ;
 
             return ($stament->execute()) ? $stament->fetchAll() : false ;
        }


        public function ordenar($nombreCliente, $codigo, $direccion, $idPro, $telefono, $cant,$idCliente, $tipo, $idCar){

            
           /* $stament = $this->PDO->prepare("INSERT usuario
                                    VALUES(0, 3, :nombreU, 'desconocido',:telefono, :direccion, 'unknow','unknow',2)");

            $stament->bindParam(":nombreU", $nombreCliente);
            $stament->bindParam(":telefono", $telefono);
            $stament->bindParam(":direccion", $direccion);*/

            //return ($stament->execute()) ? true : false;
            
           // if($stament->execute()){*/

                $stament = $this->PDO->prepare("INSERT INTO pedido VALUES(0, :codigo, NOW(), 1, :tipo, :idCarrito)");

                    $stament->bindParam(":codigo", $codigo);
                    $stament->bindParam(":idCarrito", $idCar);
                    $stament->bindParam(":tipo", $tipo);
                    
                    //return ($stament->execute()) ? true : false;

                    if($stament->execute()){

                        $stament = $this->PDO->prepare("UPDATE carrito set estatus = 0 WHERE idCarrito = :idCar");
        
                        $stament->bindParam(":idCar", $idCar);
        
                        return ($stament->execute()) ? true : false;
                    }
            }


          /*  $stament = $this->PDO->prepare("INSERT INTO pedido 
                                    VALUES(0, :nombreU, :codigo, :direccion, 
                                        :idPro, :telefono, :cantidad, NOW(),1, :idCliente, :tipo)");
            
            $stament->bindParam(":nombreU", $nombreCliente);
            $stament->bindParam(":telefono", $telefono);
            $stament->bindParam(":direccion", $direccion);
            $stament->bindParam(":idPro", $idPro);
            $stament->bindParam(":cantidad", $cant);
            $stament->bindParam(":codigo", $codigo);
            $stament->bindParam(":idCliente", $idCliente);
            $stament->bindParam(":tipo", $tipo);


            if($stament->execute()){

                $stament = $this->PDO->prepare("UPDATE carrito set estatus = 0 WHERE idCarrito = :idCar");

                $stament->bindParam(":idCar", $idCar);

                return ($stament->execute()) ? true : false;
            }*/

        //}


        public function insertCliente($nombreCliente, $apellido, $telefono, $direccion, $usuario, $pass, $tipoU){

            $stament = $this->PDO->prepare("INSERT INTO usuario VALUES(0, 3, :nombre, :apellido, :telefono, :direccion, :usuario, :pass, 1)");
            
            $stament->bindParam(":nombre",$nombreCliente);
            $stament->bindParam(":apellido",$apellido);
            $stament->bindParam(":telefono",$telefono);
            $stament->bindParam(":direccion",$direccion);
            $stament->bindParam(":usuario",$usuario);
            $stament->bindParam(":pass",$pass);

            if($stament->execute()){
                $stament = $this->PDO->prepare("SELECT MAX(usuario.idUsuario) from usuario");

                return ($stament->execute()) ? $stament->fetch() : false ;

            }

        }


        public function updateClientId($idCliente, $ordenCod){
            $stament = $this->PDO->prepare("UPDATE carrito SET idCliente = :idC WHERE idCliente =  :codeOr");
            
            $stament->bindParam(":idC",$idCliente);
            $stament->bindParam(":codeOr", $ordenCod);


            return ($stament->execute()) ? true : false;

        }


    }

?>