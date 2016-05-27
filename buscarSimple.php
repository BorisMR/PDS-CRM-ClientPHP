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

    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";

    set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . "/../service/application/"));
    
    require_once("./Zend/Soap/Client.php");
    $urlWSDL = "http://localhost:8080/PDS-CRM/services/ServiceDAO?wsdl";

    $textoABuscar = "";

    if ( isset($_GET['textoBusqueda']) ) {
        $textoABuscar = $_GET['textoBusqueda'];
        $textoABuscar = str_replace(" ","",$textoABuscar);

        $textoABuscar = strtolower($textoABuscar); //tolower

        $clienteSoap = new Zend_Soap_Client($urlWSDL);

        if (!empty($textoABuscar)) {
            $out = new stdClass();
            $out->cadenaBusqueda = $textoABuscar;
            $response = new stdClass();
            $response = $clienteSoap->busquedaSimple($out);
            $persona = json_decode($response->busquedaSimpleReturn);

            ?>
            <?php echo '<h3>Saludos: '.$name.'</h3><br><br>'; ?>
            <h2><b>Busqueda Simple</b></h2>
            <div class="table">
                <table class="table table-bordered table-hover table-responsive">
                    <tr class="success">                        
                        <th>Run</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>eMail</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Genero</th>
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
                            $foto = $obj->foto_b64;

                    ?>

                        <tr>
                            <td><?php echo $run?></td>
                            <td><?php echo $nombre?></td>
                            <td><?php echo $apellido?></td>                            
                            <td><?php echo $email?></td>
                            <td><?php echo $fono?></td>
                            <td><?php echo $direccion?></td>
                            <td><?php echo $genero?></td>
                        

                        <?php 

                            $foto;
                            
                            if ($foto!= null){
                                $foto = '<td id="decode" onLoad="decodeImage();"><img src='. $foto .' width="80px" style="border-rounded: 100px;"></td>';
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
            </div>
            <hr>
            <a href="Index.php" class="btn btn-primary">Volver</a>
            <?php

        }
    }

?>
