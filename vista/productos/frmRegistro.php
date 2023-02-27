<!-- Menu -->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="#">Aesthetic 90s Mc</a></div>

		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="?controlador=administrador&accion=principal">Inicio</a></li>
				<li class="menu_mm"><a href="?controlador=cliente&accion=principal">Clientes</a></li>
				<li class="menu_mm"><a href="?controlador=proveedores&accion=principal">Proveedores</a></li>
				<li class="menu_mm"><a href="?controlador=productos&accion=principal">Productos</a></li>
				<li class="menu_mm"><a href="?controlador=administrador&accion=listarPQR">PQR</a></li>
			</ul>
		</nav>
	</div>

	<!-- FIN DE MENU -->
<br><br><br><br><br><br><br><br>
<?php 
  include('recursos/conexion2.php');
  $query = "select * from imagenes";
  $resultado = mysqli_query($conn,$query);
?>

  <div class="container">
    <div class="row">
       <div class="col-lg-4">
         <h1 class="">Subir productos</h1>
         <form action="recursos/subir.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="my-input">Seleccione una Imagen</label>
              <input id="my-input"  type="file" name="imagen">
          </div>
          <div class="form-group">
              <label for="my-input">Nombre del producto</label>
              <input id="my-input" class="form-control" type="text" name="titulo">
          </div>
          <div class="form-group">
              <label for="my-input">Cantidad</label>
              <input id="my-input" class="form-control" type="text" name="cantidad">
          </div>
          <div class="form-group">
              <label for="my-input">Descripcion</label>
              <input id="my-input" class="form-control" type="text" name="descripcion">
          </div>
          <div class="form-group">
              <label for="my-input">Precio</label>
              <input id="my-input" class="form-control" type="number" name="precio">
          </div>
          <div class="form-group">
              <label for="my-input">Color</label>
              <input id="my-input" class="form-control" type="text" name="color">
          </div>
          <?php if(isset($_SESSION['mensaje'])){ ?>
          <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
         <strong><?php echo $_SESSION['mensaje']; ?></strong> 
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
     </button>
       </div>
          <?php session_unset(); } ?>
          <input type="submit" value="Guardar" class="btn btn-primary" name="Guardar">
         </form>
       </div>
       </div>
     <hr> <br><br>