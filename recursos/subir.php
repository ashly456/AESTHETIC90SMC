<?php
include('conexion2.php');

if(isset($_POST['Guardar'])){
    $imagen = $_FILES['imagen']['name'];
    $nombre = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $color = $_POST['color'];


    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp';
          $_SESSION['tipo'] = 'danger';
          header('location:../index.php');
       }else{
         $query = "INSERT INTO imagenes(imagen,nombre,cantidad,descripcion,precio,colores) values('$imagen','$nombre','$cantidad','$descripcion','$precio','$color')";
         $resultado = mysqli_query($conn,$query);
         if($resultado){
              move_uploaded_file($temp,'imagenes/'.$imagen);   
             $_SESSION['mensaje'] = 'se ha subido correctamente';
             $_SESSION['tipo'] = 'success';
             header('location:../?controlador=productos&accion=vercarrito');
         }else{
             $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
             $_SESSION['tipo'] = 'danger';
         }
       }
    }
}


?>