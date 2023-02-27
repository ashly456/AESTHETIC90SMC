<?php
require_once "modelo/cliente_modelo.php";
class cliente_controlador{
    public function __construct(){
        $this->vista = new estructura();
    }
    public function index(){
        $this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("cliente/principal");
    }
    public function principal(){
      //  $this->vista->datos=cliente_modelo::mdlListar();
        $this->vista->unirContenido("cliente/principal"); 
    }
    public function perfiles(){
        //  $this->vista->datos=cliente_modelo::mdlListar();
          $this->vista->unirContenido("cliente/perfil"); 
    }
    public function login(){
        //  $this->vista->datos=cliente_modelo::mdlListar();
          $this->vista->unirContenido("inicio/login"); 
      }
    public function listar(){
        $this->vista->datos = cliente_modelo::mdlListar();
        $this->vista->unirContenido("cliente/listar");
    }
    public function frmRegistro(){
        $this->vista->unirContenido("cliente/frmRegistro");
    }
    public function frmEditar(){
      //  $id = $_GET["cli_id"];
      // $this->vista->datos=cliente_modelo::consultarId($id);
       $this->vista->unirContenido("cliente/frmEditar");
    }
    public function Registrar(){
        extract($_POST);
        $datos["nombres"] = $nombres;
        $datos["apellidos"] = $apellidos;
        $datos["telefono"] = $telefono;
        $datos["correo"] = $correo;
        $datos["contrasena"]  = $contrasena;
        $datos["srol"]  = $srol;

        $r = cliente_modelo::mdlRegistrar($datos);
        if($r > 0)
         {
          echo json_encode(array("mensaje"=> "Registrado","icono"=>"succcess"));
         } 
         else{
            echo json_encode(array("mensaje"=> "Error al registrar","icono"=>"error"));
         }
    }
    public function validar(){
        extract($_POST);
        $datos["usuario"] = $usuario;
        $datos["password"] = $password;
        $r=cliente_modelo::mdlvalidar($datos);
        if($r > 0){
            $_SESSION["USU_NOMBRES"]   =$r["USU_NOMBRES"];
            $_SESSION["USU_APELLIDOS"] =$r["USU_APELLIDOS"];
            $_SESSION["USU_TELEFONO"]  =$r["USU_TELEFONO"];
            echo json_encode(array(
                "mensaje" => "yulianna", 
                "icono" => "succes", 
                "URL" => "?controlador=inicio&accion=principal"));
        }else{
            echo json_encode(array("mensaje" => "Usuario / Contraseña errados", "icono" => "error"));
        }
        
    }
    public function salir(){
        session_destroy();
        header("location: /App");
    }

   public static function consultarByApellido(){
    extract($_POST);
    $datos = cliente_modelo::mdlconsultarByApe($apellidos);
    $tbl = "<table class='table'>";
    $tbl .= "<tr>";
    $tbl .= "<td class='aling-middle text-center '>NOMBRES</td>";
    $tbl .= "<td class='aling-middle text-center '>APELLIDOS</td>";
    $tbl .= "<td class='aling-middle text-center '>TELEFONO</td>";
    $tbl .= "<td class='aling-middle text-center '>CORREO</td>";
    $tbl .= "<td class='aling-middle text-center '>ROL</td>";
    $tbl .="<td class='aling-middle text-center '>ESTADO</td>";
    $tbl .= "</tr>";
    foreach($datos as $v){
        $id=$v["USU_ID"];
        $e="<td class='aling-middle text-center'><a  href='?controlador=cliente&accion=frmEditar&cli_id=$id'class='btn btn-info'>
        Editar</a></td>";
        $ed = "<td class='aling-middle text-center'><a href='?controlador=cliente&accion=eliminar&cli_id=$id'class='btn btn-danger'>
        Eliminar</a></td>";
        $tbl.= "<tr>";
        $tbl.= "<td class='aling-middle text-center'>".$v["USU_NOMBRES"]."</td>";
        $tbl.= "<td class='aling-middle text-center'>".$v["USU_APELLIDOS"]."</td>";
        $tbl.= "<td class='aling-middle text-center'>".$v["USU_TELEFONO"]."</td>";
        $tbl.= "<td class='aling-middle text-center'>".$v["USU_CORREO"]."</td>";
        $tbl.= "<td class='aling-middle text-center'>".$v["USU_ROL"]."</td>";
        $estado=$v ["USU_ESTADO"]==1? "ACTIVO": "INACTIVO";
        $tbl.="<td class='aling-middle text-center'>".$estado."</td>";
        $tbl.="<td >$ed</td>";
        $tbl.="<td>$e</td>";
        $tbl.= "</tr>";
    }
    $tbl .="</table>";
    echo json_encode(array("mensaje"=>$tbl));  
  }
  public function editar(){
    extract($_POST);
    $datos["usu_nombres"] = $nombres;
    $datos["usu_apellidos"] = $apellidos;
    $datos["usu_telefono"] = $telefono;
    $datos["usu_correo"] = $correo;
    $datos["usu_contrasena"]  = $contrasena;
    $datos["usu_rol"]  = $srol;
    $datos["usu_id"]  = $id;
    $r = cliente_modelo::mdleditar($datos);
    if( $r > 0){
        echo json_encode(array("mensaje" => "Editado Correctamente" , "icono"=>"success"));
    }else{
        echo json_encode(array("mensaje" => "Error al editar" , "icono"=>"error"));
    }
}
  public function eliminar(){
    $id = $_GET["cli_id"];
    $e=cliente_modelo::mdleliminar($id);
    if($e > 0){
        echo json_encode(array("mensaje" => "Se elimino cliente" ,"icono"=>"success"));
    }else{
        echo json_encode(array("mensaje" => "No se  elimino cliente " ,"icono"=>"Error"));
    }
 }
}
?>