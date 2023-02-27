<?php
class administrador_modelo{
    public static function mdlRegistrarPqr($datos){
      $o = new conexion(); 
      $c = $o->getConexion();
      $sql = "INSERT INTO t_contacto
              (CON_NOMBRES, CON_APELLIDO, CON_TELEFONO, CON_CORREO, CON_DESCRIPCION)
              VALUES
              (? , ? , ? , ? , ?)";
      $s = $c->prepare($sql);
      $v = array($datos["nombres"],$datos["apellidos"],$datos["whatsapp"],$datos["correo"],$datos["mensaje"]);        
      return $s->execute($v);
    }
    //funcion de editar
    public static function mdlBuscarXID($cli_id){
        $o = new conexion();
        $c = $o->getConexion();
        $sql = "SELECT * FROM t_clientes WHERE CLI_ID = ?";
        $s = $c->prepare($sql);
        $v = array($cli_id);
        $s->execute($v);
        return $s->fetch();

    }
    //validacion de que exista el cliente
    public static function mdlConsultarXDOC($cli_documento){
        $o = new conexion();
        $c = $o->getConexion();
        $sql = "SELECT * FROM t_clientes WHERE CLI_DOCUMENTO = ?";
        $s = $c->prepare($sql);
        $v = array($cli_documento);
        $s->execute($v);
        return $s->fetch();
    }
    
    public static function mdlEditar($datos){
      $o = new conexion();
      $c = $o->getConexion();
      $sql = "UPDATE t_clientes SET CLI_NOMBRES = ?, CLI_ROL = ?, CLI_APELLIDOS = ?, CLI_CODIGO = ?, CLI_DOCUMENTO = ? WHERE CLI_ID = ?";       
      $s = $c->prepare($sql);
      $v = array($datos["nombres"],$datos["srol"],$datos["apellidos"],$datos["codigo"],$datos["documento"],$datos["cli_id"]);        
      return $s->execute($v);
    }
    public static function mdlListar(){
      $o = new conexion();
      $c = $o->getConexion();
      $sql = "SELECT * FROM t_contacto";
      $s = $c->prepare($sql); 
      $s->execute();  
      return $s->fetchAll();
  }
  public static function mdlEliminar($datos){
    $o = new conexion();
    $c = $o->getConexion();
    $sql = "UPDATE t_clientes SET CLI_ESTADO = 2 WHERE CLI_ID = ?";
    $s = $c->prepare($sql);
    $v = array($datos);        
    return $s->execute($v);

  }
  public static function mdlconsultarByApellido($apellidos){
    $o = new conexion();
    $c = $o->getConexion();
    $sql = "SELECT * FROM t_usuario WHERE USU_APELLIDOS LIKE '$apellidos%' AND USU_ESTADO = 1";
    $s = $c->prepare($sql);
    $v = array($apellidos);
    $s->execute();        
    return $s->fetchAll();
  }
  public static function mdlDetalles($id){
    $obj = new conexion();
    $con = $obj -> getConexion();
    $sql = "SELECT * FROM T_CLIENTES WHERE CLI_ID = ?";
    $s   = $con->prepare($sql);
    $v   = array($id);
    $s->execute($v); 
    return $s->fetch();
}
// public static function mdlvalidar($datos){
//   $o = new conexion();
//   $c =$o->getConexion();
//  $sql = "SELECT * FROM T_CLIENTES WHERE CLI_DOCUMENTO = ? AND CLI_PASS = ?";
//   $s= $c->prepare($sql);
//   $v= array($datos["usuario"], sha1($datos["password"]));
//   $s-> execute($v);
//   return $s->fetch();
// }
public static function mdlvalidar($datos){
  $obj = new conexion();
    $con = $obj -> getConexion();
    $sql = "SELECT * FROM t_clientes WHERE CLI_DOCUMENTO= ? AND CLI_PASS=?";
    $s   = $con->prepare($sql);
    $v   = array($datos["usuario"], Sha1($datos["password"]));
    $s->execute($v); 
    return $s->fetch();
}

}
?>