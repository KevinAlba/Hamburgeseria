
    <!---------------------------------Banner Section 1------------------------------------>
    <section>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="carouselExampleAutoplaying" data-bs-slide-to="0" class="w-50 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="carouselExampleAutoplaying" data-bs-slide-to="1" class="w-50" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="carouselExampleAutoplaying" data-bs-slide-to="2" class="w-50" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Public/Imagenes/banner1.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>El sabor que une a la afición</h2>
                        <p>Hamburguesas hechas con pasión rojiblanca.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Public/Imagenes/banner2.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Sabor premium en cada bocado</h2>
                        <p>Ingredientes frescos, recetas únicas.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Public/Imagenes/banner3.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Un estadio de sabores</h2>
                        <p>Vive la experiencia rojiblanca también en la mesa.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev botonIzquierdo" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <svg style="width: 24px; height: 24px;" viewBox="0 0 25 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.8545 5.46967C15.1474 5.76256 15.1474 6.23744 14.8545 6.53033L9.38488 12L14.8545 17.4697C15.1474 17.7626 15.1474 18.2374 14.8545 18.5303C14.5617 18.8232 14.0868 18.8232 13.7939 18.5303L7.79389 12.5303C7.501 12.2374 7.501 11.7626 7.79389 11.4697L13.7939 5.46967C14.0868 5.17678 14.5617 5.17678 14.8545 5.46967Z"
                        fill="white" />
                </svg>
            </button>
            <button class="carousel-control-next botonDerecho" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <svg viewBox="0 0 24 24" fill="none" style="width: 24px; height: 24px;">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967L16.5303 11.4697C16.8232 11.7626 16.8232 12.2374 16.5303 12.5303L10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303C9.17678 18.2374 9.17678 17.7626 9.46967 17.4697L14.9393 12L9.46967 6.53033C9.17678 6.23744 9.17678 5.76256 9.46967 5.46967Z"
                        fill="white" />
                </svg>
            </button>
        </div>
    </section>
    <!---------------------------------Mejores Hamburguesas Section 2------------------------------------>
    <section id="mejoeresHamburgesas">
        <h2 class="text-center fw-bold titulo ">Mejores Hamburgesas</h2>
        <div class="mejoresHamburgesas d-flex justify-content-center flex-wrap">
            <?php foreach ($listaProductos as $producto): ?>
                <?php if (in_array($producto->getPRODUCTO_ID(), [6, 10, 13])): ?>
                    <div class="card border-0">
                        <div class="card-img-top align-items-center d-flex justify-content-center">
                            <img class="img-mejoresHamburgesas" src="Public/Imagenes/Productos/<?= $producto->getimagen() ?>" alt="Hamburgusa">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center"><?= $producto->getNOMBRE() ?></h5>
                            <p class="card-text text-center"><?= $producto->getDESCRIPCION() ?></p>
                            <a href="?controller=Producto&action=ver&id=<?= $producto->getPRODUCTO_ID() ?>" class="btn btn-primary align-self-center border-0">Ver más</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <!---------------------------------Menus Section 3------------------------------------>
    <section id="homeSection3" class="mt-5 position-relative pb-5">
        <div class="bg-overlay"></div>
        <h2 class="text-center text-white fw-bold titulo">Menus</h2>
        <div class="align-items-center d-flex flex-column justify-content-center p-5">
            <div class="slider-container">
                <div class="slider-track">
                    <?php foreach ($listaProductos as $producto): ?>
                        <?php if ($producto->getcategoria_id() == 22 ): ?>
                        <img
                            src="Public/Imagenes/Productos/<?= $producto->getImagen() ?>"
                            data-id="<?= $producto->getPRODUCTO_ID() ?>"
                            data-nombre="<?= $producto->getNOMBRE() ?>"
                            data-desc="<?= $producto->getDESCRIPCION() ?>">
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3 w-100">
                <button id="btn-prev" class="nav-btn btn btn-secondary d-flex align-items-center justify-content-center">
                    <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkIcon--arrowLeft" role="presentation" aria-hidden="true" width="25" height="24" viewBox="0 0 25 24" fill="none" style="width: 24px; height: 24px;">
                        <path d="M12.6319 5.53033C12.9248 5.23744 12.9248 4.76256 12.6319 4.46967C12.339 4.17678 11.8641 4.17678 11.5712 4.46967L4.57123 11.4697C4.27834 11.7626 4.27834 12.2374 4.57123 12.5303L11.5712 19.5303C11.8641 19.8232 12.339 19.8232 12.6319 19.5303C12.9248 19.2374 12.9248 18.7626 12.6319 18.4697L6.87455 12.7123H19.1399C19.533 12.7123 19.8516 12.3937 19.8516 12.0007C19.8516 11.6077 19.533 11.2891 19.1399 11.2891H6.87316L12.6319 5.53033Z" fill="currentColor"></path>
                    </svg>
                </button>
                    <div id="burger-info"></div>
                <button id="btn-next" class="nav-btn btn btn-secondary d-flex align-items-center justify-content-center">
                    <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkIcon--arrowRight" role="presentation" aria-hidden="true" width="25" height="24" viewBox="0 0 25 24" fill="none" style="width: 24px; height: 24px;">
                        <path d="M13.0381 4.46967C12.7452 4.17678 12.2704 4.17678 11.9775 4.46967C11.6846 4.76256 11.6846 5.23744 11.9775 5.53033L17.7382 11.291H5.46755C5.07557 11.291 4.75781 11.6088 4.75781 12.0008C4.75781 12.3927 5.07557 12.7105 5.46755 12.7105H17.7367L11.9775 18.4697C11.6846 18.7626 11.6846 19.2374 11.9775 19.5303C12.2704 19.8232 12.7452 19.8232 13.0381 19.5303L20.0381 12.5303C20.331 12.2374 20.331 11.7626 20.0381 11.4697L13.0381 4.46967Z" fill="currentColor"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <!---------------------------------Menus Section 4------------------------------------>
    <section class=" mb-5">
        <h2 class="fw-bold text-center mt-5 mb-3">Ven aprobar la experencia rojiblanca</h2>
        <p class=" text-center">Estamos en el corazon del Granada, listos para servirte la mejor burguer con pasion de estadio</p>
        <div class="mapa-iconos d-flex align-items-center justify-content-center mt-4 gap-5 flex-wrap">
                <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12502.055790819906!2d-3.595574440415517!3d37.149191930534286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fb5945fc3401%3A0x7d219a51fb97e3e2!2sEstadi%20Nuevo%20Los%20C%C3%A1rmenes!5e0!3m2!1sca!2ses!4v1767195067093!5m2!1sca!2ses" width="668" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            <div class=" align-content-center d-flex flex-column gap-3">
                <div class=" d-flex">
                    <svg class="maps-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path d="M0 188.6C0 84.4 86 0 192 0S384 84.4 384 188.6c0 119.3-120.2 262.3-170.4 316.8-11.8 12.8-31.5 12.8-43.3 0-50.2-54.5-170.4-197.5-170.4-316.8zM192 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128z" />
                    </svg>
                    <p>Calle reyes Catolicos, Granada</p>
                </div>
                <div class=" d-flex">
                    <svg class="maps-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M160.2 25C152.3 6.1 131.7-3.9 112.1 1.4l-5.5 1.5c-64.6 17.6-119.8 80.2-103.7 156.4 37.1 175 174.8 312.7 349.8 349.8 76.3 16.2 138.8-39.1 156.4-103.7l1.5-5.5c5.4-19.7-4.7-40.3-23.5-48.1l-97.3-40.5c-16.5-6.9-35.6-2.1-47 11.8l-38.6 47.2C233.9 335.4 177.3 277 144.8 205.3L189 169.3c13.9-11.3 18.6-30.4 11.8-47L160.2 25z" />
                    </svg>
                    <p>938-123-456</p>
                </div>
                <div class=" d-flex">
                    <svg class="maps-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M256 0a256 256 0 1 1 0 512 256 256 0 1 1 0-512zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                    </svg>
                    <p>L-D: 12:00-23:00</p>
                </div>
                <div class=" d-flex">
                    <svg class="maps-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M48 64c-26.5 0-48 21.5-48 48 0 15.1 7.1 29.3 19.2 38.4l208 156c17.1 12.8 40.5 12.8 57.6 0l208-156c12.1-9.1 19.2-23.3 19.2-38.4 0-26.5-21.5-48-48-48L48 64zM0 196L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-188-198.4 148.8c-34.1 25.6-81.1 25.6-115.2 0L0 196z" />
                    </svg>
                    <p>Contacto@reyesBurgers.com</p>
                </div>
            </div>
        </div>
    </section>
    <script>
     document.addEventListener("DOMContentLoaded", function() {
    
     //obtenemms variables

    const track = document.querySelector('.slider-track');
    const images = Array.from(document.querySelectorAll('.slider-track img'));
    
    // compruba si existe alguna imaen y obitne el ancho base
    const BASE_IMAGE_WIDTH = images.length > 0 ? images[0].offsetWidth : 0;

    let index = 0;

 
// saber el tamanño de cada image para centrar
  function updateSlider() {
    const container = document.querySelector(".slider-container");
    const containerWidth = container.clientWidth;

    let offset = 0;

    for (let i = 0; i < index; i++) {
        offset += images[i].offsetWidth;
        const gap = parseInt(getComputedStyle(track).gap) || 0;
        offset += gap;
    }
    const currentImage = images[index];
    const currentWidth = currentImage.offsetWidth;

    offset -= (containerWidth / 2) - (currentWidth / 2);

    track.style.transform = `translateX(${-offset}px)`;

    images.forEach(img => img.classList.remove('active', 'side'));
    currentImage.classList.add('active');

    if (images[index - 1]) images[index - 1].classList.add('side');
    if (images[index + 1]) images[index + 1].classList.add('side');

    updateInfoCard();
}

    //actualiza infomracion

    function updateInfoCard() {
        const img = images[index];
        
        // Reemplaza el contenido HTML usando los data-atributos de la imagen activa.
        document.getElementById("burger-info").innerHTML = `
            <div class="info-card shadow p-3">
                <h2 class="fw-bold ">${img.dataset.nombre}</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <p>${img.dataset.desc}</p>
                    <a href="?controller=Producto&action=ver&id=${img.dataset.id}"
                    class="btn btn-primary">Ver más</a>
                </div>
            </div>
        `;
    }

    // Botón Siguiente
    document.getElementById('btn-next').addEventListener('click', () => {
        index = (index + 1) % images.length;
        updateSlider();
    });

    // Botón Anterior
    document.getElementById('btn-prev').addEventListener('click', () => {
        index = (index - 1 + images.length) % images.length;
        updateSlider();
    });

    // Posiciona el slider y carga la informacion inicial al abrir la pagia.
    updateSlider();
});
</script>
