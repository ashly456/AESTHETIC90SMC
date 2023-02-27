<br><br><br><br><br><br>
<div>
                
                <h3>Mi carrito</h3>
                <div class="card-items">
                    <!-- <div class="item">
                        <img src="./images/products/keyboard-1.jpg" alt="">
                        <div class="item-content">
                            <h5>name of product name of product name of product</h5>
                            <h5 class="cart-price">45.50$</h5>
                            <h6>Amount: 3</h6>
                        </div>
                        <span>X</span>
                    </div>
    
                    <div class="item">
                        <img src="./images/products/keyboard-1.jpg" alt="">
                        <div class="item-content">
                            <h5>name of product name of product name of product</h5>
                            <h5 class="cart-price">45.50$</h5>
                            <h6>Amount: 3</h6>
                        </div>
                        <span class="delete-product" data-id="">X</span>
                    </div> -->
                </div>
                <h2>Total: $<strong class="price-total">0</strong></h2>
            </div>
        </div>
<!-- <br><br><br><br><br><br>
<?php 
  include('recursos/conexion2.php');
  $query = "select * from imagenes";
  $resultado = mysqli_query($conn,$query);
?>
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
       <button>Añadir al carrito</button>


    </div>
               
  </div>
  <?php }?>
       </div>
    </div>
  </div>
  