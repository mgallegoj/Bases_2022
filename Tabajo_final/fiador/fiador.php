<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
<!DOCTYPE html>
<html lang="en">
<!--cabezera del html -->

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>Fiador</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
    <li class="nav nav-pills">
            <a class="nav-link active" href="../index.html">Inicio</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="../fiador/fiador.php">Insertar fiador</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../empeno/empeno.php">Insertar empeño</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="../contrato/contrato.php">Insertar contrato</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="../consultas/consultas.php">Consultas</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="../busquedas/busquedas.php">Busquedas</a>
        </li>

    </ul>
    <div class="container mt-3">
        <div class="row">
            <?php
                if(isset($_GET["cedula"])){
             ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar fiador
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="actualizar_f.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Número de cedula</label>
                                <input type="text" readonly name="cedula" value=<?=$_GET["cedula"];?> id="cedula"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value='<?=$_GET["nombre"];?>' id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" value='<?=$_GET["direccion"];?>' id="direccion" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Numero de celular</label>
                                <input type="text" name="telefono" value=<?=$_GET["telefono"];?> id="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Correo electronico</label>
                                <?php
                                    if ($_GET["correo"] == NULL){?>
                                        <input type="text" name="correo" value="" id="correo" class="form-control">        
                                    <?php } else { ?>
                                        <input type="text" name="correo" value=<?=$_GET["correo"];?> id="correo" class="form-control">
                                    <?php } ?>  
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="fiador.php" class="btn btn-danger">Descartar</a>
                                
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <?php
           }
        else{
             ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Insertar fiador
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insertar_f.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Número de cédula</label>
                                <input type="text" name="cedula" id="cedula" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Número de celular</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Correo electrónico</label>
                                <input type="text" name="correo" id="correo" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                                <a href="fiador.php" class="btn btn-success">Borrar</a>
                            </div>
                            

                        </form>

                    </div>
                </div>
            </div>

            <?php
        }
        ?>
            <div class="col-6 px-2">

                <table class="table border-rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Número de cédula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Número de celular</th>
                            <th scope="col">Correo electrónico</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require('seleccionar_f.php');
                        if($result){
                            foreach ($result as $fila){
                        ?>
                        <tr>
                            <td><?=$fila['numero_de_cedula'];?></td>
                            <td><?=$fila['nombre'];?></td>
                            <td><?=$fila['direccion'];?></td>
                            <td><?=$fila['numero_de_celular'];?></td>
                            <td><?=$fila['correo_electronico'];?></td>
                            
                            <td>
                                <form action="eliminar_f.php" method="POST">
                                    <input type="text" value=<?=$fila['numero_de_cedula'];?> hidden>
                                    <input type="text" name="d" value=<?=$fila['numero_de_cedula'];?> hidden>
                                    <button class="btn btn-danger" title="Eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                            <td class="mx-0 pr-2">
                                <form action="fiador.php" method="GET">
                                    
                                    <input type="text" name="cedula" value="<?=$fila['numero_de_cedula'];?>" hidden>
                                    <input type="text" name="nombre" value="<?=$fila['nombre'];?>" hidden>
                                    <input type="text" name="direccion" value="<?=$fila['direccion'];?>" hidden>
                                    <input type="text" name="telefono" value="<?=$fila['numero_de_celular'];?>" hidden>
                                    <input type="text" name="correo" value="<?=$fila['correo_electronico'];?>" hidden>

                                    <button class="btn btn-primary" title="Editar" type="submit"><i
                                            class="far fa-edit"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php                    

                                }
                            }
                            
                            ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
</body>

</html>