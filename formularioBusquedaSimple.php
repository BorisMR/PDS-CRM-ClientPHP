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
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/validator.js"></script>
    <title>Búsqueda Simple de Contactos</title>
</head>
<body>
<div class="container">

    <h2><b>Busqueda Simple</b></h2>

    <form class="form-horizontal" action="buscarSimple.php" method="POST" id="formularioBusquedaSimple">
        <div class="form-group">
            <label for="textoBusqueda">Buscar:</label>
            <input type="text" class="form-control" id="textoBusqueda" name="textoBusqueda" required>
        </div>
        <div class="form-group">
            <button type="submit" value="Buscar" class="btn btn-primary" name="buscar">Buscar</button>
        </div>
    </form>
</div>
</body>
</html>