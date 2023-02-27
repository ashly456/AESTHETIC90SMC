<?php
require_once "modelo/administrador_modelo.php";
class administrador_controlador{
    public function __construct(){
        $this->vista= new  estructura();
        //  if(!isset($_SESSION["CLI_ID"])){
        //     header("location: /APPAUTO");
        // }

    }
    // public function index(){
    //     // $this->vista->datos = cliente_modelo::mdlListar();
    //     $this->vista->unirContenido("cliente/principal");
    // }
    public function  principal(){
        //$this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("administrador/principal");
        
    }
    public function  listarPQR(){
        $this->vista->datos = administrador_modelo::mdlListar();
        $this->vista->unirContenido("administrador/pqr");
        
    }
     public function registros(){
         $this->vista->unirContenido("administrador/registro");
        //  if($_SESSION['CLI_ROL'] == "Administrador" ||
        //         $_SESSION['CLI_ROL'] == "Mecanico")
    }
    public function contactanos(){
        $this->vista->unirContenido("administrador/contactanos");
       //  if($_SESSION['CLI_ROL'] == "Administrador" ||
       //         $_SESSION['CLI_ROL'] == "Mecanico")
   }
    
    public function registrarPqr(){
        extract($_POST);
        $datos["nombres"]   = $nombres;
        $datos["apellidos"]   = $apellidos;
        $datos["whatsapp"] = $whatsapp;
        $datos["correo"]      = $correo;
        $datos["mensaje"] = $mensaje;

        $r = administrador_modelo::mdlRegistrarPqr($datos);
        if($r > 0){
        echo json_encode(array("mensaje" => "PQR registrado",
                        "icono"=> "success"));
        }else{
            echo json_encode(array("mensaje" => "Error al registrar PQR",
                        "icono"=> "error"));
        }
    }
    public function frmEditar(){
        $id = $_GET["id"];
      $this->vista->dato=administrador_modelo::mdlBuscarXID($id);
        $this->vista->unirContenido("administrador/frmEditar");
   }
    public function editar(){
        extract($_POST);
        $datos["cli_id"]    = $cli_id;
        $datos["nombres"]   = $nombres;
        $datos["apellidos"] = $apellidos;
        $datos["whatsapp"] = $whatsapp;
        $datos["correo"]    = $correo;
        $datos["mensaje"]    = $mensaje;
        $rpta = administrador_modelo::mdlEditar($datos);
        if($rpta > 0){
        echo json_encode(array("mensaje" => "Cliente actualizado",
                        "icono"=> "success"));
        }else{
            echo json_encode(array("mensaje" => "Error al actualizar un cliente",
                        "icono"=> "error"));
        }
    }
    public function eliminar(){
        $id   = $_GET["id"];
        $r    = administrador_modelo::mdlEliminar($id);
        if($r > 0){
            echo json_encode(array("mensaje" => "Cliente borrado", "icono"=> "success"));
          
        }else{
            echo json_encode(array("mensaje" => "Error al borrar un cliente",
                        "icono"=> "error"));
        }
      }
      public function consultarByApellido(){
        extract($_POST);
        $datos = administrador_modelo::mdlconsultarByApellido($apellidos);
        $tbl   = "<table class='table'>";
        $tbl   .= "<tr>";
        $tbl   .= "<td class='text-uppercase text-primary font-weight-bolder opacity-10'>NOMBRES</td>";
        $tbl   .= "<td class='text-uppercase text-primary font-weight-bolder opacity-10'>APELLIDOS</td>";
        $tbl   .= "<td class='text-uppercase text-primary font-weight-bolder opacity-10'>DOCUMENTO</td>";
        $tbl   .= "<td class='text-uppercase text-primary font-weight-bolder opacity-10'>CODIGO</td>";
        // $tbl   .= "<td>ESTADO</td>";
        // $tbl   .= "<td>ROL</td>";
        $tbl   .= "</tr>";
        foreach($datos as $v){
        $id= $v["CLI_ID"];
        $e = "<a href='?controlador=cliente&accion=eliminar&id=$id' class='btn btn-light'>Eliminar</a>";
        $ed = "<a href='?controlador=cliente&accion=frmEditar&id=$id' class='btn btn-light'>Editar</a>";
        $f ="<a  href='?controlador=cliente&accion=frmDetalles&cli_id=$id'class='btn btn-light'>
        Detalles</a>";
        $estado = $v["CLI_ESTADO"] == 1 ? "ACTIVO":"INACTIVO";
        $tbl   .= "<tr>";
        $tbl   .= "<td>".$v["CLI_NOMBRES"]."</td>";
        $tbl   .= "<td>".$v["CLI_APELLIDOS"]."</td>";
        $tbl   .= "<td>".$v["CLI_DOCUMENTO"]."</td>";
        $tbl   .= "<td>".$v["CLI_CODIGO"]."</td>";
        // $tbl   .= "<td>$estado</td>";
        // $tbl   .= "<td>".$v["CLI_ROL"]."</td>";
        $tbl   .= "<td>$ed</td>";
        $tbl   .= "<td>$e</td>";
        $tbl   .= "<td>$f</td>";
        $tbl   .= "</tr>";
    }
        $tbl   .= "</table>";
        if($apellidos == ''){
            echo json_encode(array("mensaje"=>''));
        }else{
        echo json_encode(array("mensaje"=>$tbl));
    }
    }
    public function frmDetalles(){
        $id = $_GET["cli_id"];
        $this->vista->datos=cliente_modelo::mdlDetalles($id);
        $this->vista->unirContenido("cliente/frmDetalles");
    }
    public function salir(){
        session_destroy();
        header("location: /APPAUTOMOTRIZ");
    }
    public function validar(){
        extract($_POST);
        $datos["usuario"] = $usuario;
        $datos["password"] = $password;
        $r=cliente_modelo::mdlvalidar($datos);
        if($r > 0){
            $_SESSION["CLI_NOMBRES"]   =$r["CLI_NOMBRES"];
            $_SESSION["CLI_APELLIDOS"] =$r["CLI_APELLIDOS"];
            $_SESSION["CLI_ROL"]       =$r["CLI_ROL"];
            $_SESSION["CLI_ID"]        =$r["CLI_ID"];
            echo json_encode(array(
                "mensaje" => "Yulianna", 
                "icono" => "succes", 
                "URL" => "?controlador=inicio&accion=principal"));
        }else{
            echo json_encode(array("mensaje" => "Usuario / Contraseña errados", "icono" => "error"));
        }
        
    }
    public function reporteClientes(){
        $this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("cliente/ReporteClientes", false);
    }
}
?>