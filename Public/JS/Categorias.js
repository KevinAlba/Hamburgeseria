class Categoria {
    constructor(categoria_id, nombre_categoria, categoria_padre) {
        this.categoria_id = categoria_id;
        this.nombre_categoria = nombre_categoria;
        this.categoria_padre = categoria_padre;
    }
}

const cargarCategorias = () => {
    fetch("http://localhost/Proyecto_Granada/api.php/?controller=Api&action=getCategorias")
        .then(respuesta => respuesta.json())
        .then(data => {

            const listarCategorias = document.getElementById("listarCategorias");
            listarCategorias.innerHTML = "";
            const categorias = data.map(c => new Categoria(
                c.categoria_id,
                c.nombre_categoria,
                c.categoria_padre,        
            ));
        
            for (const categoria of categorias) {
                const fila = document.createElement("tr");

                fila.innerHTML = `
                    <td>${categoria.categoria_id}</td>
                    <td>${categoria.nombre_categoria}</td>
                    <td>${categoria.categoria_padre}</td>
                `;

                listarCategorias.appendChild(fila);
            }
        })
}