<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jose@rpmproducciones.cl";
    $email_subject = "[CONTACTO]";
 
    function died($error) {
        // your error code can go here
        echo "Lo sentimos, pero hay un error en el formulario. ";
        echo "Este es el error.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor sulocionelo.<br /><br />";
        die();
    }
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
		!isset($_POST['email']) ||
        !isset($_POST['phone']) ||        
        !isset($_POST['comments'])) {
        died('Lo sentimos, al parecer hay un error en el formulario.');       
    }
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $phone_from = $_POST['phone']; // required     
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'La dirección de correo no es válida.<br />';
  }
    $string_exp = "/^[A-Za-z\s.'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'El nombre no es válido.<br />';
  }
   
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'El apellido ingresado no es válido.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Comentario muy corto.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Los datos ingresados en el formulario son los siguientes:\n\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Nombre: ".clean_string($first_name)."\n";
    $email_message .= "Apellido: ".clean_string($last_name)."\n";
    $email_message .= "Correo: ".clean_string($email_from)."\n"; 
    $email_message .= "Telefono: ".clean_string($phone_from)."\n";   
    $email_message .= "Comentarios: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
sleep(2);
echo "<meta http-equiv='refresh' content=\"0; url=gracias.html\">";
?>
 
<?php
}
?>