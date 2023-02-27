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
<?php
$var = $this->dato["CLI_ROL"];
?>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <br><br><br><br>
                <h6 class="text-white text-capitalize ps-3">REGISTRO DE CLIENTES</h6>
              </div>
            </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3">
                    <form action="?controlador=cliente&accion=editar" autocomplete="off" id="frmRegistro" method="post">
                   
                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control" value="<?php echo $this->datos["USU_NOMBRES"];?>">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $this->dato["USU_APELLIDOS"];?>">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">telefono</label>
                    <input type="number" name="telefono" class="form-control" value="<?php echo $this->dato["USU_TELEFONO"];?>">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Correo</label>
                    <input type="text" name="correo" class="form-control" value="<?php echo $this->dato["USU_CORREO"];?>">
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <label class="form-label">contraseña</label>
                    <input type="number" name="contrasena" class="form-control" value="<?php echo $this->dato["USU_CONTRASENA"];?>">
                    </div>
                
                    <select class= "form-control"name="srol" id="" value="<?php echo $this->dato["USU_ROL"];?>" required>
                          <option value="">Rol</option>
                          <option <?php echo $var =="Administrador"?"selected":"";?> value="Administrador">Admin</option>
                          <option <?php echo $var =="Cliente"?"selected":"";?>  value="Cliente">Cliente</option>                        </select>
                  <input type="hidden" name="prov_id" value="<?php echo $this->dato["USU_ID"];?>" required>
                    </div>
                    <input type="submit" name="aceptar" class="btn bg-gradient-primary">
                    </form>
                </div>
                </div>
             
            </div>
          </div>
        </div>
      </div>
      </div>