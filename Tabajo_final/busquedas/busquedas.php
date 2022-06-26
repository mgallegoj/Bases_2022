<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
    <!DOCTYPE html>
<html lang="en">
<!--cabecera del html -->

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>inicio</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
        para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir iconos y formas 
         para mas informacion : https://fontawesome.com/start-->
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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 opciones">
                    <div class="card-header">
                        ¿Qué busqueda desea realizar?
                    </div>
                    <div class="card-body">
                        <form action="busquedas.php" method="get">
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="busqueda" value="1">
                                <label class="form-check-label" for="busqueda">Busqueda 1</label>
                            </div>
                            <div class="form-group">
                                <label>Ingrese la fecha inicial (f1)</label>
                                <input class="form-control" type="date" name="fecha1" id="fecha1" >
                            </div>
                            <div class="form-group">
                                <label>Ingrese la fecha final (f2)</label>
                                <input class="form-control" type="date" name="fecha2" id="fecha2">
                            </div>
                            <div class="form-group">
                                <label>Ingrese el numero de empenos (n)</label>
                                <input class="form-control" type="number" min=0 name="emp" id="emp">
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="busqueda" value="2">
                                <label class="form-check-label" for="busqueda">Busqueda 2</label>
                            </div>
                            <div class="form-group">
                                <label>Ingrese el numero minimo de empenos (n1)</label>
                                <input class="form-control" type="number" min=0 name="inf" id="inf">
                                <label>Ingrese el número maximo de empenos (n2)</label>
                                <input class="form-control" type="number" min=0 name="sup" id="sup">
                            </div>
                            <div class="form-group d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9 respuesta">
                    <h2>Resultados de la busqueda</h2>
                    <div class="row">
                    <?php if (isset($_GET['busqueda'])) {
                        require('../configuraciones/conexion.php'); 
                        if ($_GET['busqueda'] == '1') {
                            $fecha1= date_create_from_format("Y-m-d",$_GET['fecha1'])->format("Y/m/d");
                            $fecha2= date_create_from_format("Y-m-d",$_GET['fecha2'])->format("Y/m/d");
                            $emp = intval($_GET["emp"]);                                                                                                                                                                                                                                                                             
                            $query=sprintf("SELECT Cedula, Celular FROM (SELECT Cedula, Celular, COUNT(*) AS contador FROM (SELECT numero_de_cedula as Cedula, numero_de_celular AS celular FROM fiador LEFT JOIN contrato on fiador.numero_de_cedula = contrato.fiador WHERE (contrato.fecha_de_inicio BETWEEN '%s' and '%s') ) AS solofecha GROUP BY Cedula) AS final WHERE contador = '%s';", $fecha1,$fecha2,$emp);
                            $busqueda1 = mysqli_query($conn, $query) or die(mysqli_error($conn));?>
                            <table class="table border-rounded table-bordered table-hover">
                            <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Cedula</th>
                                        <th scope="col">Celular</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if($busqueda1){
                                        foreach($busqueda1 as $fila){
                                    ?>
                                        <tr>
                                            <td>
                                                <?=$fila['Cedula'];?>
                                            </td>
                                            <td>
                                                <?=$fila['Celular'];?>
                                            </td>
                                        </tr>
                                            <?php

                                        }
                                    }
            

                        } else{         
                                $inf = intval($_GET["inf"]);
                                $sup = intval($_GET["sup"]);                                                                                                                                                                                                                                                                                                                              
                                $query=sprintf("SELECT Codigo, tipo, contador FROM (SELECT Codigo, tipo, COUNT(*) AS contador FROM (SELECT empeno.codigo AS Codigo, tipo_de_objeto AS Tipo FROM empeno LEFT JOIN contrato ON empeno.codigo = contrato.empeno) AS pito GROUP BY Codigo) AS finale WHERE contador  BETWEEN '%s' AND '%s';",$inf,$sup);
                                $busqueda2 = mysqli_query($conn, $query) or die(mysqli_error($conn));?>
                                <table class="table border-rounded table-bordered table-hover">
                                    <thead>
                                        <tr class="table-dark">
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($busqueda2){
                                            foreach($busqueda2 as $fila){
                                        ?>
                                            <tr>
                                                <td>
                                                    <?=$fila['Codigo'];?>
                                                </td>
                                                <td>
                                                    <?=$fila['tipo'];?>
                                                </td>
                                            </tr>
                                            <?php
                                            
                                            }
                                        }

                                        
                                }       
                            }?>                                            
                                        </tbody>
                                
                                </table>
                        
                    </div>
                </div>            
            </div>
        </div>      
    </main>
</body>
</html>