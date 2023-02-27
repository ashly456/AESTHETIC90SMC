
<br><br>
<title>LISTA DE PQR</title>
    <div class="ol-lg-8">
                <div class="card">
                  <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                   <h6 class="text-white text-capitalize ps-3">LISTADO DE PQR</h6>
                  </div>
                  <div class="card-body">
                    <table class="table table-Light table-hover border-radius-lg pt-4 pb-3 ">
                      <tr>
                        <th class="aling-middle text-center ">Nombres</th>
                        <th class="aling-middle text-center ">Apellidos</th>
                        <th class="aling-middle text-center ">Telefono</th>
                        <th class="aling-middle text-center ">Correo</th>
                        <th class="aling-middle text-center ">Descripcion</th>
                        <th class="aling-middle text-center "></th>
                        <th class="aling-middle text-center "></th>
                        
                      </tr>
                      <tr>
                          <?php
                            foreach($this->datos as $valor){
                              $id = $valor["CON_ID"];
                                echo "<tr>";
                                          
                                  echo "<td class='aling-middle text-center '>".$valor["CON_NOMBRES"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["CON_APELLIDO"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["CON_TELEFONO"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["CON_CORREO"]."</td>";
                                  echo "<td class='aling-middle text-center '>".$valor["CON_DESCRIPCION"]."</td>";
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