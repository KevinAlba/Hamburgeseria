<section class="container py-5">

    <h1 class="mb-4 fw-bold">Carta</h1>

    <ul class="navbar-nav d-none d-lg-flex flex-row gap-4 mb-0 d-flex border-bottom">
        <?php foreach ($listaCategorias as $categoria):
            if ($categoria->getcategoria_padre() === null):

                $nombre = $categoria->getnombre_categoria();
                $active = ($categoriaActiva === $nombre) ? "active" : "";
        ?>
                <li class="nav-item">
                    <a class="nav-link nav-carta <?= $active ?>"
                        href="?controller=Carta&action=index&cat=<?= urlencode($nombre) ?>">
                        <?= $nombre ?>
                    </a>
                </li>
        <?php endif;
        endforeach; ?>
    </ul>

    <?php if (!empty($categoriasHijas)): ?>

        <?php foreach ($categoriasHijas as $hija): ?>

            <h2 class="categoria-hija-titulo mt-5 mb-4 fw-bold">
                <?= $hija->getnombre_categoria() ?>
            </h2>
            <div class="row g-4">
                <?php foreach ($productosPorHija[$hija->getcategoria_id()] as $prod): ?>

                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card-carta border-0">
                            <div class="card-carta-img align-items-center d-flex justify-content-center position-relative ">
                                <p class="card-precio fw-bold"><?= number_format($prod->getprecio(), 2) ?> €</p>
                                <?php if ($prod->getimagen()): ?>
                                    <img src="Public/Imagenes/Productos/<?= $prod->getimagen() ?>"
                                        class="img-carta" alt="<?= $prod->getnombre() ?>">
                                <?php endif; ?>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-carta-title text-center"><?= $prod->getnombre() ?></h5>
                                <p class="card-carta-p text-center"><?= $prod->getdescripcion() ?></p>
                                <a href="" class="btn btn-primary align-self-center border-0">Ver más</a>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        <?php endforeach; ?>

    <?php else: ?>
        <div class="alert alert-warning mt-4">
            Selecciona una categoría para ver los productos.
        </div>
    <?php endif; ?>

</section>