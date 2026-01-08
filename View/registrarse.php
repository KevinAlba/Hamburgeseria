<section class="login d-flex justify-content-center align-items-center">
  <div class="login-container text-center">
    <form action="index.php?controller=Registrarse&action=registrarse" method="POST">     
        <span class="login-title d-block fw-bold">REGISTRO</span>
        <input type="text" name="nombre" class="login-input w-100" placeholder="Nombre" required>        
        <input type="email" name="correo" class="login-input w-100" placeholder="Correo" required>
        <input type="password" name="contrasena" class="login-input w-100" placeholder="Contraseña" required>
        <input type="text" name="telefono" class="login-input w-100" placeholder="Telefono" required>
       <button class="login-botton border-0 text-white w-100">REGISTRARSE</button>
    </form>
  </div>
</section>

