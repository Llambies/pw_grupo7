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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href="./css/admin.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Fira+Sans');
    </style>
    <title>Área Administrador</title>
    <script type="text/javascript" src="js/admin.js"></script>

</head>
<body >
     
    <header>
        <img src="./imgs/logo_u15.svg" alt="Logo Empresarial">
        <h4>Bienvenido
            <?php echo $_SESSION['nombre'] ?>
        </h4>
        <p class="Boton_sesion" onclick=""><a href="./index.php">Cerrar sesión</a></p>

    </header>

       <div class="cajagrande">




        <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Lista de usuarios</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Añadir usuario</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')"></button>
</div>

<div id="London" class="tabcontent">
  <form action="zonaadmin.php" method="post" class="selectorcliente">
            <table class="table">
                <div class="form-row">
                    <div class="form-group col-md-1" style="margin: auto 0;">
                    <label class="texto">Cliente</label>
                    </div>
                    <div class="form-group col-md-4">
                        <select name="cliente" class="form-control">
                         <option selected>selecciona un cliente...</option>
                   <?php 

                        $result = mysqli_query($conn, "SELECT * FROM clientes");
                        while ($consulta=mysqli_fetch_array($result)) {
                            $client=$consulta['nombre'];
                            $idClient=$consulta['idCliente'];
                           
                            echo '<option value='.$idClient.'>'.$client.'</option>';
                        }

                    ?>
                         </select>

                    </div>
               <div class="form-group col-md-4">
               <button type="submit" class="btn btn-info" name="btn2">Buscar</button>
               </div>
               </div>
           </table>
               
        </form>

        <table class="tablausuarios" >

            
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">+Info</th>
                    
                  </tr>
                </thead>
             
            <?php 
                //$_GET["nombre"];
            
            
        if (isset($_POST["btn2"])) {

                $idCliente=$_POST['cliente'];
                
                $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE idCliente='$idCliente'");
                while ($consulta=mysqli_fetch_array($result)) {
                    $usuario=$consulta['IdUsuario'];
                    $nombre=$consulta['Nombre'];
                    $apellido=$consulta['Apellidos'];
                    $nick=$consulta['Usuario'];
                    $email=$consulta['Email'];

                    echo    "<script>var ww".$usuario."= 0</script>";
                  
                    echo '  <tr >
                              <td scope="row">'.$usuario.'</td>
                              <td scope="row">'.$nick.'</td>
                              <td scope="row">'.$nombre.'</td> 
                              <td scope="row">'.$apellido.'</td>
                              <td scope="row">'.$email.'</td>';
                    echo     '<td scope="row" id="a'.$usuario.'"><form action="editar.php" method="post"><input type="hidden" name="variable1" value="'.$usuario.'" /><button type="submit" class="btn btn-outline-info">+</button></form></td>';
                   
                    echo   "</tr>";
                    

                    
                    
                    



                }
            
            }
                
            ?>

        </table>
</div>
<div id="Paris" class="tabcontent">
  <form action="zonaadmin.php" method="post" class="formulario">
          
            <div class="form-row" >
               <div class="form-group col-md-6">
                 <label for="usuario">Usuario</label>
                 <input type="text" class="form-control" name="usuario" placeholder="Usuario">
               </div>
               <div class="form-group col-md-6">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Contraseña">
               </div>
             </div>
             <div class="form-group">
               <label for="email">E-Mail</label>
               <input type="email" class="form-control col-md-8" name="email" placeholder="email@email.com">
             </div>
              <div class="form-row" >
               <div class="form-group col-md-4">
                 <label for="nombre">Nombre</label>
                 <input type="text" class="form-control" name="nombre" placeholder="Nombre">
               </div>
               <div class="form-group col-md-8">
                 <label for="apellidos">Apellidos</label>
                 <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
               </div>
             </div>
             <div class="form-row">
               <div class="form-group col-md-4">
                 <label for="rol">Rol</label>
                 <select name="rol" class="form-control">
                   <option selected value="cliente">Cliente</option>
                   <option value="administrador">Administrador</option>
                 </select>
               </div>
               
             
                    
                    <div class="form-group col-md-4">
                        <label for="cliente">Cliente</label>
                        <select name="cliente" class="form-control">
                         <option selected>selecciona un cliente...</option>
                   <?php 

                        $result = mysqli_query($conn, "SELECT * FROM clientes");
                        while ($consulta=mysqli_fetch_array($result)) {
                            $client=$consulta['nombre'];
                            $idClient=$consulta['idCliente'];
                           
                            echo '<option value='.$idClient.'>'.$client.'</option>';
                        }

                    ?>
                         </select>

                    </div>
               </div>

             
             <button type="submit" class="btn btn-primary" name="btn1">Registrar usuario</button>
        </form>
        <?php 

         
         if (isset($_POST["btn1"])) {
            
             $usuario=$_POST['usuario'];
             $contrasenya=password_hash($_POST['password'],PASSWORD_DEFAULT);
             $email=$_POST['email'];
             $nombre=$_POST['nombre'];
             $apellidos=$_POST['apellidos'];
             $rol=$_POST['rol'];
             $idCliente=$_POST['cliente'];
             

             


             echo $nombre.$contrasenya.$email.$nombre.$apellidos.$rol.$idCliente;

                $aux = mysqli_query($conn, "INSERT INTO `usuarios` ( `idCliente`, `Nombre`, `Apellidos`, `Usuario`, `Password`, `Email`, `Rol`)
                                                            VALUES ( '$idCliente','$nombre','$apellidos','$usuario','$contrasenya','$email','$rol')");
             
                    
         }
         




         ?>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>





        <h1>Panel de administración</h1>
        
        
        
</div> 

    <script src="js/pestannas.js"></script>
    
</body>
</html>