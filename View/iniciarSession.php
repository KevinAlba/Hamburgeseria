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
    background-color: #D5001C;
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

  .login-dividir{
    margin: 20px 0;
    font-size: 14px;
    color: #777;
  }

  .login-registrarse{
    color: #D5001C;
  }

  .login-registrarse:hover{
    text-decoration: underline;
    color: #C1001A;
  }
</style>
<section class="login d-flex justify-content-center align-items-center">
   <!-- <div class="bg-overlay"></div>-->
  <div class="login-container text-center">
    <form action="index.php?controller=IniciarSession&action=iniciarSession" method="POST">     
    <span class="login-title d-block fw-bold">LOGIN</span>
      <input type="email" name="correo" class="login-input w-100" placeholder="Correo" required>
      <input type="password" name="contrasena" class="login-input w-100" placeholder="Contraseña" required>


       <button class="login-botton border-0 text-white w-100">INICIAR SESIÓN</button>
    </form>

    <p class="login-dividir">---------------- O ----------------</p>

    <a class="login-registrarse text-decoration-none fw-bold" href="http://localhost/Proyecto_Granada/?controller=Registrarse&action=index">REGÍSTRATE AHORA</a>
  </div>
</section>

