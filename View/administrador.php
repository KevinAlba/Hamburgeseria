<style>
    .selecionar-sidebar {
        display: none;
    }

    .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    inset: 0;
    background: rgba(0,0,0,0.5);
    justify-content: center;
    align-items: center;
}

.contenido-modal {
    background: white;
    padding: 20px;
    border-radius: 8px;
    min-width: 300px;
}

.cerrar {
    cursor: pointer;
    font-size: 24px;
}

</style>
<section class=" d-flex">
    <aside class="ad-sidebar">
        <ul class="ad-sidebar-list">
            <!---------Categorias------->
            <li class="ad-sidebar-element">
                <svg class="ad-sidebar-icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M0 188.6C0 84.4 86 0 192 0S384 84.4 384 188.6c0 119.3-120.2 262.3-170.4 316.8-11.8 12.8-31.5 12.8-43.3 0-50.2-54.5-170.4-197.5-170.4-316.8zM192 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128z" />
                </svg>
                <div class="ad-sidebar-hide">
                    <button class="ad-sidebar-button" data-section="categorias">Categorias</button>
                </div>
            </li>
            <!---------Productos------->
            <li class="ad-sidebar-element">
                <svg class="ad-sidebar-icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M0 188.6C0 84.4 86 0 192 0S384 84.4 384 188.6c0 119.3-120.2 262.3-170.4 316.8-11.8 12.8-31.5 12.8-43.3 0-50.2-54.5-170.4-197.5-170.4-316.8zM192 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128z" />
                </svg>
                <div class="ad-sidebar-hide">
                    <button class="ad-sidebar-button" data-section="productos">Productos</button>
                </div>
            </li>
            <!---------Usuario------->
            <li class="ad-sidebar-element">
                <svg class="ad-sidebar-icono" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path d="M0 188.6C0 84.4 86 0 192 0S384 84.4 384 188.6c0 119.3-120.2 262.3-170.4 316.8-11.8 12.8-31.5 12.8-43.3 0-50.2-54.5-170.4-197.5-170.4-316.8zM192 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128z" />
                </svg>
                <div class="ad-sidebar-hide">
                    <button class="ad-sidebar-button" data-section="usuarios">Usuarios</button>
                </div>
            </li>
        </ul>
    </aside>
    <section class="selecionar-sidebar" data-section="categorias">
        Categorías
    </section>
    <section class="selecionar-sidebar" data-section="productos">
        Productos
    </section>
    <section class="selecionar-sidebar" data-section="usuarios">
        Usuarios
        <div id="listarUsuarios" class="ad-usuarios"> </div>

        <!-- Ventana modal -->
        <div id="ventanaModal" class="modal">
            <div class="contenido-modal">
                <span class="cerrar">&times;</span>
                <div>
                    <h2 class="tituloPrincipalModal">Usuario</h2>
                </div>
                <form id="formEditarUsuario">
                     <input type="hidden" id="modalUsuarioId">
                    <div>
                        <label for="">Nombre: </label>       
                        <input type="text" id="inputNombre">
                    </div>
                    <div>
                        <label for="">Correo: </label>
                        <input type="email" id="inputCorreo">
                    </div>
                   <div> 
                       <label for="">Contraseña: </label>
                       <input type="password" id="inputContrasena">
                    </div>
                    <div>
                       <label for="">Teléfono: </label>
                       <input type="text" id="inputTelefono">
                   </div>
                   <div>
                       <label for="">Rol: </label>
                       <input type="text" id="inputRol">
                   </div>
                   <div>
                        <button  type="submit"  class="login-botton border-0 text-white w-100">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
