<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ingreso a plataforma</title>
</head>
<body>
    
    
    <div class="container">
        <h2><b>Login</b></h2>
        <h3>Ingresar Datos de Usuario</h3>
        <form class="form-horizontal" action="verificarUsuario.php" method="GET">
            <div class="form-group">
                <label for="usser">Usuario:</label>
                <input type="text" class="form-control" id="usser" name="usser">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</body>
</html>