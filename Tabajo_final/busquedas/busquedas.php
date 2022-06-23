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
                        <form action="buscar.php" method="get">
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="busqueda" value="1">
                                <label class="form-check-label" for="busqueda">Busqueda 1</label>
                            </div>
                            <div class="form-group">
                                <label>Ingrese el numero minimo de empenos (n1)</label>
                                <input class="form-control" type="number" min=1 name="sup" id="sup">
                                <label>Ingrese el número maximo de empenos (n2)</label>
                                <input class="form-control" type="number" min=1 name="inf" id="inf">
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="busqueda" value="2">
                                <label class="form-check-label" for="busqueda">Busqueda 2</label>
                            </div>
                            <div class="form-group">
                                <label>Ingrese la fecha inicial (f1)</label>
                                <input class="form-control" type="date" name="fecha1" id="fecha1" >
                            </div>
                            <div class="form-group">
                                <label>Ingrese la fecha final (f2)</label>
                                <input class="form-control" type="date" name="fecha2" id="fecha2">
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




</body>

</html>