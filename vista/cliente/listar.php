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
<br><br>
    <div class="ol-lg-8">
                <div class="card">
                  <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                   <h6 class="text-white text-capitalize ps-3">LISTADO DE CLIENTES</h6>
                  </div>
                  <div class="card-body">
                    <table class="table table-Light table-hover border-radius-lg pt-4 pb-3 ">
                      <tr>
                        <th class="aling-middle text-center ">Nombres</th>
                        <th class="aling-middle text-center ">Apellidos</th>
                        <th class="aling-middle text-center ">Telefono</th>
                        <th class="aling-middle text-center ">Correo</th>
                        <th class="aling-middle text-center "></th>
                        <th class="aling-middle text-center "></th>
                        
                      </tr>
                      <tr>
                          <?php
                            foreach($this->datos as $valor){
                              $id = $valor["USU_ID"];
                                echo "<tr>";
                                          
                                  echo "<td class='aling-middle text-center '>".$valor["USU_NOMBRES"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["USU_APELLIDOS"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["USU_TELEFONO"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["USU_CORREO"]."</td>";
                                  echo "<td class='aling-middle text-center'><a  href='?controlador=cliente&accion=frmEditar&cli_id=$id'class='btn btn-info'>
                                  Editar</a></td>";
                                  echo "<td class='aling-middle text-center'><a href='?controlador=cliente&accion=eliminar&cli_id=$id'class='btn btn-danger'>
                                  Eliminar</a></td>";
                                echo "</tr>";
                            }
                          ?>
                      </tr>  
                    </table>
                  </div>
                </div>
              </div>

  <!-- MODAL FRM REGISTRAR -->

<div id="openModal" class="modalDialog">
<?php
$var = $this->dato["CLI_ROL"];
?>
	<div>
		<a href="#close" title="Close" class="close" style="color:black;" >X</a>

    <form action="?controlador=cliente&accion=editar" autocomplete="off" id="frmRegistro" method="post">
			<h2 style="color:black; text-align:center;">Registrar Clientes</h2>
						
			<label for="nombre">nombres</label>
			<input type="text" name="nombres" id="nombres" placeholder="nombres" required value="<?php echo $this->datos["USU_NOMBRES"];?>"/>
			<br>
			<label for="nombre">apellidos</label>
			<input type="text" name="apellidos" id="apellidos" placeholder="apellidos" required value="<?php echo $this->dato["USU_APELLIDOS"];?>"/>
			<br>
			<label for="apellidos">Telefono</label>
			<input type="number" name="telefono" id="telefono" placeholder="telefono" required value="<?php echo $this->dato["USU_TELEFONO"];?>"/>
			<br>
			<label for="email" >correo</label>
			<input type="email" name="correo" id="correo" placeholder="correo" required value="<?php echo $this->dato["USU_CORREO"];?>"/>
			<br>
			<label for="asunto">contrasena</label>
			<input type ="text" name="contrasena" id="contrasena" placeholder="contrasena" required value="<?php echo $this->dato["USU_CONTRASENA"];?>"/>
			<br>
			<select class= "form-control"name="srol" id="" value="<?php echo $this->dato["USU_ROL"];?>" required>
                          <option value="">Rol</option>
                          <option <?php echo $var =="Administrador"?"selected":"";?> value="Administrador">Admin</option>
                          <option <?php echo $var =="Cliente"?"selected":"";?>  value="Cliente">Cliente</option>                        </select>
			</form>
            </div>
          </div>
        </div>
      </div>
      </div>
	</div>
	

</div>  
