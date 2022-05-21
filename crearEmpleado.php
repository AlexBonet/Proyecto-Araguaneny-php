<?php 
    session_start();
    $user = $_SESSION['login'];
    if($user == null || $user != 'root'){
        header("Location: iniciarSesion.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crear Empleados - Root Restaurante</title>
</head>
<body>

    <form action="creacionEmpl.php" method="post">
        <fieldset>
				<legend><h2>REGISTRAR EMPLEADO</h2></legend>
        		<label><b>Nombre: </b></label>
				<input type="text" name="nombre" placeholder="Escriba su nombre" size= "50">
					<br><br>
				<label><b>Apellido: </b></label>
				<input type="text" name="apellido"  placeholder="Escriba su apellido" size= "50">
					<br><br>
				<label><b>Telefono: </b></label>
				<input type="tel" name="telefono"  placeholder="Escriba su numero de telefono" size= "50">
					<br><br>
				<label><b>Correo Electronico:</b></label>
				<input type="email" name="email" placeholder="Escriba su email" size="50" minlength="5">
					<br><br>	
				<label><b>Usuario: </b></label>
				<input type="text" name="usuario"  placeholder="Escriba un nombre de usuario" size= "50">
					<br><br>
				<label><b>Contraseña: </b></label>
				<input type="password" name="contrasenya" placeholder="Escriba una contraseña" size= "50">
					<br><br>
	        	<input type="submit" value="Enviar"/>
			</fieldset>
    </form>
	<a href="cerrarSesion.php" alt="">Cerrar Sesion</a>
</body>
</html>