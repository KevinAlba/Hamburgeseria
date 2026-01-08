 <section class="carrito p-5">
    <h1 class="mb-4 fw-bold titulo-carrito">Carrito</h1>

    <div class="carrito-h2 d-flex align-items-center mb-4">
            <p class="carrito-h2-num d-flex align-items-center justify-content-center  fw-bold">1</p>
            <h2 class="carrito-h2-titulo fw-bold">Tu pedido Rojiblanco</h2>
    </div>

<div class="pedido-contenedor p-4">
    <h2 class="carrito-h2-titulo fw-bold ">Productos</h2>
    <?php if (!empty($carrito)) : ?>
        <?php foreach ($carrito as $item) : ?>
            <div class="d-flex align-items-center pedido-fila align-items-center">
                <form action="index.php?controller=Carrito&action=eliminar" method="POST" style="display:inline">
                    <input type="hidden" name="id_producto" value="<?= $item['id'] ?>">
                    <button type="submit" class="btn-eliminar"><svg color="currentColor"  class="sc-f566aa5-0 MkIcon MkIcon--delete" role="presentation" aria-hidden="true" width="21" height="22" viewBox="0 0 21 22" fill="none" style="width: 18px; height: 18px;"><path d="M8.5 9.41797C8.91421 9.41797 9.25 9.75376 9.25 10.168V16.168C9.25 16.5822 8.91421 16.918 8.5 16.918C8.08579 16.918 7.75 16.5822 7.75 16.168V10.168C7.75 9.75376 8.08579 9.41797 8.5 9.41797Z" fill="currentColor"></path><path d="M13.25 10.168C13.25 9.75376 12.9142 9.41797 12.5 9.41797C12.0858 9.41797 11.75 9.75376 11.75 10.168V16.168C11.75 16.5822 12.0858 16.918 12.5 16.918C12.9142 16.918 13.25 16.5822 13.25 16.168V10.168Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.75 4.41797V3.16797C5.75 2.43862 6.03973 1.73915 6.55546 1.22343C7.07118 0.7077 7.77065 0.417969 8.5 0.417969H12.5C13.2293 0.417969 13.9288 0.7077 14.4445 1.22343C14.9603 1.73915 15.25 2.43862 15.25 3.16797V4.41797H19.5C19.9142 4.41797 20.25 4.75376 20.25 5.16797C20.25 5.58218 19.9142 5.91797 19.5 5.91797H18.25V19.168C18.25 19.8973 17.9603 20.5968 17.4445 21.1125C16.9288 21.6282 16.2293 21.918 15.5 21.918H5.5C4.77065 21.918 4.07118 21.6282 3.55546 21.1125C3.03973 20.5968 2.75 19.8973 2.75 19.168V5.91797H1.5C1.08579 5.91797 0.75 5.58218 0.75 5.16797C0.75 4.75376 1.08579 4.41797 1.5 4.41797H5.75ZM7.61612 2.28409C7.85054 2.04966 8.16848 1.91797 8.5 1.91797H12.5C12.8315 1.91797 13.1495 2.04966 13.3839 2.28409C13.6183 2.51851 13.75 2.83645 13.75 3.16797V4.41797H7.25V3.16797C7.25 2.83645 7.3817 2.51851 7.61612 2.28409ZM4.25 5.91797H16.75V19.168C16.75 19.4995 16.6183 19.8174 16.3839 20.0519C16.1495 20.2863 15.8315 20.418 15.5 20.418H5.5C5.16848 20.418 4.85054 20.2863 4.61612 20.0519C4.3817 19.8174 4.25 19.4995 4.25 19.168V5.91797Z" fill="currentColor"></path></svg></button>
                </form>

                <img src="Public/Imagenes/Productos/<?= $item['imagen'] ?>" alt="<?= $item['nombre'] ?>" class="pedido-img">

                <p class="pediod-nombre fw-bold"><?= $item['nombre'] ?></p>

                <div class="pedido-cantida d-flex align-items-center justify-content-between">
                    <form action="index.php?controller=Carrito&action=menos" method="POST" style="display:inline">
                        <input type="hidden" name="id_producto" value="<?= $item['id'] ?>">
                        <button class="pedido-botton-menos d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32z"/></svg></button>
                    </form>

                    <p><?= $item['cantidad'] ?></p>

                    <form action="index.php?controller=Carrito&action=mas" method="POST" style="display:inline">
                        <input type="hidden" name="id_producto" value="<?= $item['id'] ?>">
                        <button class="pedido-botton-mas"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z"/></svg></button>
                    </form>
                </div>

                <p class="pedido-precio "><?= $item['precio'] * $item['cantidad'] ?> €</p>
            </div>
        <?php endforeach; ?>
        <hr>
        <div class="pedido-total d-flex align-items-center">
            <p class="fw-bold">Subtotal: </p>
            <p class="total"><?= array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], $carrito)) ?> € </p>
        </div>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>
</div>
</section>
<section class="carrito p-lg-5">
    <form action="index.php?controller=Carrito&action=pagar" method="POST">
        <div class="carrito-h2 d-flex align-items-center mb-4">
            <p class="carrito-h2-num d-flex align-items-center justify-content-center  fw-bold">2</p>
            <h2 class="carrito-h2-titulo fw-bold">Datos de entrega</h2>
        </div>

        <div class="pedido-contenedor d-flex gap-4" >
            <div class="datos-entrega">
                <p>Nombre</p>
                <input type="text" name="nombre" value="<?= $_SESSION['nombre'] ?? '' ?>" disabled>
                
                <p>Dirección</p>
                <input type="text" name="direccion" required>
                
                <p>Teléfono</p>
                <input type="text" name="telefono" required>
            </div>
            <div class="datos-entrega">
                <p>Correo electrónico</p>
                <input type="email" name="correo" value="<?= $_SESSION['correo'] ?? '' ?>" disabled>
                <p>Código Postal</p>
                <input type="text" name="codigo_postal" required>
            </div>
        </div>

        <div class="carrito-h2 d-flex align-items-center mb-4">
            <p class="carrito-h2-num d-flex align-items-center justify-content-center  fw-bold">3</p>
            <h2 class="carrito-h2-titulo fw-bold">Método de pago</h2>
        </div>

        <div class="pedido-contenedor-pago">
            <p class=" fw-bold">Elige tu método de pago</p>
            <div class="pago-metodos">
                <label class="pago-metodos-select"> <input type="radio" name="metodo" value="tarjeta" checked> Tarjeta </label>
                <label><input type="radio" name="metodo" value="bizum">Bizum</label>
            </div>
            <div class="pago-formulario">
                    <p>Número de tarjeta</p>
                    <input class type="text" name="numero_tarjeta" placeholder="1234 5678 9012 3456">
                    <div class=" d-flex">
                        <div class="w-50">
                            <p>Fecha de caducidad</p>
                            <input type="text" name="fecha_caducidad" placeholder="MM/AA">
                        </div>
                        <div class="w-50">
                            <p>Código CVC</p>
                            <input type="text" name="cvc" placeholder="123">
                        </div>
                    </div>
                    <p>Titular de la tarjeta</p>
                    <input type="text" name="titular_tarjeta">
            </div>
             <button type="submit" class="pago-boton ">Pagar</button>
        </div>
    
    </form>
</section>


 