<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Public/CSS/styles.css">
    <style>
        .slider-container {
            width: 600px;
            /* espacio visible: centra la imagen grande */
            overflow: hidden;
            margin: auto;
        }

        .slider-track {
            display: flex;
            align-items: center;
            transition: transform 0.4s ease;
            gap: 40px;
            /* separa las imágenes */
        }

        .slider-track img {
            width: 408px;
            height: 274px;
            opacity: 0.4;
            transform: scale(0.7);
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .slider-track img.active {
            transform: scale(1);
            opacity: 1;
        }

        .slider-track img.side {
            transform: scale(0.85);
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <section id="homeSection3" class="mt-5 position-relative pb-5">
        <div class="align-items-center d-flex flex-column justify-content-center">
            <div class="slider-container">
                <div class="slider-track">
                    <!--  <img src="../Public/Imagenes/Productos/clasica.png">
                <img src="../Public/Imagenes/Productos/cheeseburger.png" >
                <img src="../Public/Imagenes/Productos/baconlovers.png">
                <img src="../Public/Imagenes/Productos/granadina.png">
                <img src="../Public/Imagenes/Productos/alhambra.png" >
                <img src="../Public/Imagenes/Productos/nazari.png" >
                <img src="../Public/Imagenes/Productos/rojiblanca.png" >
                <img src="../Public/Imagenes/Productos/crispychicken.png">
                <img src="../Public/Imagenes/Productos/pollopicante.png" >
                <img src="../Public/Imagenes/Productos/chickenclub.png">
                <img src="../Public/Imagenes/Productos/veggie.png">
                <img src="../Public/Imagenes/Productos/mediterranea.png"> -->
                    <div class="slider-track">
                        <?php foreach ($listaProductos as $producto): ?>
                            <img
                                src="../Public/Imagenes/Productos/<?= $producto->getImagen() ?>"
                                data-id="<?= $producto->getPRODUCTO_ID() ?>"
                                data-nombre="<?= $producto->getNOMBRE() ?>"
                                data-desc="<?= $producto->getDESCRIPCION() ?>">
                        <?php endforeach; ?>
                    </div>
                    <div id="burger-info" class="info-card mt-4 text-center"></div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <button id="btn-prev" class="nav-btn btn btn-secondary d-flex">
                    <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkIcon--arrowLeft" role="presentation" aria-hidden="true" width="25" height="24" viewBox="0 0 25 24" fill="none" style="width: 24px; height: 24px;">
                        <path d="M12.6319 5.53033C12.9248 5.23744 12.9248 4.76256 12.6319 4.46967C12.339 4.17678 11.8641 4.17678 11.5712 4.46967L4.57123 11.4697C4.27834 11.7626 4.27834 12.2374 4.57123 12.5303L11.5712 19.5303C11.8641 19.8232 12.339 19.8232 12.6319 19.5303C12.9248 19.2374 12.9248 18.7626 12.6319 18.4697L6.87455 12.7123H19.1399C19.533 12.7123 19.8516 12.3937 19.8516 12.0007C19.8516 11.6077 19.533 11.2891 19.1399 11.2891H6.87316L12.6319 5.53033Z" fill="currentColor"></path>
                    </svg>
                </button>
                <button id="btn-next" class="nav-btn btn btn-secondary d-flex ">
                    <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkIcon--arrowRight" role="presentation" aria-hidden="true" width="25" height="24" viewBox="0 0 25 24" fill="none" style="width: 24px; height: 24px;">
                        <path d="M13.0381 4.46967C12.7452 4.17678 12.2704 4.17678 11.9775 4.46967C11.6846 4.76256 11.6846 5.23744 11.9775 5.53033L17.7382 11.291H5.46755C5.07557 11.291 4.75781 11.6088 4.75781 12.0008C4.75781 12.3927 5.07557 12.7105 5.46755 12.7105H17.7367L11.9775 18.4697C11.6846 18.7626 11.6846 19.2374 11.9775 19.5303C12.2704 19.8232 12.7452 19.8232 13.0381 19.5303L20.0381 12.5303C20.331 12.2374 20.331 11.7626 20.0381 11.4697L13.0381 4.46967Z" fill="currentColor"></path>
                    </svg>
                </button>
            </div>

        </div>
    </section>
    <script>
       /* const track = document.querySelector('.slider-track');
        const images = Array.from(document.querySelectorAll('.slider-track img'));

        let index = 0;

        function updateSlider() {
            const imageWidth = 508;
            const gap = 40;

            // Calcula el desplazamiento correcto para que la imagen activa quede centrada
            const offset = (imageWidth + gap) * index;

            track.style.transform = `translateX(calc(300px - ${offset}px))`;

            // Quitar clases
            images.forEach(img => img.classList.remove('active', 'side'));

            // Imagen central
            images[index].classList.add('active');

            // Imágenes laterales
            if (images[index - 1]) images[index - 1].classList.add('side');
            if (images[index + 1]) images[index + 1].classList.add('side');
        }

        document.getElementById('btn-next').addEventListener('click', () => {
            index++;
            if (index >= images.length) index = 0;
            updateSlider();
        });

        document.getElementById('btn-prev').addEventListener('click', () => {
            index--;
            if (index < 0) index = images.length - 1;
            updateSlider();
        });

        updateSlider();*/
const track = document.querySelector('.slider-track');
const images = Array.from(document.querySelectorAll('.slider-track img'));

let index = 0;

function updateSlider() {
    const imageWidth = 508;
    const gap = 0;

    track.style.transform = `translateX(${-(imageWidth + gap) * index + 100}px)`;

    images.forEach(img => img.classList.remove('active', 'side'));

    images[index].classList.add('active');

    if (images[index - 1]) images[index - 1].classList.add('side');
    if (images[index + 1]) images[index + 1].classList.add('side');

    updateInfoCard();
}

function updateInfoCard() {
    const img = images[index];

    const id = img.dataset.id;
    const nombre = img.dataset.nombre;
    const desc = img.dataset.desc;

    document.getElementById("burger-info").innerHTML = `
        <div class="card shadow p-3">
            <h2 class="fw-bold">${nombre}</h2>
            <p>${desc}</p>
            <a href="index.php?ProductoControllerr=Productos&action=show&PRODUCTO_ID=${id}"
               class="btn btn-primary">
               Ver más
            </a>
        </div>
    `;
}

document.getElementById('btn-next').addEventListener('click', () => {
    index++;
    if (index >= images.length) index = 0;
    updateSlider();
});

document.getElementById('btn-prev').addEventListener('click', () => {
    index--;
    if (index < 0) index = images.length - 1;
    updateSlider();
});

updateSlider();
</script>

        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>