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
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Index CRM</title>
</head>
<body>
	<div class="container">
	<br>
		<div class="page-header">
			<h1>CRM<small class="alert alrt-success"><?php echo 'Saludos: <b>'.$name.'</b>'; ?></small></h1>
		</div>
		<h2>Buscadores</h2>
		<div class="panel">
			<table class="table table-responsive">	
				<!--
				<tr>
					<td>
						<a href="formBusquedaPorRut.php" class="btn btn-info">Busqueda Por Rut</a>
					</td>
				</tr>
				-->
				<tr>		  				
					<td>
						<a href="formularioBusquedaSimple.php" class="btn btn-info">Busqueda Simple</a>
					</td>
					<td>
						<a href="formularioBusquedaAvanzada.php" class="btn btn-primary">Busqueda Avanzada</a>
	  				</td>
	  			</tr>
		  	</table>
		  	<a href="logout.php" class="btn btn-danger">Logout</a>
		</div>	
	</div>
</body>
</html>