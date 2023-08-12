<?php
    class UserModel{
        private $PDO;

        public function __construct()
        {
            require_once("C:/xampp/htdocs/elbohemioweb/config.php/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function insertar($nombre, $apellido, $telefono, $direccion, $usuario, $pass, $tipo){
            $stament = $this->PDO->prepare("INSERT INTO usuario VALUES(0, :tipo, :nombre, :apellido, :telefono, :direccion, :usuario, :pass, 1)");
            
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":apellido",$apellido);
            $stament->bindParam(":telefono",$telefono);
            $stament->bindParam(":direccion",$direccion);
            $stament->bindParam(":usuario",$usuario);
            $stament->bindParam(":pass",$pass);
            $stament->bindParam(":tipo",$tipo);

            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM usuario where idUsuario = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }

        public function listUser(){
            $stament = $this->PDO->prepare("SELECT * FROM usuario where tipoUsuario <> 3");
           // $stament->bindParam(":id",$id);
            //return ($stament->execute()) ? $stament->fetch() : false ;

            return ($stament->execute()) ? $stament->fetchAll() : false ;

        }

   

        public function update($id, $nombre, $apellido, $telefono, $direccion, $usuario, $pass, $tipo){
            $stament = $this->PDO->prepare("UPDATE usuario SET nombreUsuario = :nombre, 
                                                    apellidos = :apellido,
                                                    telefono = :telefono,
                                                    direccion = :direccion,
                                                    usuario = :usuario,
                                                    contraseña = :pass,
                                                    tipoUsuario = :tipo
                                                    WHERE idUsuario = :id");
        
            $stament->bindParam(":id", $id);
            $stament->bindParam(":nombre", $nombre);
            $stament->bindParam(":apellido", $apellido);
            $stament->bindParam(":telefono", $telefono);
            $stament->bindParam(":direccion", $direccion);
            $stament->bindParam(":usuario", $usuario);
            $stament->bindParam(":pass", $pass);
            $stament->bindParam(":tipo", $tipo);

            return ($stament->execute());
        }



        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM usuario WHERE idUsuario = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }


        public function login($user, $pass){
            
            $stament = $this->PDO->prepare("SELECT * FROM usuario 
            WHERE usuario = :user AND contraseña = :pass");
            $stament->bindParam(":user",$user);
            $stament->bindParam(":pass",$pass);
            
            return ($stament->execute()) ? $stament->fetchAll() : false ;

        }

    }

?>