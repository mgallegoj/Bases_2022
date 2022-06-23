<!DOCTYPE html>
<html lang="en">
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
        <li class="nav nav-item">
            <a class="nav-link " href="../index.html">Inicio</a>
        </li>
        <li class="nav ">
            <a class="nav-link " href="../personas/personas.php">Personas</a>
        </li>
        <li class="nav">
            <a class="nav-link" href="../facturas/facturas.php">Facturas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../busquedas/busquedas.php">Busquedas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link active" href="consultas.php">Consultas</a>
        </li>
    </ul>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 opciones">
                    <div class="card-header">
                        ¿Qué consulta desea realizar?
                    </div>
                    <div class="card-body">
                        <form action="consultas.php" method="get">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="consulta" id="consulta1" value="1" checked hidden>
                            </div>
                            <div class="form-group d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Consulta 1">
                            </div>
                        </form>
                        <form action="consultas.php" method="get">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="consulta" id="consulta2" value="2" checked hidden>
                            </div>
                            <div class="form-group d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Consulta 2">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9 respuesta">
                    <h2>Resultados de la consulta</h2>
                    <div class="row">
                    <?php if (isset($_GET['consulta'])) {
                        require('../configuraciones/conexion.php');
                        if ($_GET['consulta'] == '1') {
                            $query="SELECT numero_de_cedula, nombre FROM fiador WHERE EXISTS(SELECT fiador AS fiador_emp FROM empeno WHERE empeno.fiador = numero_de_cedula) AND ((SELECT SUM(valor) FROM empeno WHERE empeno.fiador = numero_de_cedula) > 1000) AND ((SELECT COUNT(fiador) FROM contrato WHERE contrato.fiador = numero_de_cedula) >= 3) AND (SELECT COUNT(empeno) FROM contrato WHERE contrato.empeno = (SELECT codigo AS codigo_emp FROM empeno WHERE empeno.fiador = numero_de_cedula)) = 0";
                            $consulta1 = mysqli_query($conn, $query) or die(mysqli_error($conn));?>
                            <table class="table border-rounded table-bordered table-hover">
                            <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Número de documento</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                                    if($consulta1){
                                        foreach($consulta1 as $fila){
                                    ?>
                                        <tr>
                                            <td>
                                                <?=$fila['numero_de_cedula'];?>
                                            </td>
                                            <td>
                                                <?=$fila['nombre'];?>
                                            </td>
                                        </tr>
                                        <?php
                                        
                                        }
                                    }
                                
                            
                    } else{
                            $query="SELECT codigo, valor FROM contrato WHERE valor > (SELECT valor AS valor_emp FROM empeno WHERE contrato.empeno = empeno.codigo) AND (contrato.fiador = (SELECT fiador AS fiador_emp FROM empeno WHERE contrato.empeno = empeno.codigo))";
                            $consulta2 = mysqli_query($conn, $query) or die(mysqli_error($conn));?>
                            <table class="table border-rounded table-bordered table-hover">
                                <thead>
                                    <tr class="table-dark">
                                        <th scope="col">Código del contrato</th>
                                        <th scope="col">Valor del contrato</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($consulta2){
                                        foreach($consulta2 as $fila){
                                    ?>
                                        <tr>
                                            <td>
                                                <?=$fila['codigo'];?>
                                            </td>
                                            <td>
                                                <?=$fila['valor'];?>
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
<style>
</style>

</html>