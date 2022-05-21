<?php
    session_start();
    $user = $_SESSION['login'];

    $xml = simplexml_load_file("./Reserva.xml");

    foreach($xml->usuarios->usuario as $usu){
        if($usu->login == $user){
            $nombre = $usu->nombre;
            $apellidos = $usu->apellidos;
            $email = $usu->email;
            $telf = $usu->telefono;
        }
    }

    $doc = new DOMDocument();

    $doc->load("./Reserva.xml");

    $reservas = $doc->getElementsByTagName('reservas')->item(0);

    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];
    $ob = $_POST['ob'];

    $reserva = $doc->createElement('reserva');
    $fechaR = $doc->createElement('fecha',$fecha);
    $horaR = $doc->createElement('hora', $hora);
    $obR = $doc->createElement('observaciones', $ob);
    $dreserva = $doc->createElement('datosreserva');
    $loginR = $doc->createElement('login', $user);
    $nombreR = $doc->createElement('nombre', $nombre);
    $apellidosR = $doc->createElement('apellidos', $apellidos);
    $emailR = $doc->createElement('email', $email);
    $telfR = $doc->createElement('telefono', $telf);

    $dreserva->appendChild($fechaR);
    $dreserva->appendChild($horaR);
    $dreserva->appendChild($obR);
    $reserva->appendChild($loginR);
    $reserva->appendChild($nombreR);
    $reserva->appendChild($apellidosR);
    $reserva->appendChild($telfR);
    $reserva->appendChild($emailR);
    $reserva->appendChild($dreserva);
    $reservas->appendChild($reserva);

    $doc->save("./Reserva.xml");

    header("Location: reservasCliente.php");
    exit;

?>