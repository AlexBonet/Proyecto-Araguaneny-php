<?php
    session_start();
    $user = $_SESSION['login'];

    $xml = simplexml_load_file("./Reserva.xml");

    foreach($xml->usuarios->usuario as $usu){
        if($usu->login == $user){
            $nombre = $usu->nombre;
            $apellidos = $usu->apellidos;
        }
    }

    $doc = new DOMDocument();

    $doc->load("./Reserva.xml");

    $reservas = $doc->getElementsByTagName('reservas')->item(0);

    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];
    $observ = $_POST['observ'];

    $reserva = $doc->createElement('reserva');
    $fechaReserv = $doc->createElement('fecha',$fecha);
    $horaReserv = $doc->createElement('hora', $hora);
    $obReserv = $doc->createElement('observaciones', $observ);
    $nombreReserv = $doc->createElement('nombre', $nombre);
    $apellidosReserv = $doc->createElement('apellidos', $apellidos);
    

    $reserva->appendChild($fechaReserv);
    $reserva->appendChild($horaReserv);
    $reserva->appendChild($obReserv);
    $reserva->appendChild($nombreReserv);
    $reserva->appendChild($apellidosReserv);
    
    $reservas->appendChild($reserva);

    $doc->save("./Reserva.xml");

    header("Location: ./reservarC.php");
    exit;

?>