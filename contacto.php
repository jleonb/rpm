<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@rpmproducciones.cl";
    $email_subject = "[CONTACTO RPM]";
 
    function died($error) {
        // your error code can go here
        echo "Lo sentimos, pero hemos encontrado errores en el formulario. ";
        echo "Los errores son los siguientes.<br /><br />";
        echo $error."<br /><br />";
        echo "Vuelva a intentarlo.<br /><br />";
        die();
    }
 
    // validation expected data exists
    if(!isset($_POST['nombre']) ||
        !isset($_POST['apellidos']) ||
        !isset($_POST['telefono']) ||
        !isset($_POST['email']) ||        
        !isset($_POST['mensaje'])) {
        died('Lo sentimos, pero hemos encontrado errores en el formulario.');       
    }
 
    $first_name = $_POST['nombre']; // required
    $last_name = $_POST['apellidos']; // required
    $telefono_name = $_POST['telefono']; // required
    $email_from = $_POST['email']; // required    
    $comments = $_POST['mensaje']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'La dirección de email ingresada no es valida.<br />';
  }
    $string_exp = "/^[A-Za-z\s.'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Favor revisar.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Favor revisar.<br />';
  }
  if(strlen($telefono_name) < 2) {
    $error_message .= 'Favor revisar<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Favor revisar<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Los detalles ingresados son los siguientes:\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Apellidos: ".clean_string($last_name)."\n";
    $email_message .= "Telefono: ".clean_string($telefono_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n\n";   
    $email_message .= "Mensaje: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
sleep(2);
// echo "<meta http-equiv='refresh' content=\"0; url=index.html\">";
?>
 
<?php
}
?>