<?php
    class bookModel{
        private $PDO;

        public function __construct()
        {
            require_once("C:/xampp/htdocs/appMvc/config.php/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function insertar($name, $ap, $fech){
            $stament = $this->PDO->prepare("INSERT INTO autor VALUES(0, :name, :ap, :fech)");
            
            $stament->bindParam(":name",$name);
            $stament->bindParam(":ap",$ap);
            $stament->bindParam(":fech",$fech);

            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM username where id = :id limit 1");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? $stament->fetch() : false ;
        }

        public function showP(){
            $stament = $this->PDO->prepare("SELECT * FROM libros");
           // $stament->bindParam(":id",$id);
            //return ($stament->execute()) ? $stament->fetch() : false ;

            return ($stament->execute()) ? $stament->fetchAll() : false ;

        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM username");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }

        public function update($id,$nameBook, $volume, $etiqueta, $autor, $status){
            $stament = $this->PDO->prepare("UPDATE libros SET nombre = :nombre, 
                                                    volumen = :volume,
                                                    etiqueta = :etiqueta,
                                                    autor = :autor,
                                                    estatus = :estatus
                                                    WHERE id_libro = :id");
        
            $stament->bindParam(":id", $id);
            $stament->bindParam(":nombre", $nameBook);
            $stament->bindParam(":volume", $volume);
            $stament->bindParam(":etiqueta", $etiqueta);
            $stament->bindParam(":autor", $autor);
            $stament->bindParam(":estatus", $status);

            return ($stament->execute());
        }

        public function desactive($id){
            $stament = $this->PDO->prepare("UPDATE libros set estatus = 0 WHERE id_libro = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }

        public function active($id){
            $stament = $this->PDO->prepare("UPDATE libros set estatus = 1 WHERE id_libro = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM username WHERE id = :id");
            $stament->bindParam(":id",$id);
            return ($stament->execute()) ? true : false;
        }


        public function mostrarAutores(){
            $stament = $this->PDO->prepare("SELECT * FROM autor");
           // $stament->bindParam(":id",$id);
            //return ($stament->execute()) ? $stament->fetch() : false ;

            return ($stament->execute()) ? $stament->fetchAll() : false ;

        }

    }

?>