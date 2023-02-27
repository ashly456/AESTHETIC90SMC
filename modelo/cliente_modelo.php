<?php
class cliente_modelo{
  public static function mdlRegistrar($datos){
          $o = new conexion();
          $c = $o->getConexion();
          $sql = "INSERT INTO t_usuario
                  (USU_NOMBRES, USU_APELLIDOS, USU_TELEFONO, USU_CORREO, USU_CONTRASENA,USU_ROL)
                  VALUES
                  (? , ? , ? , ?, ?, ?)";
          $s = $c->prepare($sql);
          $v = array($datos["nombres"],$datos["apellidos"],$datos["telefono"],$datos["correo"],sha1($datos["contrasena"]),$datos["srol"]);        
          return $s->execute($v);
        }
        //funcion de editar
        public static function mdlBuscarXID($cli_id){
            $o = new conexion();
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_usuario WHERE USU_ID = ?";
            $s = $c->prepare($sql);
            $v = array($cli_id);
            $s->execute($v);
            return $s->fetch();
    
        }
        //validacion de que exista el cliente
        public static function mdlConsultarXDOC($nombres){
            $o = new conexion();
            $c = $o->getConexion();
            $sql = "SELECT * FROM t_usuario WHERE USU_NOMBRES = ?";
            $s = $c->prepare($sql);
            $v = array($nombres);
            $s->execute($v);
            return $s->fetch();
        }
        
    public static function mdlEditar($datos){
      $o = new conexion();
      $c = $o->getConexion();
      $sql = "UPDATE t_usuario SET USU_NOMBRES = ?, USU_APELLIDOS = ?, USU_TELEFONO = ?, USU_CORREO = ?,  USU_ROL = ? WHERE USU_ID = ?";       
      $s = $c->prepare($sql);
      $v = array(
        $datos["usu_nombres"],
        $datos["usu_apellidos"],
        $datos["usu_telefono"],
        $datos["usu_correo"],
        $datos["usu_rol"]
        ,$datos["usu_id"]
        );        
      return $s->execute($v);
    }
        public static function mdlListar(){
          $o = new conexion();
          $c = $o->getConexion();
          $sql = "SELECT * FROM t_usuario";
          $s = $c->prepare($sql); 
          $s->execute();  
          return $s->fetchAll();
      }
      public static function mdlEliminar($datos){
        $o = new conexion();
        $c = $o->getConexion();
        $sql = "UPDATE t_usuario SET USU_ESTADO = 2 WHERE USU_ID = ?";
        $s = $c->prepare($sql);
        $v = array($datos);        
        return $s->execute($v);
    
      }
      public static function mdlconsultarByApe($apellidos){
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
        $sql = "SELECT * FROM t_usuario WHERE USU_ID = ?";
        $s   = $con->prepare($sql);
        $v   = array($id);
        $s->execute($v); 
        return $s->fetch();
    }
    public static function mdlvalidar($datos){
      $o = new conexion();
      $c =$o->getConexion();
     $sql = "SELECT * FROM t_usuario WHERE USU_CORREO = ? AND USU_CONTRASENA = ?";
      $s= $c->prepare($sql);
      $v= array($datos["usuario"], sha1($datos["password"]));
      $s-> execute($v);
      return $s->fetch();
    }
    // public static function mdlvalidar($datos){
    //   $obj = new conexion();
    //     $con = $obj -> getConexion();
    //     $sql = "SELECT * FROM t_usuario WHERE USU_CORREO= ? AND USU_CONTRASENA=?";
    //     $s   = $con->prepare($sql);
    //     $v   = array($datos["correo"], Sha1($datos["contrasena"]));
    //     $s->execute($v); 
    //     return $s->fetch();
    // }
}


