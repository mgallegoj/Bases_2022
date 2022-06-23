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
    <div class="col-6 px-2">
        <table class="table border-rounded">
            <thead class="thead ">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Tipo</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($_GET['busqueda'])) {
    require('../configuraciones/conexion.php');
    if ($_GET['busqueda'] == '1') {
        $fa = $_GET['inf'] # <------------ REVISAR ESTO
        $fb = $_GET['sup'] #<<------------- REVISAR ESTO                                                                                                                                                                                                                                                          ##REVISAR ESTO                    
        $query=sprintf("SELECT Codigo, Tipo, contador FROM (SELECT Codigo, Tipo, COUNT(*) AS contador FROM (SELECT empeño.codigo AS Codigo, tipo_de_objeto AS Tipo FROM empeño LEFT JOIN contrato ON empeño.codigo = contrato.empeño) AS pito GROUP BY Codigo) AS finale WHERE contador  BETWEEN '%s' AND '%s';", $fa, $fb);
        $sumavalor = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($sumavalor){
            foreach($sumavalor as $fila){?>
            <tr>
                            <td>
                            <?=$fila['Codigo'];?>
                            </td>
                            <td>
                            <?=$fila['Tipo'];?>
                            </td>
            </tr><?php
            }
        }
    } 
    else {
        $f1= date_create_from_format("Y-m-d",$_GET['fecha1'])->format("Y/m/d");
        $f2= date_create_from_format("Y-m-d",$_GET['fecha2'])->format("Y/m/d");
        #$f3= $_GET['nproy'] <<<------ Revisar esto                                                                                                                                                                                                                                                                                                                           REVISAR este f3             
        $query=sprintf("SELECT Cedula, Celular FROM (SELECT Cedula, Celular, COUNT(*) AS contador FROM (SELECT numero_de_cedula as Cedula, numero_de_celular AS celular FROM fiador LEFT JOIN contrato on fiador.numero_de_cedula = contrato.fiador WHERE (contrato.fecha_de_inicio BETWEEN '%s' and '%s') ) AS solofecha GROUP BY Cedula) AS final WHERE contador <= '%s');",$f1,$f2,$f3);
        $sumavalor = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        
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
</body>
</html>

