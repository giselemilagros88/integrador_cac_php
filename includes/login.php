<?php ob_start(); ?>
<?php session_start();
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
        if( ($_POST['email']=="administrador") && ($_POST['pass']=='cac') ){
          $_SESSION['usuario']="Admin";
          $_SESSION['logueado']='S';
          #redirecciono porque ingreso ok 
          header("location:../pages/listado_admin.php");
          die();
         // exit;
        }
        else{
           echo '<script> alert("Usuario y/o Contraseña incorrecta");</script>';
           header("location:index.php");
          
           die();
        }
    }?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos-propios.css">
  <link rel="shortcut icon" href="./img/codoacodo-min.png" type="image/x-icon">

  <title>Trabajo Integrador</title>
</head>
<body>
   <header>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="img/codoacodo-min.png" alt="Codo a Codo logo">
                    Conf Bs As
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">La conferencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#oradores">Los oradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#lugar">El lugar y la fecha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#form-orador">Conviértete en orador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-compra-tickets" href="./pages/comprar-tickets.php">Comprar tickets</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <div class="contact-box">
           
           
            <h2>LogIn</h2>
            <form action="login.php" method="post">
                <input type="text" name="email" id="email" class="field" placeholder="Usuario" required>
                <input type="password" name="pass" id="subject" class="field" placeholder="Password" required>
                
                <input type="submit" value="Enviar" class="btn">
                
            </form>
            <p>usuario :administrador </p>
            <p>contraseña:CAC </p>
        </div>
    </main>
    <footer id="main-footer">
        <div class="container">
            <ul class="nav justify-content-center justify-content-lg-between align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="#">Preguntas <span>frecuentes</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contáctanos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prensa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Conferencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Términos y <span>condiciones</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Privacidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Estudiantes</a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>