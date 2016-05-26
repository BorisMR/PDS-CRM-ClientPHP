<?php
    session_start(); //incluir antes que todo html

    echo "<link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";

    set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . "/../service/application/"));
    
    require_once("./Zend/Soap/Client.php");
    
    $urlWSDL = "http://localhost:8080/PDS-CRM/services/ServiceDAO?wsdl";

    $usser = "";
    $pass = "";

    if(isset($_GET['usser'])){
        $usser=$_GET['usser'] ;
    }
    if(isset($_GET['pass'])){
        $pass=$_GET['pass'];
    }

    $clienteSoap = new Zend_Soap_Client($urlWSDL);

    if ( ($usser != "") or ($pass != "") ) {
        
        $datosLogin = array('usser'=>$usser, 'pass'=>$pass);
        
        $response = new stdClass();
        $response = $clienteSoap->verificarUsuario($datosLogin);

        $resultado = $response->verificarUsuarioReturn;

        if( $resultado == 's'){
            $_SESSION['username'] = $usser;
            $_SESSION['session'] = $resultado;
            header('Location: /PDS-CRM/Index.php');
        }else{
            session_unset();
            session_destroy();
            header('Location: /PDS-CRM/formLogin.php');
        }

    }else{
        session_unset();
        session_destroy();
         //$txt = "mensaje?"
            //formLogin.php?msg=txt
        header('Location: /PDS-CRM/formLogin.php');
    }
?>
