<?php 
  include('recursos/conexion2.php');
  $query = "select * from imagenes ";
  $resultado = mysqli_query($conn,$query);
?>
<br><br>
<div class="modalDialog">
	<div>
    <?php foreach($resultado as $row){ ?> 
    <img src="public/images/<?php echo $row['imagen']; ?>" class="imgModal" alt="...">
	<br><br>
	<h1><strong><?php echo $row['nombre']; ?></strong></h1>
  <br><br>
	<p><strong><?php echo $row['descripcion']; ?></strong></p>
  <br><br>
	<h1 class="price"><strong><?php echo $row['precio']; ?></strong></h1>
  <br><br>
  <h3 ><?php echo $row['colores']; ?></h3>
	<br>
  
  <div>
    <div style="text-align:center;">
      <input value="-" class="inputdetalle"></input><input value="0" class="inputdetalle"></input><input value="+" class="inputdetalle"></input>
      <br><br><br>
    <div style="text-align:center;">
    <button class="btnCompra">Comprar</button>
    </div>
    </div>
    </div>
	<br><br><br><br>
    <?php }?>
    </div>
	</div>
