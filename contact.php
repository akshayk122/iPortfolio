<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Add your email address where you want to receive the messages
    $to = 'your_email@example.com';

    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $mailBody = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    if (mail($to, $subject, $mailBody, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    // If it's not a POST request, redirect back to the contact form
    header("Location: ../contact.html");
    exit;
}
?>
