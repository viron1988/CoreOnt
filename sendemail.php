<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Set your email address where you want to receive emails
    $to = "gnrrobotics@gmail.com";
    
    // Set the subject line of the email
    $subject = "New message from $name";
    
    // Construct the email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $name <$email>" . "\r\n";
    
    // Send the email
    mail($to, $subject, $message, $headers);
    
    // Redirect the user to a thank-you page
    header("Location: thank-you.html");
    exit();
}
?>
