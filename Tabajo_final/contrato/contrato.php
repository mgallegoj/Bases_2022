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
    <title>Contrato</title>
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
    </ul>
    <div class="container mt-3">
        <div class="row">
            <?php
                if(isset($_GET["codigo"])){
             ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar fiador
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="actualizar_c.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Código</label>
                                <input type="text" readonly name="codigo" value=<?=$_POST["cedula"];?> id="cedula"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value='<?=$_POST["nombre"];?>' id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" value='<?=$_POST["direccion"];?>' id="direccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Numero de celular</label>
                                <input type="text" name="telefono" value=<?=$_POST["telefono"];?> id="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Correo electronico</label>
                                <input type="text" name="correo" value=<?=$_POST["correo"];?> id="correo" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="personas.php" class="btn btn-danger">Descartar</a>
                                
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
                        Insertar contrato
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insertar_c.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input type="text" name="codigo" id="codigo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de inicio</label>
                                <input type="date" name="fechai" id="fechai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de terminación</label>
                                <input type="date" name="fechat" id="fechat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Valor del contrato</label>
                                <input type="text" name="valor" id="valor" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Empeño que respalda</label>
                                <input type="text" name="empeno" id="empeno" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fiador que respalda</label>
                                <input type="text" name="fiador" id="fiador" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                                <a href="personas.php" class="btn btn-success">Borrar</a>
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
                            <th scope="col">Código</th>
                            <th scope="col">Fecha de inicio</th>
                            <th scope="col">Fecha de terminación</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Empeño que respalda</th>
                            <th scope="col">Fiador que respalda</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require('seleccionar_c.php');
                        if($result){
                            foreach ($result as $fila){
                        ?>
                        <tr>
                            <td><?=$fila['codigo'];?></td>
                            <td><?=$fila['fecha_de_inicio'];?></td>
                            <td><?=$fila['fecha_de_terminacion'];?></td>
                            <td><?=$fila['valor'];?></td>
                            <td><?=$fila['fiador'];?></td>
                            <td><?=$fila['empeno'];?></td>
                            
                            <td>
                                <form action="eliminar_c.php" method="POST">
                                    <input type="text" value=<?=$fila['codigo'];?> hidden>
                                    <input type="text" name="d" value=<?=$fila['codigo'];?> hidden>
                                    <button class="btn btn-danger" title="Eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
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