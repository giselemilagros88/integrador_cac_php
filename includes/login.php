<?php ob_start();
session_start(); ?>
<?php 
    #validar datos
    if ($_POST){
      #conexion a la base
      #mail
      #contraseña
      #es_admin s o n 
      /*
      select mail, pass
      from usuarios where
      es_admin = 'S';*/
      /* USUARIOS["mail"] */
        if( ($_POST['email']=="administrador") && ($_POST['password']=='cac') ){
          $_SESSION['usuario']="Admin";
          $_SESSION['logueado']='S';
          #redirecciono porque ingreso ok 
          header("location:../pages/listado_admin.php");
          die();
         // exit;
        }
        else{
           $_SESSION['usuario'] = $_POST['email'];
           header("location:../pages/listado.php");
          
           die();
        }
    }?>
    <?php include_once("../includes/header.php")?>
    <main class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <h2 class="text-center">LogIn</h2>
            <div class="col-6">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                
                    <input type="submit" class="btn btn-success text-center">
                </form>
                <p>usuario :administrador </p>
                <p>contraseña:CAC </p>
            </div>
            
        </div>
    </main>
    <?php include_once("../includes/footer.php")?>