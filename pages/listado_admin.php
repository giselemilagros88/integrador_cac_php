<?php include '../includes/conexion.php'; ?>

<?php $conexion = new conexion();
 $oradores= $conexion->consultar("SELECT * FROM `oradores`");
 ?>
 <?php
        #si nos envian por url, get 
        if($_GET){

            #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
        if(isset($_GET['borrar'])){
                $id_orador = $_GET['borrar'];
                $conexion = new conexion();

                #recuperamos la imagen de la base antes de borrar 
                $imagen = $conexion->consultar("select imagen FROM  `oradores` where id_orador=".$id_orador);
                #la borramos de la carpeta 
                unlink("../assets/upload/".$imagen[0]['imagen']);

                #borramos el registro de la base 
                $sql ="DELETE FROM `oradores` WHERE `oradores`.`id_orador` =".$id_orador; 
                $id_orador = $conexion->ejecutar($sql);
                #para que no intente borrar muchas veces
                header("Location:listado_admin.php");
                die();
            }

        if(isset($_GET['modificar'])){
                $id_orador = $_GET['modificar'];
                header("Location:../includes/modificar.php?modificar=".$id_orador);
                die();
            }
        } 
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $oradores= $conexion->consultar("SELECT * FROM `oradores`");
?> 

 <?php include_once("../includes/header.php")?>

    <main class="container mt-5 overflow-hidden">
       <h2 class="titulo-gral">CONOCE TODOS NUESTROS ORADORES</h2>
       <section class="mt-5 overflow-auto">
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php #leemos proyectos 1 por 1
                        foreach($oradores as $orador){ 
                    ?>
                        <tr>
                            <th scope="row"><?php echo $orador['id_orador'];?></th>
                            <td> <img class="img-fluid img-thumbnail" style="object-fit:cover;" width="150" height="150" src="<?php echo BASE_URL; ?>assets/upload/<?php echo $orador['imagen'];?>" alt="<?php echo $orador['nombre'];?>">  </td>
                            <td><?php echo $orador['nombre'];?></td>
                            <td><?php echo $orador['apellido'];?></td>
                            <td><?php echo $orador['mail'];?></td>
                            <td><?php echo $orador['tema'];?></td>
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $orador['id_orador'];?>">Eliminar</a></td>
                            <td><a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $orador['id_orador'];?>">Modificar</a></td>
                        </tr>
                    
                    <?php #leemos proyectos 1 por 1
                    }
                    ?>
                    </tbody>
            </table>

        </section>

    </main>
    <?php include_once("../includes/footer.php")?>