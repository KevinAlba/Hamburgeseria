<section class="producto-container">
    <h1 class="text-center fw-bold text-uppercase producto-titulo"><?= $producto->getNombre() ?></h1>
    
    <div class=" d-flex align-items-center overflow-hidden producto-card">
        <div class="producto-info">
            <p class="fw-bold prod-title2">Descripcion:</p>
            <p class="producto-descripcion"><?= $producto->getDescripcion() ?></p>
            <div class=" d-flex gap-2 ">
                <?php 
                        $precioOriginal = $producto->getPrecio();
                        $descuento = $producto->getDescuento() ?? 0;
                        $precioFinal = $producto->getPrecioFinal();
                    ?>
                <p class="fw-bold prod-title2">Precio:</p>
                <p class="producto-precio">
                 
                                <?php if($descuento > 0): ?>
                                    <span class=" text-decoration-line-through" style="color: #c60808ff; font-size: 0.9rem;">
                                        <?= number_format($precioOriginal, 2) ?> €
                                    </span>
                                    <span class="ms-2">
                                        <?= number_format($precioFinal, 2) ?> €
                                    </span>
                                <?php else: ?>
                                    <?= number_format($precioOriginal, 2) ?> €
                                <?php endif; ?>
                </p>
                                                  
            </div>
            
            <form action="index.php?controller=Carrito&action=añadir" method="POST" class=" d-flex flex-column gap-3">
                <input type="hidden" name="id_producto" value="<?= $producto->getproducto_id() ?>">
                <button type="submit" class="btn btn-primary">Añadir al carrito
                </button>
            </form>
        </div>

        <div class="producto-visual d-flex justify-content-center align-items-center">
            <img src="Public/Imagenes/Productos/<?= $producto->getImagen() ?>" 
                 alt="<?= $producto->getNombre() ?>" 
                 class="producto-imagen">
        </div>
    </div>
</section>