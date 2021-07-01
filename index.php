<?php include('templates/header.php'); 
        include('carrito_compras.php')
?>
        <!-- Carrousel -->
        <div class="container-slider">
            <div class="slider" id="slider">
                <div class="slider-section">
                    <img src="img/carrousel4.jpg" class="slider-img">
                </div>
                <div class="slider-section">
                    <img src="img/carrousel2.jpg" class="slider-img">
                </div>
                <div class="slider-section">
                    <img src="img/carrousel3.jpg" class="slider-img">
                </div>
            </div>

            <div class="slider-btn slider-btn-left" id="btn-left">&#60;</div>
            <div class="slider-btn slider-btn-right" id="btn-right">&#62;</div>
        </div>
    </header>

    <!-- MAIN -->
    
        <section class="section featured">
            <div class="title">
                <h1>Productos</h1>
                <h1>Git me lo mama</h1>
            </div>

            <div class="product-center container">
            <?php
            $sentencia=$pdo->prepare("SELECT * FROM `productos`");//prepara la consulta a la bd y trae la variable $pdo del archivo conexion.php en la carpeta global
            $sentencia->execute();//ejecuta la consulta de la bd
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);//guarda los valores de la consulta a la bd en la variable
            //print_r($listaProductos); 
            ?>
            <!-- Registra cada card como un ciclo, según los productos qué hay  -->
            <?php foreach($listaProductos as $producto){ ?><!-- transfiere los valores de la bd guardada en la variable lista, a la nueva variable llamada producto -->
                <div class="product">
                    <div class="product-header">
                        <div class="product-img">
                        <img title="<?php echo $producto['nombre_producto']; ?>"
                        src="<?php echo $producto['imagen_producto']; ?>"
                        alt="<?php echo $producto['nombre_producto']; ?>">
                        </div>

                        <ul class="icons">
                           
                         <a href="mostrar_carrito.php"><span><i class="bx bx-shopping-bag"></i></span></a>   
                           
                        </ul>
                        <div class="product-footer">
                        <a href="#">
                            <h3 class="item-title"><?php echo $producto['nombre_producto']; ?></h3>
                        </a>
                        <h4 class="price">$<?php echo $producto['precio_producto']." Kg"; ?></h4>
                        
                        <form action="" method="POST">
                        <!-- Recibe los datos y los encripta-->
                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_productos'],$COD,$KEY); ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre_producto'],$COD,$KEY); ?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio_producto'],$COD,$KEY); ?>">
                        <input type="hidden" name="iva" id="iva" value="<?php echo openssl_encrypt($producto['iva'],$COD,$KEY); ?>">
                        <input type="hidden" name="impoconsumo" id="impoconsumo" value="<?php echo openssl_encrypt($producto['impoconsumo'],$COD,$KEY); ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,$COD,$KEY); ?>">
                        <!-- <button class="button-product" type="submit" name="btnAccion" value="Agregar">Comprar</button> -->
                        <button class="button-product" 
                        type="submit" 
                        name="btnAccion" 
                        value="Agregar">Comprar</button>
                        </form>
                  
                    </div>
                    </div>
                    
                   
                </div>
                <?php } ?>
                
            </div>
        </section>
   
   
    
 <?php include('templates/footer.php'); ?>   