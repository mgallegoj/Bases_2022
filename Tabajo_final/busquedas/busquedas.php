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
        <li class="nav-item nav-pills">
            <a class="nav-link active" href="busquedas.php">Busquedas</a>
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
                        <form action="busquedas.php" method="get">
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="busqueda" value="1">
                                <label class="form-check-label" for="busqueda">Busqueda por rango de proyectos revisados</label>
                            </div>
                            <div class="form-group">
                                <label>Ingrese el limite inferior (n1)</label>
                                <input class="form-control" type="number" min=0 name="posicion">
                            </div>
                            <div class="form-group">
                                <label>Ingrese el limite superior (n2)</label>
                                <input class="form-control" type="number" min=0 name="posicion">
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="busqueda" value="2">
                                <label class="form-check-label" for="busqueda">Rango de fecha con numero de proyectos exactos</label>
                            </div>
                            <div class="form-group">
                                <label>Ingrese la fecha inicial (f1)</label>
                                <input class="form-control" type="date" name="factura1" id="factura1" >
                            </div>
                            <div class="form-group">
                                <label>Ingrese la fecha final (f2)</label>
                                <input class="form-control" type="date" name="factura2" id="factura2">
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
        $query="SELECT email, pass, nickname, SUM(IF(cantpaneles IS NULL, 0,cantpaneles)) AS sumavalor FROM usuario U LEFT JOIN factura F ON U.email = F.comprador GROUP BY U.email ORDER BY sumavalor DESC, email;";
        $sumavalor = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $field= $_GET['posicion'];
        if($sumavalor){
            $cont=0;
            $anterior="";
            foreach($sumavalor as $fila){
                
                if ($cont == $field-1 ) {
                    ?>
                                    <div class="Ganadores col-md-5">
                                        <h3>Usuario en la posición <?=$field;?></h3>
                                        <p><strong>Username: </strong>
                                            <?=$fila['nickname'];?>
                                        </p>
                                        <p><strong>Email: </strong>
                                            <?=$fila['email'];?>
                                        </p>
                                        <p><strong>SumaValor: </strong>
                                            <?=$fila['sumavalor'];?>
                                        </p>
                                    </div><?php
                }
                $cont=$cont+1;
            }
        }
    } 
    else {
        $f1= date_create_from_format("Y-m-d",$_GET['factura1'])->format("Y/m/d");
        $f2= date_create_from_format("Y-m-d",$_GET['factura2'])->format("Y/m/d");
        $query=sprintf("SELECT U.pass, U.email FROM usuario U LEFT JOIN factura F ON U.email = F.comprador EXCEPT (SELECT U.pass, U.email FROM usuario U LEFT JOIN factura F ON U.email = F.comprador WHERE fechacompra BETWEEN '%s' AND '%s')",$f1,$f2);
        $sumavalor = mysqli_query($conn, $query) or die(mysqli_error($conn));
        ?>
        
        <table class="table border-rounded table-bordered table-hover">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">Email</th>
                                    <th scope="col">Pass</th>
                                </tr>
                            </thead>
                            <tbody><?php
        if($sumavalor){
            foreach($sumavalor as $fila){?>
            <tr>
                            <td>
                            <?=$fila['email'];?>
                            </td>
                            <td>
                            <?=$fila['pass'];?>
                            </td>
            </tr><?php
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
    .container {
        margin: 3% 2%;
    }
    
    .opciones {
        border-right: 5px solid;
    }
    
    .Ganadores {
        margin: 0% 3% 4%;
        border: 1px solid lightslategray;
        border-radius: 10px;
        padding: 0% 2% 2% 2%;
    }
    
    h2 {
        margin-bottom: 3%;
    }
    
    .Ganadores h3 {
        background: var(--cuatro);
        color: white;
        width: 119%;
        padding: 2% 6%;
        position: relative;
        border-radius: 10px;
        left: -9%;
        top: -12px;
        border: 2px solid #62a163;
    }
</style>

</html>