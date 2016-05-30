<?php
    session_start();

    set_include_path(get_include_path() . PATH_SEPARATOR . realpath(dirname(__FILE__) . "/../service/application/"));
    
    require_once("./Zend/Soap/Client.php");
    
    $urlWSDL = "http://localhost:8080/PDS-CRM/services/ServiceDAO?wsdl";

    $usser = "";
    $pass = "";

    if(isset($_POST['usser'])){
        $usser = $_POST['usser'] ;
    }
    if(isset($_POST['pass'])){
        $pass=$_POST['pass'];
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
            header('Location: /PDS-CRM-ClientPHP/Index.php');
        }else{
            session_unset();
            session_destroy();
            $_SESSION['status'] = 'Usuario invalido';
            header('Location: /PDS-CRM-ClientPHP/formLogin.php');
        }

    }else{
        session_unset();
        session_destroy();
        header('Location: /PDS-CRM-ClientPHP/formLogin.php');
    }
?>
