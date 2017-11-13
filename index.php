<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require_once 'vendor/autoload.php';

//kolla så att från stämmer
if (isset($_POST['contact_name']) and !isEmail($_POST['contact_name'])){
    echo 'Sender email not right';
    echo file_get_contents('index.html');
    //kolla så att till stämmer
}elseif (isset($_POST['contact_email']) and !isEmail($_POST['contact_email'])) {
    echo 'reciver email not right';
    echo file_get_contents('index.html');
    //kolla så att lösen stämmer
}elseif($_POST['contact_password'] !== '1337'){
    echo 'Password not right';
    echo file_get_contents('index.html');
}else{
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'serversidan@gmail.com';                 // SMTP username
        $mail->Password = '11qq""WW33ee';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($_POST['contact_name']);
        $mail->addAddress($_POST['contact_email']);     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
        if (isset($_POST['contact_cc']) and isEmail($_POST['contact_cc'])){
            $mail->addCC($_POST['contact_cc']);

            //kolla så att till stämmer
        }
        if (isset($_POST['contact_bcc']) and isEmail($_POST['contact_bcc'])){
            $mail->addBCC($_POST['contact_bcc']);
        }


        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $_POST['contact_subject'];
        $mail->Body    = $_POST['contact_text'] . '<br> Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

//kolla så att lösen stämmer

//skicka

function isEmail($string) {
    if(filter_var($string, FILTER_VALIDATE_EMAIL)) {

        return true;

     } else {

        return false;
     }
}
/*
if (isset($_POST['contact_name']) and isset($_POST['contact_email']) and isset($_POST['contact_password'])){
    $name = $_POST['contact_name'];
    $email = $_POST['contact_email'];
    $text = $_POST['contact_text'];
    if (!empty($name) or !empty($email) or !empty($text)){
        echo 'ok';
    }
}


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'skidkurs@gmail.com';                 // SMTP username
    $mail->Password = 'Demokrati77';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('teodor.englund@gmail.com', 'Joe User');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} */