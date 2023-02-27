<?php

class conexion{

        private $c; 
        private $usuario ="root"; 
        private $password =""; 
        private $host ="mysql:host=localhost;dbname=aesthetic90mc;port=3306";


         public function __construct(){ 
            try{
                if($_SERVER["SERVER_NAME"] == "localhost"){
                    $this->c = new PDO($this->host, $this->usuario, $this->password);
                }
                $this->c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Error al conectar:" .$e->getMessage();
            }
        }
        public function getConexion(){ 
            return $this->c; 
        }
    }

?>