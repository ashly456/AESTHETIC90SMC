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
<br><br><br><br><br><br>
<?php 
  include('recursos/conexion2.php');
  $query = "select * from t_usuario";
  $resultado = mysqli_query($conn,$query);
?>
<form action="?controlador=cliente&accion=editar" autocomplete="off" id="frmRegistro" method="post">
			<h2 style="color:black; text-align:center;">Editar Clientes</h2>
						
			<label for="nombre">nombres</label>
			<input type="text" name="nombres"  placeholder="nombres" required value="<?php echo $row['USU_NOMBRES']; ?>"/>
			<br>
			<label for="nombre">apellidos</label>
			<input type="text" name="apellidos"  placeholder="apellidos" required value="<?php echo $row['USU_NOMBRES']; ?>"/>
			<br>
			<label for="apellidos">Telefono</label>
			<input type="number" name="whatsapp"  placeholder="telefono" required value="<?php echo $this->dato["USU_TELEFONO"];?>"/>
			<br>
			<label for="email" >correo</label>
			<input type="email" name="correo"  placeholder="correo" required value="<?php echo $this->dato["USU_CORREO"];?>"/>
			<br>
			<label for="asunto">contrasena</label>
			<input type ="text" name="contrasena"  placeholder="contrasena" required value="<?php echo $this->dato["USU_CONTRASENA"];?>"/>
			<br>
			<select class= "form-control"name="srol" value="<?php echo $this->dato["USU_ROL"];?>" required>
                          <option value="">Rol</option>
                          <option <?php echo $var =="Administrador"?"selected":"";?> value="Administrador">Admin</option>
                          <option <?php echo $var =="Cliente"?"selected":"";?>  value="Cliente">Cliente</option>   
                           </select>
     <input type="hidden" name="id" value="<?php echo $this->dato["USU_ID"];?>" required>

      <input type="submit" name="aceptar" class="btn bg-gradient-primary" value="enviar">
			</form>

      