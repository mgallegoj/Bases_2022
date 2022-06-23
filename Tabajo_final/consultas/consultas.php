<body>
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
                                <input type="submit" class="btn btn-primary" value="Ganadores">
                            </div>
                        </form>
                        <form action="consultas.php" method="get">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="consulta" id="consulta2" value="2" checked hidden>
                            </div>
                            <div class="form-group d-grid gap-2">
                                <input type="submit" class="btn btn-primary" value="Información usuarios">
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
                            $query="SELECT email, pass, nickname, SUM(IF(cantpaneles IS NULL, 0,cantpaneles)) AS sumavalor FROM usuario U LEFT JOIN factura F ON U.email = F.comprador GROUP BY U.email ORDER BY sumavalor DESC, email";
                            $sumavalor = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            if($sumavalor){
                                $cont=0;
                                foreach($sumavalor as $fila){
                                    if($cont<2){
                                    $cont=$cont+1;
                                    ?>
                                    <div class="Ganadores col-md-5">
                                        <h3>Ganador <?=$cont?></h3>
                                        <p><strong>Username: </strong> <?=$fila['nickname'];?></p>
                                        <p><strong>Email: </strong> <?=$fila['email'];?></p>
                                        <p><strong>SumaValor: </strong> <?=$fila['sumavalor'];?></p>
                                </div>
                                    <?php
                                }
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
    .container {
        margin: 3% 2%;
    }
    
    .opciones {
        border-right: 2px solid;
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