</section>
<script>
    /********************Usuarios****************** */
    class Usuario {
        constructor(usuario_id, nombre, correo, contrasena, telefono, rol) {
            this.usuario_id = usuario_id;
            this.nombre = nombre;
            this.correo = correo;
            this.contrasena = contrasena;
            this.telefono = telefono;
            this.rol = rol;
        }
    }
    const cargarUsuarios = () => {
        fetch("http://localhost/Proyecto_Granada/api.php/?controller=Usuario&action=getUsuarios")
            .then(respuesta => respuesta.json())
            .then(data => {

                const listarUsuarios = document.getElementById("listarUsuarios");
                listarUsuarios.innerHTML = "";
                const usuarios = data.map(u => new Usuario(
                    u.usuario_id,
                    u.nombre,
                    u.correo,
                    u.contrasena,
                    u.telefono,
                    u.rol
                ));
                //Con esto mostramo  por consola la api
                /*   usuarios.forEach(usuario =>{
                      console.log('usuario: ', usuario);
                  })*/

                for (const usuario of usuarios) {
                    const usuarioDiv = document.createElement("div");
                    usuarioDiv.classList.add("ad-usuario-card");
                    usuarioDiv.innerHTML = `
                        <h3>ID: ${usuario.usuario_id}</h3>
                        <p>Nombre: ${usuario.nombre}</p>
                        <p>Correo: ${usuario.correo}</p>
                        <p>Teléfono: ${usuario.telefono}</p>
                        <p class="usuario-rol">Rol: ${usuario.rol}</p>

                        <div class=" d-flex">
                            <button class="btn btn-primary btn-editar">
                                Editar
                            </button>
                            <button class="btn btn-primary" onclick="eliminarUsuario(${usuario.usuario_id})">
                                Eliminar
                            </button>                      
                        </div>
                    `;
                    listarUsuarios.appendChild(usuarioDiv);


                    /****************************Cremoa el modal********************************** */
                    const btnEditar = usuarioDiv.querySelector(".btn-editar");

                    btnEditar.addEventListener("click", function() {
                        document.getElementById("modalUsuarioId").value = usuario.usuario_id;
                        document.getElementById("inputNombre").value = usuario.nombre;
                        document.getElementById("inputCorreo").value = usuario.correo;
                        document.getElementById("inputTelefono").value = usuario.telefono;
                        document.getElementById("inputRol").value = usuario.rol;

                        document.getElementById("ventanaModal").style.display = "flex";

                    });
                }
                 // cerrar
                    document.querySelector(".cerrar").addEventListener("click", function() {
                        document.getElementById("ventanaModal").style.display = "none";
                    });

                    // Cerrar haciendo clic fuera 
                    window.addEventListener("click", function(event) {
                        const modal = document.getElementById("ventanaModal");
                        if (event.target === modal) {
                            modal.style.display = "none";
                        }
                    });
            })
    }
    document.addEventListener("DOMContentLoaded", () => {

            const formEditar = document.querySelector("#ventanaModal form");

        formEditar.addEventListener("submit", e => {
            e.preventDefault();

            const datos = new URLSearchParams({
                usuario_id: document.getElementById("modalUsuarioId").value,
                nombre: document.getElementById("inputNombre").value,
                correo: document.getElementById("inputCorreo").value,
                contrasena: document.getElementById("inputContrasena").value,
                telefono: document.getElementById("inputTelefono").value,
                rol: document.getElementById("inputRol").value
            });

            fetch("http://localhost/Proyecto_Granada/api.php/?controller=Usuario&action=editarUsuario", {
                method: "PUT",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: datos.toString()
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    alert("Usuario actualizado");
                    document.getElementById("ventanaModal").style.display = "none";
                    document.getElementById("inputContrasena").value = "";
                    cargarUsuarios();
                }
            });
        });
     });


    function eliminarUsuario(usuario_id) {
        if (!confirm("¿Seguro que quieres eliminar este usuario?")) return;

        fetch("http://localhost/Proyecto_Granada/api.php/?controller=Usuario&action=borrarUsuarios", {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `usuario_id=${usuario_id}`
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    alert("Usuario eliminado");
                    cargarUsuarios();
                } else {
                    alert("Error al eliminar");
                }
            });
    }

    const buttons = document.querySelectorAll('.ad-sidebar-button');
    const sections = document.querySelectorAll('.selecionar-sidebar');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const target = button.dataset.section;

            sections.forEach(section => {
                section.style.display =
                    section.dataset.section === target ? 'block' : 'none';
            });

            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            if (target === 'usuarios') {
                cargarUsuarios();
            }
        });
    });
</script>