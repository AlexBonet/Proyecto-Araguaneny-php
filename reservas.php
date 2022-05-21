<?php
    session_start();
    $carga_xml = simplexml_load_file("./Reserva.xml");

    $usua = $_POST['usuario'];
    $passwd = $_POST['contrasenya'];

    foreach($carga_xml->usuarios->usuario as $usuario){
        
        $usuarioComp = $usuario->login->attributes();
        if($usuarioComp == "cliente"){
            if($usuario->login == $usua && $usuario->passwd == $passwd){

                $_SESSION['login'] =$_POST['usuario'];
                header("Location: ./reservarC.php");
                exit;
            }
        }
        if($usuarioComp == "root"){
            if($usuario->login == $usua && $usuario->passwd == $passwd){
                $_SESSION['login'] = $_POST['usuario'];
                header("Location: ./crearEmpleado.php");
                exit;
            }
        }
        if($usuarioComp == "empleado"){
            if($usuario->login == $usua && $usuario->passwd == $passwd){
                $_SESSION['login'] = $_POST['usuario'];
                header("Location: ./verReservas.php");
                exit;
            }
        }

        
    }
    header("Location: index.html");
    exit;

?>