<section class="p-5">
  <div class="d-flex justify-content-end">
    <form action="index.php?controller=IniciarSession&action=cerrarSession" method="POST">
      <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
          <svg color="currentColor" class="sc-f566aa5-0 MkIcon MkHeaderLogin__fanMenuButton__logOutIcon MkIcon--logout" role="presentation" aria-hidden="true" width="25" height="24" viewBox="0 0 25 24" fill="none" style="width: 16px; height: 16px;"><path d="M5.46875 3.75C5.13723 3.75 4.81929 3.8817 4.58487 4.11612C4.35045 4.35054 4.21875 4.66848 4.21875 5V19C4.21875 19.3315 4.35045 19.6495 4.58487 19.8839C4.81929 20.1183 5.13723 20.25 5.46875 20.25H9.46875C9.88296 20.25 10.2188 20.5858 10.2188 21C10.2188 21.4142 9.88296 21.75 9.46875 21.75H5.46875C4.7394 21.75 4.03993 21.4603 3.52421 20.9445C3.00848 20.4288 2.71875 19.7293 2.71875 19V5C2.71875 4.27065 3.00848 3.57118 3.52421 3.05546C4.03993 2.53973 4.7394 2.25 5.46875 2.25H9.46875C9.88296 2.25 10.2188 2.58579 10.2188 3C10.2188 3.41421 9.88296 3.75 9.46875 3.75H5.46875Z" fill="currentColor"></path><path d="M15.9384 6.46967C16.2313 6.17678 16.7062 6.17678 16.9991 6.46967L21.9991 11.4697C22.1455 11.6161 22.2188 11.8081 22.2188 12C22.2188 12.1017 22.1985 12.1987 22.1618 12.2871C22.1252 12.3755 22.071 12.4584 21.9991 12.5303L16.9991 17.5303C16.7062 17.8232 16.2313 17.8232 15.9384 17.5303C15.6455 17.2374 15.6455 16.7626 15.9384 16.4697L19.6581 12.75H9.46875C9.05454 12.75 8.71875 12.4142 8.71875 12C8.71875 11.5858 9.05454 11.25 9.46875 11.25H19.6581L15.9384 7.53033C15.6455 7.23744 15.6455 6.76256 15.9384 6.46967Z" fill="currentColor"></path></svg>
          <p class="mb-0">Cerrar sesión</p>
      </button>
    </form>
  </div>

  <div class=" d-flex justify-content-center align-items-center">
    <div class="card-usuario p-4">
      <h1 class="login-title d-block fw-bold text-center">Editar Perfil</h1>
      <form action="index.php?controller=Usuario&action=editarPerfil" method="POST">
          <input type="hidden" name="id" value="<?= $_SESSION['usuario_id'] ?>">
          <p class=" m-0 fw-bold">Nombre:</p>
          <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre'])?>"  class="login-input w-100 " required>
          <p class=" m-0 fw-bold">Correo:</p>
          <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo'])?>" class="login-input w-100" required>
          <p class=" m-0 fw-bold">Contraseña (opcional):</p>
          <input type="password" name="contrasena" class="login-input w-100">
          <p class=" m-0 fw-bold">Teléfono:</p>
          <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono'])?>" class="login-input w-100" required>
          <div class=" text-center">
            <button class=" btn btn-primary border-0 text-white w-50 mt-4">Guardar cambios </button>
          </div>
      </form>
    </div>
  </div>
</section>
