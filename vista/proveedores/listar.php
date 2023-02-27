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
<br><br>
    <div class="ol-lg-8">
                <div class="card">
                  <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                   <h6 class="text-white text-capitalize ps-3">LISTADO DE PROVEEDORES</h6>
                  </div>
                  <div class="card-body">
                    <table class="table table-Light table-hover border-radius-lg pt-4 pb-3 ">
                      <tr>
                        <th class="aling-middle text-center ">Nombres</th>
                        <th class="aling-middle text-center ">Telefono</th>
                        <th class="aling-middle text-center ">Direccion</th>
                        <th class="aling-middle text-center ">Seccion</th>
                        <th class="aling-middle text-center "></th>
                        <th class="aling-middle text-center "></th>
                        
                      </tr>
                      <tr>
                          <?php
                            foreach($this->datos as $valor){
                              $id = $valor["PROV_ID"];
                                echo "<tr>";
                                          
                                  echo "<td class='aling-middle text-center '>".$valor["PROV_NOMBRE"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["PROV_TELEFONO"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["PROV_DIRECCION"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["PROV_SECCION"]."</td>";
                                  echo "<td class='aling-middle text-center'><a  href='?controlador=proveedor&accion=frmEditar&cli_id=$id'class='btn btn-info'>
                                  Editar</a></td>";
                                  echo "<td class='aling-middle text-center'><a href='?controlador=proveedor&accion=eliminar&cli_id=$id'class='btn btn-danger'>
                                  Eliminar</a></td>";
                                echo "</tr>";
                            }
                          ?>
                      </tr>  
                    </table>
                  </div>
                </div>
              </div>