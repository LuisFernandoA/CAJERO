<?php
session_start();

if (isset($_SESSION['user'])) {

    $username = $_SESSION['user'];
    #print_r($username);
    $numero = $username;
    
    require_once "conexion.php";

    $conexion = conexion();

    $sql = "SELECT saldo from cuenta where numero='$numero'";
    $result = mysqli_query($conexion, $sql);
    #Devuelve el resultado como un array asociativo.
    $saldo = mysqli_fetch_array($result);
    #print_r($saldo);
    
    #print_r($result);
    #$saldo = mysql_fetch_array($result);

    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Registro</title>
            <?php require_once "../scripts.php"; ?>
        </head>
        <body style="background-color: gray">
            <br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="panel panel-danger">
                            <div class="panel panel-heading">Consultar Saldo</div>
                            <div class="panel panel-body">
                                <form id="frmRegistro">
                                    <label>Saldo</label>
                                    <?php
                                    echo $saldo['saldo'];
                                    $saldo = mysqli_fetch_array($result);
                                    ?>

                                    <p></p> 
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </body>
    </html>

    <?php
} else {
    header("location:index.php");
}
?>
