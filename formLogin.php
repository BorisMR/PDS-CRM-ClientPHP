<?php
    session_start();
    
    if( $_SESSION["session"] == 's'){
        header('Location: /PDS-CRM-ClientPHP/Index.php');

    }else{
        $_SESSION["status"] = "Inicie sesión";
        $status = $_SESSION["status"];
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Formulario de Ingreso</title>
</head>
<body>
    <div class="container">
        <div class="row" id="pwd-container">
        <div class="col-md-4"></div>
    
        <div class="col-md-4">
        <h2><b>Login</b></h2>
        <br>
        <?php echo '<h3 class="alert alert-warning">'.$status.'</h3>';?>    
        <form class="form-horizontal" action="verificarUsuario.php" method="POST">
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
        </div>
    </div>  
</body>
</html>