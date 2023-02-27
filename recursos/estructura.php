<?php
class estructura{
    // $contenido ="inicio/login"
    // require_once "vista/inicio/login.php";
    public function unirContenido($contenido,$cargar_hf=true){
        if($cargar_hf == true){
            require_once "vista/header.php";
            require_once "vista/$contenido".".php";
            require_once "vista/footer.php";
        }else{
            require_once "vista/$contenido".".php";
        }
        
    }
}