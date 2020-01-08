
<?php

$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Subject = $_POST['Asunto'];
$Mensaje = $_POST['Mensaje'];

if ($Nombre=='' || $Email=='' || $Mensaje==''){ // Si falta un dato en el formulario mandara una alerta al usuario.

echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php"); // Requiere PHPMAILER para poder enviar el formulario desde el SMTP de google
    $mail = new PHPMailer();

    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("suppeffect01@gmail.com"); // Dirección a la que llegaran los mensajes.

// Aquí van los datos que apareceran en el correo que reciba

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Solicito servicio"; // Asunto del mensaje.
    $mail->Body     =  "Nombre: $Nombre \n<br />". // Nombre del usuario
    "Asunto: $Subject \n <br/>". //Asunto del usuario
    "Email: $Email \n<br />".    // Email del usuario
    "Mensaje: $Mensaje \n<br />"; // Mensaje del usuario

// Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
    $mail->SMTPAuth = true; 
    $mail->Username = "33ferney33@gmail.com";  // Correo Electrónico
    $mail->Password = "sanjuan123"; // Contraseña del correo

    if ($mail->Send())
    echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>