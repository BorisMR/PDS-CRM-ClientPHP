<?php
    session_start();
    
    if( $_SESSION["session"] == 's'){
        $name = $_SESSION["username"];
    }else{
        session_unset();
        session_destroy();
        header('Location: /PDS-CRM-ClientPHP/formLogin.php');
    }

    echo '<link rel="stylesheet" href="css/bootstrap.min.css">';

    echo '<script type="text/javascript" src="js/bootstrap.min.js"></script>';
    echo '<script type="text/javascript" src="js/validator.js"></script>';

    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";

    set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . "/../service/application/"));
    
    require_once("./Zend/Soap/Client.php");
    $urlWSDL = "http://localhost:8080/PDS-CRM/services/ServiceDAO?wsdl";

    $run = "";
    $nombre = "";
    $apellido = "";
    $email = "";
    $fono = "";
    $direccion = "";
    $genero = "";

    if(isset($_GET['run'])){
        $run=$_GET['run'] ;
    }
    if(isset($_GET['nombre'])){
        $nombre=$_GET['nombre'];
    }
    if(isset($_GET['apellido'])){
        $apellido=$_GET['apellido'];
    }
    if(isset($_GET['email'])){
        $email=$_GET['email'] ;
    }
    if(isset($_GET['fono'])){
        $fono=$_GET['fono'] ;
    }
    if(isset($_GET['direccion'])){
        $direccion=$_GET['direccion'] ;
    }
    if(isset($_GET['genero'])){
        $genero=$_GET['genero'] ;
    }

    $busquedaAvanzada = "";

    if ( true ) {
        
        $clienteSoap = new Zend_Soap_Client($urlWSDL);

        if ( ($run != "") or ($nombre != "") or ($apellido != "") or ($email != "") or ($fono != "") or ($direccion!= "") or ($genero != "") ) {

            $run = strtolower($run);
            $nombre = strtolower($nombre);
            $apellido = strtolower($apellido);
            $email = strtolower($email);
            $fono = strtolower($fono);
            $direccion = strtolower($direccion);
            $genero = strtolower($genero);


            $arrayBusqueda = array('run'=>$run, 'nombre'=>$nombre,'apellido'=>$apellido,'email'=>$email,'fono'=>$fono,'direccion'=>$direccion,'genero'=>$genero);
            
            $response = new stdClass();
            $busquedaAvanzada = $arrayBusqueda;
            $response = $clienteSoap->busquedaAvanzada($busquedaAvanzada);

            $persona = json_decode($response->busquedaAvanzadaReturn);
?>
            <?php echo '<h3>Saludos: '.$name.'</h3><br><br>'; ?>
            <h2><b>Busqueda Avanzada</b></h2>
            <table class="table table-bordered table-hover table-responsive">
                <tr class="success">                        
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>eMail</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Genero</th>
                    <th>Empresa</th>
                    <th>Foto</th>
                </tr>
                    
                <?php

                    foreach($persona as $obj){
                        $idP = $obj->idP;
                        $run = $obj->run;
                        $nombre = $obj->nombre;
                        $apellido = $obj->apellido;
                        $email = $obj->email;
                        $fono = $obj->fono;
                        $direccion = $obj->direccion;
                        $genero = $obj->genero;
                        $empresa = $obj->empresa->nombre;
                        $foto = $obj->foto_b64;
                        //style="display: none;"

                ?>

                    <tr id="<?php echo $idP;?>">
                        <td><?php echo $run;?></td>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $apellido;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $fono;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $genero;?></td>
                        <td><?php echo $empresa;?></td>
                    
                
                    <?php 

                        $foto;
                        
                        if ($foto!= null){
                            $foto = '<td ><img src='. $foto .' width="80px" style="border-rounded: 100px;"></td>';
                        }
                        else{
                            $foto = '<td><img src="image/img_usuario.png" width="80px" style="border-rounded: 100px;"></td>';
                        }
                        
                        echo $foto;

                        echo '<td><button value='.$idP.' class="btn btn-primary" onclick="infoPerfil('.$idP.')">Info</button></td>';
                    ?>

                        
                    </tr>
                    
                    <?php
                    
                    }
                
                    ?>
                
            </table>
            <hr>
            <a href="Index.php" class="btn btn-primary">Volver</a>

        <?php

        }else{
            //no se ingreso ningun parametro
        }
    }

?>