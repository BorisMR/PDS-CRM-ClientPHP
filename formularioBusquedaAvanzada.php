<?php
    session_start();
    
    if( $_SESSION["session"] == 's'){
        $name = $_SESSION["username"];
    }else{
        session_unset();
        session_destroy();
        header('Location: /PDS-CRM-ClientPHP/formLogin.php');
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"></link>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>    
    <script type="text/javascript" src="js/validator.js"></script>

    <title>Búsqueda Avanzada de Contactos</title>
</head>
<body>
    <h2><b>Busqueda Avanzada</b></h2>
    
    <div class="container">
        <h3>Ingresar Datos Persona</h3>
        <form class="form-horizontal" action="buscarAvanzado.php" method="get" id="formularioBusquedaAvanzada">
            <div class="form-group">
                <label for="run">Run:</label>
                <input type="text" class="form-control" id="run" name="run">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
            <div class="form-group">
                <label for="email">eMail:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" class="form-control" id="fono" name="fono">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            <div class="form-group">
                <label for="genero">Genero:</label>
                <input type="text" class="form-control" id="genero" name="genero">
            </div>
            <div class="form-group">
                <button type="submit" value="Buscar" class="btn btn-primary" name="buscar">Buscar</button>
            </div>
        </form>
    </div>
</body>
</html>