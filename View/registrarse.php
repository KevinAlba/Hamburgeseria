<style>
  .login{
    background-image: url("Public/Imagenes/FondoMenus.png");   
    background-size: cover;     
    background-position: center;
    background-repeat: no-repeat; 
    min-height: 750px;  
  }
.login .bg-overlay {
    position: absolute;
    top: 92px;
    left: 0;
    width: 100%;
    height: 750px;
    background-color: #000000ff;
    opacity: 0.8;    
    z-index: 1;       
}
.login > *:not(.bg-overlay) {
    position: relative;
    z-index: 2;
}

  .login-container{
    background: white;
    padding: 35px 40px;
    border-radius: 15px;
    width: 350px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  }

  .login-title{
    font-size: 24px;
    color: #D5001C;
    margin-bottom: 25px;
   
  }

  .login-input{
    padding: 12px 15px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
  }

  .login-botton{
    padding: 12px 15px;
    background-color: #D5001C;
    border-radius: 10px;
    font-size: 16px;
    margin-top: 10px;
  }

  .login-botton:hover{
    background-color: #C1001A;
  }
</style>
<section class="login d-flex justify-content-center align-items-center">
    <div class="bg-overlay"></div>
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

