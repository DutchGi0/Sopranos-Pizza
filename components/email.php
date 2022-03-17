<?php

if (isset($_POST['sumbit'])) {
    //als de email niet leeg is verstuurd de lijst de mail
    if (isset($_POST['email']) && $_POST['email'] != '') {
        //checkt of de email legit is
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $to = 'joedone@email.com';
            $body = '';

            $body .= 'Van: ' . $name . "\r\n";
            $body .= 'Telefoonnummer: ' . $phone . "\r\n";
            $body .= 'E-mailadres: ' . $email . "\r\n";
            $body .= 'Message: ' . $message . "\r\n";
            mail($to, $subject, $body);
        }
    }
}
?>
