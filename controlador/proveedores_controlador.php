<?php
require_once "modelo/proveedores_modelo.php";
class proveedores_controlador{
    public function __construct(){
        $this->vista= new  estructura();
        //  if(!isset($_SESSION["CLI_ID"])){
        //     header("location: /APPAUTO");
        // }

    }
    /*public function index(){
        $this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("cliente/principal");
    }*/ 
    public function  principal(){
        //$this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("proveedores/principal");
        
    }
     public function frmRegistro(){
         $this->vista->unirContenido("proveedores/frmRegistro");
        //  if($_SESSION['CLI_ROL'] == "Administrador" ||
        //         $_SESSION['CLI_ROL'] == "Mecanico")
    }
    public function listar(){
        $this->vista->datos = proveedores_modelo::mdlListar();
        $this->vista->unirContenido("proveedores/listar");
    }
    
    public function registrar(){
        extract($_POST);
        $datos["nombre"]   = $nombre;
        $datos["telefono"] = $telefono;
        $datos["direccion"] = $direccion;
        $datos["seccion"]    = $seccion;

        $r = proveedores_modelo::mdlRegistrar($datos);
        if($r > 0){
        echo json_encode(array("mensaje" => "proveedores registrado",
                        "icono"=> "success"));
        }else{
            echo json_encode(array("mensaje" => "Error al registrar un cliente",
                        "icono"=> "error"));
        }
    }
    public function frmEditar(){
        $id = $_GET["id"];
      $this->vista->dato=proveedores_modelo::mdlBuscarXID($id);
        $this->vista->unirContenido("proveedores/frmEditar");
   }
    public function editar(){
        extract($_POST);
        $datos["cli_id"]    = $cli_id;
        $datos["nombre"]   = $nombre;
        $datos["precio"]      = $precio;
        $datos["descripcion"] = $descripcion;
        $datos["cantidad"] = $cantidad;
        $datos["colores"]    = $colores;
        $rpta = productos_modelo::mdlEditar($datos);
        if($rpta > 0){
        echo json_encode(array("mensaje" => "proveedores actualizado",
                        "icono"=> "success"));
        }else{
            echo json_encode(array("mensaje" => "Error al actualizar un proveedores",
                        "icono"=> "error"));
        }
    }
    public function eliminar(){
        $id   = $_GET["id"];
        $r    = proveedores_modelo::mdlEliminar($id);
        if($r > 0){
            echo json_encode(array("mensaje" => "Producto borrado", "icono"=> "success"));
          
        }else{
            echo json_encode(array("mensaje" => "Error al borrar un cliente",
                        "icono"=> "error"));
        }
      }
      public function consultarByApellido(){
        extract($_POST);
        $datos = cliente_modelo::mdlconsultarByApellido($apellidos);
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
        $id = $_GET["PROV_ID"];
        $this->vista->datos=proveedores_modelo::mdlDetalles($id);
        $this->vista->unirContenido("proveedores/frmDetalles");
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
    public function reporteProductos(){
        $this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("cliente/ReporteClientes", false);
    }
}