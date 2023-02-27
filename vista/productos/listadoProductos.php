<?php 
  include('recursos/conexion2.php');
  $query = "select * from imagenes";
  $resultado = mysqli_query($conn,$query);
?>
<br><br><br><br><br><br>
<div class="search" style="width:100%;">
			<form action="#">
				<input type="search" class="search_input menu_mm" required="required" placeholder="Buscar producto">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="public/images/magnifying-glass.svg" alt=""></button>
			</form>
		</div>
<br><br>
<div class="col-lg-14">
           <div class="container-items">
               <?php foreach($resultado as $row){ ?>
         <div class="item">
            <a href="?controlador=productos&accion=detalles&id=<?php echo $row['cod_imagen']; ?>">
      <img src="public/images/<?php echo $row['imagen']; ?>" class="card-img-top" alt="...">
      </a>
       <div class="info-product">
       <h4 class="card-title"><strong><?php echo $row['nombre']; ?></strong></h4>
       <h1 class="price"><strong><?php echo $row['precio']; ?></strong></h1>
       <button >Agotado</button>
       <button >Editar</button>


    </div>
               
  </div>
  <?php }?>
       </div>
    </div>
  </div>
