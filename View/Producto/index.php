<table>
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Precio</td>
        <td>Categoria</td>
        <td>Oferta</td>
    </tr>
    <?php 
    
        foreach($listaProductos as $producto){ ?>
        <tr>
            <td><?=$producto->getproducto_id()?></td>
            <td><?=$producto->getnombre()?></td>
            <td><?=$producto->getdescripcion()?></td>
            <td><?=$producto->getprecio()?></td>    
            <td><?=$producto->getcategoria_id()?></td>
            <td><?=$producto->getoferta_id()?></td>
            <td><a href="?controller=Producto&action=show&producto_id=<?=$producto->getproducto_id() ?>">link</a></td>
        </tr>
        <?php } ?>
</table>