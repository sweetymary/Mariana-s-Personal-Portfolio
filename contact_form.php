<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>

<?php

// Load configuration
$config = include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php'; // Loads PHPMailer through Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch POST data
$name = $_POST['name'] ;
$email = $_POST['email'] ;
$message = $_POST['message'] ; 

$mail = new PHPMailer(true);    //Enable exceptions

try {
    //Server settings
    $mail->SMTPDebug = 0;                                      // Enable verbose debug output (0 for no output)
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main SMTP server (Gmail in this case)
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $config['smtp_username'];                 // SMTP username (your Gmail account)
    $mail->Password   = $config['smtp_password'];                  // SMTP password (use an App password for Gmail)
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mary.pircalabescu@gmail.com', 'Mariana Pircalabescu');
    $mail->addAddress('yo_sweet_mary@yahoo.com', 'Mariana Claudia'); // Add recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = ' ';
    $mail->Body   = "Name: " . htmlspecialchars($name) . "<br>
                     Email: " . htmlspecialchars($email) . "<br>
                     Message: " . nl2br(htmlspecialchars($message));
    

    $mail->send();
    echo 'Thank you for reaching out to me. I will get back to you shortly!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	

</body>
</html>
