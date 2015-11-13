<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "jleon@webframe.cl";
    $email_subject = "[SUSCRIPTOR RPM]";
 
    
 
    // validation expected data exists
   
 
   
    $email_from = $_POST['email']; // required    
    
 
  
    $email_message = "El email ingresado es:\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    
    $email_message .= " ".clean_string($email_from)."\n\n";   
    
 
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