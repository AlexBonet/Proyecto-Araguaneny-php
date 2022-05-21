<h1>Ver Reservas</h1>

<?php
    session_start();
    $myUser = $_SESSION['login'];

    if($myUser == null){
        header("Location: iniciarSesion.html");
    }

    $xml = simplexml_load_file('./Reserva.xml');

    foreach($xml->reservas->reserva as $nodo){
            $nom = $nodo->nombre;
            $ape = $nodo->apellidos;
            $fecha = $nodo->fecha;
            $hora = $nodo->hora;
            $observ = $nodo->observaciones;
            ?>
            <table border="1">
                <tr>
                    <td>
                        <p>Nombre usuario</p>
                    </td>
                    <td>
                        <p>Apellidos</p>
                    </td>
                    <td>
                        <p>Telefono</p>
                    </td>
                    <td>
                        <p>Hora</p>
                    </td>
                    <td>
                        <p>Observaciones</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><?php echo $nom?></p>
                    </td>
                    <td>
                        <p><?php echo $ape?></p>
                    </td>
                    <td>
                        <p><?php echo $fecha?></p>
                    </td>
                    <td>
                        <p><?php echo $hora?></p>
                    </td>
                    <td>
                        <p><?php echo $observ?></p>
                    </td>
                </tr>
            </table>
            <?php
            
        
    }
?>
    <a href="cerrarSesion.php" alt="">Cerrar Sesion</a>
    