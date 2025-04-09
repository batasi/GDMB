<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require './vendor/autoload.php';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'batasieb3029@gmail.com';
        $mail->Password = 'fhcitoakdvfibswa';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;



        //Recipients
        $mail->setFrom('batasieb3029@gmail.com', 'Global Ministries');
        $mail->addAddress('info@globalministries-dailybread.org');
        // $mail->addAddress($_POST['email']);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body    = '<p>Name: ' . $_POST['name'] . "</p>"
        . "<p>Email: " . $_POST['email'] . "</p>"
        . "<p>Message: " . $_POST['message'] . "</p>";

        $mail->send();
        echo json_encode(['status' => true, "data" => 'Message has been sent']);
    } catch (Exception $e) {
        echo json_encode(['status' => false, "data" => "Message could not be sent\nMailer Error: " . $mail->ErrorInfo]);
    }
}else{
    echo "<h1>Access forbidden, kid!</h1>";
}