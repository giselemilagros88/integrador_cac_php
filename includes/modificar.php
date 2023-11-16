<?php include 'conexion.php'; ?>

<?php include 'header.php'; 
if($_GET){
    if(isset($_GET['modificar'])){
        $id_orador = $_GET['modificar'];
       
        $_SESSION['id_orador'] = $id_orador;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $oradores= $conexion->consultar("SELECT * FROM `oradores` where id_orador=".$id_orador);
     
    }
}
if($_POST){
    $conexion = new conexion();
    $id_orador = $_SESSION['id_orador'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
    #la borramos de la carpeta 
    unlink("../assets/upload/".$imagen[0]['imagen']);
   
   
    #levantamos los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $tema = $_POST['tema'];
    #nombre de la imagen
    $imagen_form = $_FILES['archivo']['name'];
  
        
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen_form= $fecha->getTimestamp()."_".$imagen_form;
    move_uploaded_file($imagen_temporal,"../assets/upload/".$imagen_form);
    
   
   
    #creo una instancia(objeto) de la clase de conexion
   
    $sql = "UPDATE `oradores` SET `nombre` = '$nombre' , `imagen` = '$imagen_form', `apellido` = '$apellido' , `tema` = '$tema', `mail` = '$email'    WHERE `oradores`.`id_orador` = '$id_orador';";
    $id_orador = $conexion->ejecutar($sql);

    header("location:../pages/listado_admin.php");
    die(); 
}
?>
<main class="overflow-hidden"> 
<?php #leemos proyectos 1 por 1

  foreach($oradores as $orador){ ?>
    <div class="row d-flex justify-content-center mt-5 mb-5">
            <div class="mt-5 col-md-10 col-sm-12">
                <div class="card bg-light">
                    <div class="card-header mt-5 text-center">
                       Modificar datos del orador
                    </div>
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row gx-2">
                                <div class="col-md mb-3">
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" aria-label="Nombre" required value="<?php echo $orador['nombre']; ?>">
                                </div>
                                <div class="col-md mb-3">
                                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" aria-label="Apellido" required value="<?php echo $orador['apellido']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="Email" required value="<?php echo $orador['mail']; ?>">
                                </div>
                            </div>
                            <div>
                            <label for="archivo">Imagen actual del Orador</label>
                            </div>
                            <div class="d-flex justify-content-center align-item-center">
                                
                                <img class="img-fluid img-thumbnail" width="200" src="../assets/upload/<?php echo $orador['imagen']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="archivo">Imagen Nueva del Orador</label>
                                <input required class="form-control" type="file" name ="archivo" id="archivo">
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <textarea class="form-control" name="tema" id="tema" rows="4"
                                        placeholder="Sobre qué quieres hablar?" required><?php echo $orador['tema']; ?></textarea>
                                    <div id="emailHelp" class="form-text mb-3">Recuerda incluir un título para tu charla.</div>
                                    <div class="d-grid">
                                        <input type="submit" class="btn btn-lg btn-form">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!--cierra el body-->
        
                </div><!--cierra el card-->
                
            </div><!--cierra el col-->
        </div><!--cierra el row-->
        <?php #cerramos la llave del foreach
                        } ?>
</main>

<?php include 'footer.php'; ?>