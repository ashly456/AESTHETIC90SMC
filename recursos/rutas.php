<?php
class rutas{

    public static function cargarContenido($controlador, $accion){
        //inicio_controlador.php
        $archivo = "controlador/".$controlador."_controlador.php";
        if(file_exists($archivo)){
            require_once $archivo; //importar archivo
            $clase = $controlador."_controlador";
            $obj = new $clase();
            if(method_exists($obj, $accion)){
                $obj->$accion();
            }else{
                echo "<br> Metodo <b>$accion</b> no existe en la clase <b>$clase</b>";
                // header("location: /APPAUTO");
            }
            
        }else{
            echo "<br> No existe controlador";
            // header("location: /APPAUTO");
        }
       
    }
}



?>