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
    fetch("http://localhost/Proyecto_Granada/api.php/?controller=Api&action=getUsuarios")
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
                const fila = document.createElement("tr");

                fila.innerHTML = `
                    <td>${usuario.usuario_id}</td>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.correo}</td>
                    <td>${usuario.telefono}</td>
                    <td>${usuario.rol}</td>
                    <td>
                        <button class=" btn ad-btn-primary btn-editar">
                            <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkIcon--edit" role="presentation" aria-hidden="true" width="25" height="24" viewBox="0 0 25 24" fill="none" style="width: 20px; height: 20px;"><g clip-path="url(#:r5:)"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.14199 21.8772C2.08385 22.1292 2.1596 22.3934 2.34246 22.5762C2.52531 22.7591 2.78946 22.8348 3.04143 22.7767L7.63763 21.716C7.79355 21.68 7.9268 21.5979 8.02626 21.4873L8.027 21.488L20.7273 8.78771L22.4469 7.06814L22.4951 7.01994C23.7643 5.75074 23.7643 3.69295 22.4951 2.42375C21.2259 1.15454 19.1681 1.15454 17.8989 2.42375L17.8507 2.47194L16.1311 4.19152L3.43081 16.8918L3.43141 16.8924C3.32082 16.9919 3.23864 17.1251 3.20265 17.2811L2.14199 21.8772ZM4.61583 17.8281L3.87341 21.0453L7.09093 20.3028L19.6666 7.72705L21.3862 6.00748L21.4344 5.95928C22.1178 5.27586 22.1178 4.16783 21.4344 3.48441C20.751 2.80099 19.643 2.80099 18.9595 3.48441L18.9113 3.5326L17.1918 5.25218L4.61583 17.8281Z" fill="currentColor"></path></g><defs><clipPath id=":r5:"><rect width="24" height="24" fill="white" transform="translate(0.652344)"></rect></clipPath></defs></svg>
                        </button>
                        <button class="btn ad-btn-primary" onclick="eliminarUsuario(${usuario.usuario_id})">
                            <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkIcon--delete" role="presentation" aria-hidden="true" width="21" height="22" viewBox="0 0 21 22" fill="none" style="width: 18px; height: 18px;"><path d="M8.5 9.41797C8.91421 9.41797 9.25 9.75376 9.25 10.168V16.168C9.25 16.5822 8.91421 16.918 8.5 16.918C8.08579 16.918 7.75 16.5822 7.75 16.168V10.168C7.75 9.75376 8.08579 9.41797 8.5 9.41797Z" fill="currentColor"></path><path d="M13.25 10.168C13.25 9.75376 12.9142 9.41797 12.5 9.41797C12.0858 9.41797 11.75 9.75376 11.75 10.168V16.168C11.75 16.5822 12.0858 16.918 12.5 16.918C12.9142 16.918 13.25 16.5822 13.25 16.168V10.168Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.75 4.41797V3.16797C5.75 2.43862 6.03973 1.73915 6.55546 1.22343C7.07118 0.7077 7.77065 0.417969 8.5 0.417969H12.5C13.2293 0.417969 13.9288 0.7077 14.4445 1.22343C14.9603 1.73915 15.25 2.43862 15.25 3.16797V4.41797H19.5C19.9142 4.41797 20.25 4.75376 20.25 5.16797C20.25 5.58218 19.9142 5.91797 19.5 5.91797H18.25V19.168C18.25 19.8973 17.9603 20.5968 17.4445 21.1125C16.9288 21.6282 16.2293 21.918 15.5 21.918H5.5C4.77065 21.918 4.07118 21.6282 3.55546 21.1125C3.03973 20.5968 2.75 19.8973 2.75 19.168V5.91797H1.5C1.08579 5.91797 0.75 5.58218 0.75 5.16797C0.75 4.75376 1.08579 4.41797 1.5 4.41797H5.75ZM7.61612 2.28409C7.85054 2.04966 8.16848 1.91797 8.5 1.91797H12.5C12.8315 1.91797 13.1495 2.04966 13.3839 2.28409C13.6183 2.51851 13.75 2.83645 13.75 3.16797V4.41797H7.25V3.16797C7.25 2.83645 7.3817 2.51851 7.61612 2.28409ZM4.25 5.91797H16.75V19.168C16.75 19.4995 16.6183 19.8174 16.3839 20.0519C16.1495 20.2863 15.8315 20.418 15.5 20.418H5.5C5.16848 20.418 4.85054 20.2863 4.61612 20.0519C4.3817 19.8174 4.25 19.4995 4.25 19.168V5.91797Z" fill="currentColor"></path></svg>
                        </button>
                    </td>
                `;

                listarUsuarios.appendChild(fila);


                /****************************Cremoa el modal********************************** */
                const btnEditar = fila.querySelector(".btn-editar");

                btnEditar.addEventListener("click", function () {
                    document.getElementById("modalUsuarioId").value = usuario.usuario_id;
                    document.getElementById("inputNombre").value = usuario.nombre;
                    document.getElementById("inputCorreo").value = usuario.correo;
                    document.getElementById("inputTelefono").value = usuario.telefono;
                    document.getElementById("inputRol").value = usuario.rol;
                    document.getElementById("ventanaModal").style.display = "flex";

                });
            }
            // cerrar
            document.querySelector(".cerrar").addEventListener("click", function () {
                document.getElementById("ventanaModal").style.display = "none";
            });

            // Cerrar haciendo clic fuera 
            window.addEventListener("click", function (event) {
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

        fetch("http://localhost/Proyecto_Granada/api.php/?controller=Api&action=editarUsuario", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify({
                usuario_id: document.getElementById("modalUsuarioId").value,
                nombre: document.getElementById("inputNombre").value,
                correo: document.getElementById("inputCorreo").value,
                contrasena: document.getElementById("inputContrasena").value,
                telefono: document.getElementById("inputTelefono").value,
                rol: document.getElementById("inputRol").value
            })
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

    fetch("http://localhost/Proyecto_Granada/api.php/?controller=Api&action=borrarUsuarios", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify({
            usuario_id: usuario_id
        })
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
document.getElementById("formCrearUsuario").addEventListener("submit", e => {
    e.preventDefault();

    fetch("http://localhost/Proyecto_Granada/api.php/?controller=Api&action=crearUsuario", {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify({
            nombre: document.getElementById("crearNombre").value,
            correo: document.getElementById("crearCorreo").value,
            contrasena: document.getElementById("crearContrasena").value,
            telefono: document.getElementById("crearTelefono").value
        })
    })
        .then(res => res.json())
        .then(data => {
            if (data.ok) {
                alert("Usuario creado");
                e.target.reset();
                cargarUsuarios();
            } else {
                alert(data.error || "Error");
            }
        });
});