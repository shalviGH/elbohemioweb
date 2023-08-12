<?php
    class FoodModel{
        private $PDO;

        public function __construct()
        {
            require_once("C:/xampp/htdocs/elbohemioweb/config.php/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function insertar($nombre, $descripcion, $stok, $precio, $img ,$categoria){
            $stament = $this->PDO->prepare("INSERT INTO productos VALUES(0, :nombre, :desc, :stok, :precio, 1, :img, :categoria)");
            
            $stament->bindParam(":nombre", $nombre);
            $stament->bindParam(":desc", $descripcion);
            $stament->bindParam(":stok", $stok);
            $stament->bindParam(":precio", $precio);
            $stament->bindParam(":img", $img);
            $stament->bindParam(":categoria", $categoria);
           

            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM username where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }

        public function listProducto(){
            $stament = $this->PDO->prepare("SELECT * FROM  productos");
           // $stament->bindParam(":id",$id);
            //return ($stament->execute()) ? $stament->fetch() : false ;

            return ($stament->execute()) ? $stament->fetchAll() : false ;

        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM username");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }

        public function update($id, $nombre, $desc,$stok, $precio, $nombreImage,$categoria){
            $stament = $this->PDO->prepare("UPDATE productos SET nombre = :nombre,
                                                    descripcion = :desc, 
                                                    stok = :stock,
                                                    precio = :precio,
                                                    imagen = :img,
                                                    categoria = :categoria
                                                    WHERE idProductos = :id");
        
            $stament->bindParam(":id", $id);
            $stament->bindParam(":nombre", $nombre);
            $stament->bindParam(":stock", $stok);
            $stament->bindParam(":precio", $precio);
            $stament->bindParam(":desc", $desc);
            $stament->bindParam(":img", $nombreImage);
            $stament->bindParam(":categoria", $categoria);
         

            return ($stament->execute());
        }



        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM productos WHERE idProductos = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }

        public function producto($id){
            $stament = $this->PDO->prepare("SELECT * FROM productos WHERE idProductos = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }


        public function login($user, $pass){
            
            $stament = $this->PDO->prepare("SELECT * FROM usuario 
            WHERE usuario = :user AND contraseña = :pass");
            $stament->bindParam(":user",$user);
            $stament->bindParam(":pass",$pass);
            
            return ($stament->execute()) ? $stament->fetchAll() : false ;
        }

        public function addCar($idProducto, $cantidad, $precio, $idVenta){
            
            $stament = $this->PDO->prepare("INSERT INTO carrito VALUES(0, :idPro, :cantidad,:precio, NOW(), :idVenta )");
            $stament->bindParam(":idPro",$idProducto);
            $stament->bindParam(":cantidad",$cantidad);
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":idVenta",$idVenta);

            
            
            return ($stament->execute()) ? true : false;
        }

        public function showListCar($numVenta){
            
            $stament = $this->PDO->prepare("SELECT  productos.idProductos, productos.nombre, productos.precio, carrito.cantidad 
                                            FROM productos INNER JOIN carrito 
                                            ON productos.idProductos = carrito.idProducto 
                                            WHERE idVenta =:numVenta");
                                            
            $stament->bindParam(":numVenta", $numVenta);

            return ($stament->execute()) ? $stament->fetchAll() : false ;
        }

        public function selecMaxVenta(){
            $stament = $this->PDO->prepare("SELECT MAX(ventas.idventas) maxIdVenta FROM ventas");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        
        }


        public function productVenta($idProducto, $cantidad){
            $stament = $this->PDO->prepare("UPDATE productos SET stok =  stok-:cantidad 
                                            WHERE idProductos = :idPro");
            
            $stament->bindParam(":cantidad", $cantidad);
            $stament->bindParam(":idPro", $idProducto);

            return ($stament->execute()) ? true : false;
            
        }

        public function realizarVenta($idUser, $numVenta, $pagoTotal){

            $stament = $this->PDO->prepare("INSERT INTO ventas VALUES(0, :idUser, :numVenta, :pagoTotal, NOW() )");
            
            $stament->bindParam(":idUser", $idUser);
            $stament->bindParam(":numVenta", $numVenta);
            $stament->bindParam(":pagoTotal", $pagoTotal);


            return ($stament->execute()) ? true : false;

        }

        public function venderPedido($idUser, $numVenta, $pagoTotal, $idProducto, $cantidad, $idPedido){

            $stament = $this->PDO->prepare("UPDATE productos 
                                            SET stok = stok - :cantidad 
                                            WHERE productos.idProductos = :idPro");

            $stament->bindParam(":cantidad", $cantidad);
            $stament->bindParam(":idPro", $idProducto);


            $response = $stament->execute();

            if($response){
                
                $stament = $this->PDO->prepare("INSERT INTO ventas VALUES(0, 16, :numVenta, :pagoTotal, NOW() )");
                $stament->bindParam(":idUser", $idUser);
                $stament->bindParam(":numVenta", $numVenta);
                $stament->bindParam(":pagoTotal", $pagoTotal);

                //return ($stament->execute()) ? true : false;


                if($stament->execute()){

                    $stament = $this->PDO->prepare("UPDATE pedido SET estatus = 0 WHERE idPedido = :idPedido ");
                    $stament->bindParam(":idPedido", $idPedido);

                    return ($stament->execute()) ? true : false;

                }
                
            }
           

           

            

        }

        public function ordenar($nombreCliente, $telefono, $direccion, $idProducto, $cantidad, $codigo ){

            $stament = $this->PDO->prepare("INSERT INTO pedido VALUES(0, :nombreU, :codigo, :direccion, :idPro, :telefono, :cantidad, NOW(),1 )");
            
            $stament->bindParam(":nombreU", $nombreCliente);
            $stament->bindParam(":telefono", $telefono);
            $stament->bindParam(":direccion", $direccion);
            $stament->bindParam(":idPro", $idProducto);
            $stament->bindParam(":cantidad", $cantidad);
            $stament->bindParam(":codigo", $codigo);


            return ($stament->execute()) ? true : false;

        }


        public function listPedidos(){
            $stament = $this->PDO->prepare("SELECT productos.idProductos, productos.nombre, productos.precio,
            pedido.idPedido, carrito.cantidad, usuario.nombreUsuario, pedido.estatus, pedido.codigo, pedido.tipo, 
				usuario.telefono
            FROM usuario INNER JOIN carrito
            ON usuario.idUsuario = carrito.idCliente
            INNER JOIN productos
            ON carrito.idProducto = productos.idProductos
            INNER JOIN pedido 
            ON carrito.idCarrito = pedido.idCarrito where pedido.estatus = 1 ");
            
            return ($stament->execute()) ? $stament->fetchAll() : false;
        
        }

        public function busquedaPedido($idPedido){
            $stament = $this->PDO->prepare("SELECT productos.idProductos, productos.nombre, productos.precio,
                    pedido.idPedido, carrito.cantidad, usuario.nombreUsuario, pedido.estatus,pedido.codigo, pedido.tipo, 
                        usuario.telefono
                    FROM usuario INNER JOIN carrito
                    ON usuario.idUsuario = carrito.idCliente
                    INNER JOIN productos
                    ON carrito.idProducto = productos.idProductos
                    INNER JOIN pedido 
                    ON carrito.idCarrito = pedido.idCarrito  where pedido.estatus = 1 AND pedido.codigo= :idPedido ");
            

            $stament->bindParam(":idPedido", $idPedido);
            return ($stament->execute()) ? $stament->fetchAll() : false;


           // echo $idPedido;
        
        }


        
        public function cancelPedido($idPedido){
            $stament = $this->PDO->prepare("DELETE FROM pedido WHERE idPedido = :id");
            $stament->bindParam(":id",$idPedido);
            return ($stament->execute()) ? true : false;
        }

        public function ventaPedido($idU, $numVenta,$pagoTotal, $idPro, $idPedido, $cantidad){

            $stament = $this->PDO->prepare("INSERT INTO ventas VALUES(0, :idPedido, :pago, NOW())");
            
            $stament->bindParam(":idPedido", $idPedido);
            $stament->bindParam(":pago", $pagoTotal);
            //return ($stament->execute()) ? true : false;

           if($stament->execute()){
                $stament = $this->PDO->prepare("UPDATE productos SET stok = stok-:cant WHERE productos.idProductos = :idPro");

                //$stament->bindParam(":idPedido", $idPedido);
                $stament->bindParam(":cant", $cantidad);
                $stament->bindParam(":idPro", $idPro);

                //return ($stament->execute()) ? true : false;

                if($stament->execute()){
                    $stament = $this->PDO->prepare("UPDATE pedido SET   estatus = 0  WHERE pedido.idPedido = :idPedido");

                    $stament->bindParam(":idPedido", $idPedido);

                    return ($stament->execute()) ? true : false;
                   // $stament->bindParam(":cant", $cantidad);
                    //$stament->bindParam(":idPro", $idPro);
                }

            }

        }

        public function listVentas(){
            $dia=date("d");
            $fecha_actual = date("Y-m"); 
           $now = $fecha_actual."-".($dia-1);
           echo $now;
         $stament = $this->PDO->prepare("SELECT  productos.idProductos, productos.nombre, productos.precio,
            pedido.idPedido, carrito.cantidad, usuario.nombreUsuario, pedido.estatus, pedido.tipo, 
            usuario.telefono, ventas.fecha
            FROM usuario INNER JOIN carrito
            ON usuario.idUsuario = carrito.idCliente
            INNER JOIN productos
            ON carrito.idProducto = productos.idProductos
            INNER JOIN pedido 
            ON carrito.idCarrito = pedido.idCarrito
            INNER JOIN ventas
            ON pedido.idPedido = ventas.idPedido ORDER BY ventas.fecha DESC");

           // $stament->bindParam(":fecha", $now);

            return ($stament->execute()) ? $stament->fetchAll() : false ;
        }


        public function showReport($fechaIni, $fechaFin){

            if($fechaIni == "" || $fechaFin == ""){
                $stament = $this->PDO->prepare("SELECT productos.nombre, productos.precio, 
                pedido.cantidad, ventas.fecha, pedido.codigo, 
                usuario.idusuario ,usuario.nombreUsario 
                from ventas inner JOIN productos
                    ON ventas.idProducto =  productos.idProductos
                    INNER JOIN pedido
                    ON productos.idProductos = pedido.idProducto 
                    INNER JOIN usuario
                    GROUP BY pedido.codigo
                    ");

                    return ($stament->execute()) ? $stament->fetchAll() : false ;

            }else{
            
            $stament = $this->PDO->prepare("SELECT  productos.idProductos, productos.nombre, productos.precio,
            pedido.idPedido, carrito.cantidad, usuario.nombreUsuario, pedido.estatus, pedido.tipo, 
            usuario.telefono, ventas.fecha
            FROM usuario INNER JOIN carrito
            ON usuario.idUsuario = carrito.idCliente
            INNER JOIN productos
            ON carrito.idProducto = productos.idProductos
            INNER JOIN pedido 
            ON carrito.idCarrito = pedido.idCarrito
            INNER JOIN ventas
            ON pedido.idPedido = ventas.idPedido where ventas.fecha BETWEEN :fechaIni AND :fechaFin
                
                GROUP BY pedido.idPedido");
                 $stament->bindParam(":fechaIni", $fechaIni);
                 $stament->bindParam(":fechaFin", $fechaFin);
                    return ($stament->execute()) ? $stament->fetchAll() : false ;
            }
        }


        public function deletePedido($id){
            $stament = $this->PDO->prepare("DELETE FROM pedido WHERE idPedido = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }


        public function searchProduct($producto){
            $pro = "%$producto%";

            $stament = $this->PDO->prepare("SELECT * FROM productos where productos.nombre LIKE :producto");
           
            $stament->bindParam(":producto", $pro);

            return ($stament->execute()) ? $stament->fetchAll() : false ;
        }

        public function misCompras($idU){
            $stament = $this->PDO->prepare("SELECT  productos.idProductos, productos.nombre, productos.precio,
            pedido.idPedido, carrito.cantidad, usuario.nombreUsuario, pedido.estatus, pedido.tipo, 
            usuario.telefono, ventas.fecha
            FROM usuario INNER JOIN carrito
            ON usuario.idUsuario = carrito.idCliente
            INNER JOIN productos
            ON carrito.idProducto = productos.idProductos
            INNER JOIN pedido 
            ON carrito.idCarrito = pedido.idCarrito
            INNER JOIN ventas
            ON pedido.idPedido = ventas.idPedido 
            WHERE pedido.estatus = 0 AND usuario.idUsuario = :idU 
               ");
            
            $stament->bindParam(":idU", $idU);
            return ($stament->execute()) ? $stament->fetchAll() : false ;
        }





    }

?>