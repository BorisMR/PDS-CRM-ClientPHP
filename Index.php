<?php
    session_start();
    
    if( $_SESSION["session"] == 's'){
        $name = $_SESSION["username"];
    }else{
    	session_unset();
        session_destroy();
        header('Location: /PDS-CRM/formLogin.php');
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
	<?php echo '<h3>Saludos: '.$name.'</h3><br><br>'; ?>
		<h2>Buscadores</h2>
		<div class="panel">
			<table class="table table-responsive">	
				<tr>		  				
					<td>
						<a href="formularioBusquedaSimple.php" class="btn btn-info">Busqueda Simple</a>
					</td>
	  				<td>
						<a href="formularioBusquedaAvanzada.php" class="btn btn-primary">Busqueda Avanzada</a>
	  				</td>	  			
	  			</tr>
		  	</table>
		</div>	
	</div>
</body>
</html>