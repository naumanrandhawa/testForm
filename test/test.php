<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Submission with PHPMailer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<?php
// Include PHPMailer autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // Use PHPMailer to send email

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'testformtry@gmail.com'; // SMTP username
    $mail->Password = 'glhemufqetjlnjqy'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; // SMTP port (TLS)
    $mail->setFrom('test@gmail.com', 'Your Name');
    $mail->addAddress('testformtry@gmail.com', 'Recipient Name');
    $mail->Subject = 'New form submission';
    $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

    // Send email
    if ($mail->send()) {
        echo "<p>Thank you for your submission!</p>";
    } else {
        echo "<p>Sorry, there was an error submitting your form. Please try again later.</p>";
        echo "<p>Error: " . $mail->ErrorInfo . "</p>";
    }
}
?>
<div class="container">
    <h2>Submit Form</h2>

    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea id="message" name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
