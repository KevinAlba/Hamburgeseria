<style>
.confirmacion {
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    font-family: 'Arial', sans-serif;
    color: #333;
}

.confirmacion h1 {
    text-align: center;
    font-size: 32px;
    color: #D5001C;
    margin-bottom: 25px;
    font-weight: bold;
}
.confirmacion h2 {
    color: black;
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 10px;
    font-size: 1.6em;
    border-bottom: 2px solid #D5001C;
    padding-bottom: 5px;
}

.confirmacion h3 {
    color: black;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 10px;
}

.confirmacion p {
    line-height: 1.6;
    font-size: 1em;
}

.confirmacion table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.confirmacion table th,
.confirmacion table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.confirmacion table th {
    background-color: #D5001C;
    color: white;
    font-weight: bold;
}

.confirmacion hr {
    border: none;
    border-top: 1px solid #ddd;
    margin: 20px 0;
}

.confirmacion .btn {
    display: inline-block;
    padding: 12px 25px;
    margin-top: 20px;
    background-color: #D5001C;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;}

.confirmacion .btn:hover {
    background-color: #a40016;
}


</style>

<section class="confirmacion">

    <h1>Pedido confirmado</h1>
    <p> Gracias por tu pedido,<strong><?= $_SESSION['nombre'] ?? 'cliente' ?></strong></p>
    <div>
        <strong>Nº de pedido:</strong> <?= $pedido['pedido_id'] ?><br>
        <strong>Fecha:</strong> <?= $pedido['fecha'] ?><br>
        <strong>Estado:</strong> <?= ucfirst($pedido['estado']) ?>
    </div>
    <h2>Productos</h2>
    <table  cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lineas as $linea): ?>
                <tr>
                    <td><?= $linea->getNombre() ?></td>
                    <td><?= $linea->getCantidad() ?></td>
                    <td><?= $linea->getPrecioUnitario(), 2 ?> €</td>
                    <td><?= $linea->getCantidad() * $linea->getPrecioUnitario(), 2 ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Total del pedido</h3>
    <p> <strong><?= number_format($pedido['total'], 2) ?> €</strong></p>

    <hr>
    <div>
        <h3>Dirección de entrega</h3>
        <p>Direccion:<?= htmlspecialchars($pedido['direccion']) ?></p>
        <P>Codigo postal: <?= htmlspecialchars($pedido['codigo_postal']) ?></P>
        <P>Telefono: <?= htmlspecialchars($pedido['telefono']) ?></P>
    </div>

    <a href="index.php?controller=Home&action=index" class="btn btn-success"> Volver al inicio </a>

</section>
