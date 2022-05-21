<?php
      $usua = $_POST['usuario'];
      $passwd = $_POST['contrasenya'];
      $email = $_POST['email'];
      $nom = $_POST['nombre'];
      $ape = $_POST['apellido'];
      $tlf = $_POST['telefono'];
  
      if($miUsuario == "root"){
            header("Location: ./index.html");
            exit;
      }

      $doc = new DOMDocument();
      $doc->load('./Reserva.xml');
      
      $usuarios = $doc->getElementsByTagName('usuarios')->item(0);
      
      $usuario = $doc->createElement('usuario');
      
      $login_usr = $doc->createElement('login', $usua);
      $login_attribute = $doc->createAttribute('tipousuario');
      $login_attribute->value = 'empleado';
  
    $passwd_usr = $doc->createElement('passwd', $passwd);
    $nom_usr = $doc->createElement('nombre', $nom);
    $ape_usr = $doc->createElement('apellidos', $ape);
    $tlf_usr = $doc->createElement('telefono', $tlf);
    $email_usr = $doc->createElement('email', $email);
    
    $login_usr->appendChild($login_attribute);
    $usuario->appendChild($login_usr);
    $usuario->appendChild($passwd_usr);
    $usuario->appendChild($nom_usr);
    $usuario->appendChild($ape_usr);
    $usuario->appendChild($tlf_usr);
    $usuario->appendChild($email_usr);
      
      $usuarios->appendChild($usuario);
      
      $doc->save('./Reserva.xml');
  
      header("Location: crearEmpleado.php");
      exit;
?>