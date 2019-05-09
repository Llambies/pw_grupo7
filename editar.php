<?php
    session_start();
    
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] != "administrador") {
            header('Location:index.php');
        }
    }
    else {
        header('Location:index.php');
    }
    include 'conn.php'; 
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/pestannas.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!------------------------------------------------------------------------------------->
    <link href="./css/jquery.multiselect.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery.min.js"></script>
    <script src="js/pestannas.js"></script>

    <!---------------------------------------------------------------------------------------->

    <title>Área personal</title>


</head>
<body >


    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">
        <h4>Bienvenido
            <?php echo $_SESSION['nombre'] ?>
        </h4>
        <p class="Boton_sesion" onclick=""><a href="./index.php">Cerrar sesión</a></p>

    </header>
    <?php 

    $v1 = $_POST['variable1'];
    echo $v1;
            $result = mysqli_query($conn, "SELECT * FROM usuariosparcelas WHERE IdUsuario = '$id'");
            while ($consulta=mysqli_fetch_array($result)) {
                $parce=$consulta['IdParcela'];
                $aux = mysqli_query($conn, "SELECT * FROM parcelas WHERE IdParcela = '$parce'");
                while ($consulta2=mysqli_fetch_array($aux)) {
                   $nombre=$consulta2['Nombre'];
                   $color=$consulta2['ColorParcela'];
                   echo $nombre.$color;

               }
           }



     ?>

     <div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>



</body>
</html>