// <?php
// class cliente_modelo{
//     public static function mdlRegistrar($datos){
//       $o = new conexion();
//       $c = $o->getConexion();
//       $sql = "INSERT INTO t_usuario
//               (USU_NOMBRES, USU_APELLIDOS, USU_TELEFONO, USU_CORREO, USU_CONTRASENA,USU_ROL)
//               VALUES
//               (? , ? , ? , ?, ?, ?)";
//       $s = $c->prepare($sql);
//       $v = array($datos["nombres"],$datos["apellidos"],$datos["telefono"],$datos["correo"],sha1($datos["contrasena"]),$datos["srol"]);        
//       return $s->execute($v);
//     }
//     //funcion de editar
//     public static function mdlBuscarXID($cli_id){
//         $o = new conexion();
//         $c = $o->getConexion();
//         $sql = "SELECT * FROM t_usuario WHERE USU_ID = ?";
//         $s = $c->prepare($sql);
//         $v = array($cli_id);
//         $s->execute($v);
//         return $s->fetch();

//     }
//     //validacion de que exista el cliente
//     public static function mdlConsultarXDOC($nombres){
//         $o = new conexion();
//         $c = $o->getConexion();
//         $sql = "SELECT * FROM t_usuario WHERE USU_NOMBRES = ?";
//         $s = $c->prepare($sql);
//         $v = array($nombres);
//         $s->execute($v);
//         return $s->fetch();
//     }
    
// public static function mdlEditar($datos){
//   $o = new conexion();
//   $c = $o->getConexion();
//   $sql = "UPDATE t_usuario SET USU_NOMBRES = ?, USU_APELLIDOS = ?, USU_TELEFONO = ?, USU_CORREO = ?,  USU_ROL = ? WHERE USU_ID = ?";       
//   $s = $c->prepare($sql);
//   $v = array(
//     $datos["usu_nombres"],
//     $datos["usu_apellidos"],
//     $datos["usu_telefono"],
//     $datos["usu_correo"],
//     $datos["usu_rol"]
//     ,$datos["usu_id"]
//     );        
//   return $s->execute($v);
// }
//     public static function mdlListar(){
//       $o = new conexion();
//       $c = $o->getConexion();
//       $sql = "SELECT * FROM t_usuario";
//       $s = $c->prepare($sql); 
//       $s->execute();  
//       return $s->fetchAll();
//   }
//   public static function mdlEliminar($datos){
//     $o = new conexion();
//     $c = $o->getConexion();
//     $sql = "UPDATE t_usuario SET USU_ESTADO = 2 WHERE USU_ID = ?";
//     $s = $c->prepare($sql);
//     $v = array($datos);        
//     return $s->execute($v);

//   }
//   public static function mdlconsultarByApellido($apellidos){
//     $o = new conexion();
//     $c = $o->getConexion();
//     $sql = "SELECT * FROM t_usuario WHERE USU_APELLIDOS LIKE '$apellidos%' AND USU_ESTADO = 1";
//     $s = $c->prepare($sql);
//     $v = array($apellidos);
//     $s->execute();        
//     return $s->fetchAll();
//   }
//   public static function mdlDetalles($id){
//     $obj = new conexion();
//     $con = $obj -> getConexion();
//     $sql = "SELECT * FROM t_usuario WHERE USU_ID = ?";
//     $s   = $con->prepare($sql);
//     $v   = array($id);
//     $s->execute($v); 
//     return $s->fetch();
// }
// public static function mdlvalidar($datos){
//   $o = new conexion();
//   $c =$o->getConexion();
//  $sql = "SELECT * FROM t_usuario WHERE USU_CORREO = ? AND USU_CONTRASENA = ?";
//   $s= $c->prepare($sql);
//   $v= array($datos["usuario"], sha1($datos["password"]));
//   $s-> execute($v);
//   return $s->fetch();
// }
// // public static function mdlvalidar($datos){
// //   $obj = new conexion();
// //     $con = $obj -> getConexion();
// //     $sql = "SELECT * FROM t_usuario WHERE USU_CORREO= ? AND USU_CONTRASENA=?";
// //     $s   = $con->prepare($sql);
// //     $v   = array($datos["correo"], Sha1($datos["contrasena"]));
// //     $s->execute($v); 
// //     return $s->fetch();
// // }

// }
// ?>