<?php 
    session_start();
    $user = $_SESSION['login'];

    if($user == null){
        header("Location: iniciarSesion.html");
    }

    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];
    $observ = $_POST['observ'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ReservasCliente - Restaurante Araguaney</title>
</head>
<body>

    <form action="crearReserva.php" method="post">
        <fieldset>
            <legend><h2>Reseva</h2></legend>
            <label>Fecha de reserva</label>
            <input type="date" name="fecha" vale=<?php echo $fecha?>><br>
            <br>
            <label>Hora de reserva</label>
            <input type="time" name="hora" value=<?php echo $hora?>><br>
            <br>
            <label>Observacion de reserva</label>
            <input type="text" name="observ" value=<?php echo $observ?>><br>
            <br>
            <input type="submit" placeholder="Enviar">
        </fieldset>
    </form>
    <a href="cerrarSesion.php" alt="">Cerrar Sesion</a>
</body>
</html>