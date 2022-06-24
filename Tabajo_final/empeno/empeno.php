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
    <title>Empeño</title>
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
                if(isset($_GET["codigo"])){
             ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar empeño
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="actualizar_e.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="codigo">Código*</label>
                                <input type="text" readonly name="codigo" value=<?=$_GET["codigo"];?> id="codigo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Valor*</label>
                                <input type="text" name="valor" value='<?=$_GET["valor"];?>' id="valor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tipo de objeto*</label>
                                <input type="text" name="tipo" value='<?=$_GET["tipo"];?>' id="tipo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción*</label>
                                <input type="text" name="descripcion" value=<?=$_GET["descripcion"];?> id="descripcion" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Fiador dueño</label>
                                <select name="fiador">
                                    <option value="NULL"></option>
                                <?php 
                                   require('seleccionar_f.php');
                                   if($result){
                                        foreach ($result as $fila){
                                          echo "<option value=$fila[numero_de_cedula]> $fila[numero_de_cedula]</option>";                   
                                       }
                                }
                                ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="empeno.php" class="btn btn-danger">Descartar</a>
                                
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
                        Insertar empeño
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insertar_e.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="codigo">Código*</label>
                                <input type="text" name="codigo" id="codigo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Valor*</label>
                                <input type="text" name="valor" id="valor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tipo de objeto*</label>
                                <input type="text" name="tipo" id="tipo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción*</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fiador dueño</label>
                                <select name="fiador">
                                    <option value="NULL"></option>
                                <?php 
                                   require('seleccionar_f.php');
                                   if($result){
                                        foreach ($result as $fila){
                                          echo "<option value=$fila[numero_de_cedula]> $fila[numero_de_cedula]</option>";                   
                                       }
                                }
                                ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                                <a href="empeno.php" class="btn btn-success">Borrar</a>
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
                            <th scope="col">Valor</th>
                            <th scope="col">Tipo de objeto</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fiador dueño</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require('seleccionar_e.php');
                        if($result){
                            foreach ($result as $fila){
                        ?>
                        <tr>
                            <td><?=$fila['codigo'];?></td>
                            <td><?=$fila['valor'];?></td>
                            <td><?=$fila['tipo_de_objeto'];?></td>
                            <td><?=$fila['descripcion'];?></td>
                            <td><?=$fila['fiador'];?></td>
                            
                            <td>
                                <form action="eliminar_e.php" method="POST">
                                    <input type="text" value=<?=$fila['codigo'];?> hidden>
                                    <input type="text" name="d" value=<?=$fila['codigo'];?> hidden>
                                    <button class="btn btn-danger" title="Eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                            <td class="mx-0 pr-2">
                                <form action="empeno.php" method="GET">
                                    
                                    <input type="text" name="codigo" value="<?=$fila['codigo'];?>" hidden>
                                    <input type="text" name="valor" value="<?=$fila['valor'];?>" hidden>
                                    <input type="text" name="tipo" value="<?=$fila['tipo_de_objeto'];?>" hidden>
                                    <input type="text" name="descripcion" value="<?=$fila['descripcion'];?>" hidden>
                                    <input type="text" name="fiador" value="<?=$fila['fiador'];?>" hidden>

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