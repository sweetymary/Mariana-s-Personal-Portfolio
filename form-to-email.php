<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>

<?php

include ('index.html');

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Simulating form data for testing purposes
$_POST = [
    'name' => 'testuser',
    'email' => 'tester@example.com',
    'message' => 'message',
	'submit' => 'Submit'  //Simulating the submit button
];
// Retrieve form data
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
 
// Check if the form is submitted
if(!isset($_POST['submit'])) {
    echo "Error: you need to submit the form!";
	exit;
    
}

// Check if name and email are not empty
if(empty($name) || empty($visitor_email)) {
    echo "Name and email are mandatory!";
    exit;
}

// Validate email address
if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format!";
    exit;
}

$email_from = 'mary.pircalabescu@gmail.com';
$email_subject = "New form submission";
$email_body = "You have received a new message from the user $name.\n".
              "Email address: $visitor_email\n".
              "Here is the message:\n $message";

$to = "yo_sweet_mary@yahoo.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";


// Send the email
if(mail($to, $email_subject, $email_body, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email!";
}
 
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	

</body>
</html>