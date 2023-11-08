<?php include 'conexion.php'; ?>
<?php $conexion = new conexion();
 /*$sql = "SELECT * FROM `oradores`";
 $datos = $conexion->consultar($sql);*/
 $oradores= $conexion->consultar("SELECT * FROM `oradores`");
 ?>
<!doctype html>
<html lang="es">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos-propios.css">
    <link rel="shortcut icon" href="./img/codoacodo-min.png" type="image/x-icon">

    <title>Trabajo Integrador</title>
    <style>
        body{
            display:grid;
            grid-template-rows: auto 1fr auto;
            min-height: 100vh;
            grid-template-areas: "header"
                                "main"
                                "footer";
        }
        header{
            grid-area: header;
        }
        main{
            grid-area: main;
        }
        footer{
            grid-area: footer;
        }
    </style>
    </head>
    <body>

    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
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
                            <a class="nav-link active" aria-current="page" href="../index.php">La conferencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php#oradores">Los oradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php#lugar">El lugar y la fecha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php#form-orador">Conviértete en orador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-compra-tickets" href="comprar-tickets.php">Comprar tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../includes/login.php">LogIn</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
       <h2 class="titulo-gral">CONOCE TODOS NUESTROS ORADORES</h2>
       <section class="mt-5">
       <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Tema</th>
                </tr>
            </thead>
            
            <tbody>
            <?php #leemos proyectos 1 por 1
                foreach($oradores as $orador){ 
            ?>
                <tr>
                    <th scope="row"><?php echo $orador['id_orador'];?></th>
                    <td><?php echo $orador['nombre'];?></td>
                    <td><?php echo $orador['apellido'];?></td>
                    <td><?php echo $orador['tema'];?></td>
                </tr>
               
            <?php #leemos proyectos 1 por 1
              }
            ?>
            </tbody>
            </table>

       </section>

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