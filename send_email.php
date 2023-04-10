<?php
chmod("send_email.php", 0755);

// Replace with your Sendinblue API key
$api_key = "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";

// Set the email address where you want to receive the message
$to_email = "gnrrobotics@gmail.com";

// Get the form data
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Create the email body
$body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

// Send the email using the Sendinblue API
$url = "https://api.sendinblue.com/v3/smtp/email";
$data = array(
    "sender" => array(
        "name" => $name,
        "email" => $email
    ),
    "to" => array(
        array(
            "email" => $to_email
        )
    ),
    "subject" => "New message from $name",
    "htmlContent" => nl2br($body)
);
$options = array(
    "http" => array(
        "method" => "POST",
        "header" => "Content-Type: application/json\r\n" .
                    "api-key: $api_key\r\n",
        "content" => json_encode($data)
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result, true);

// Check if the email was sent successfully
if ($response["code"] == "success") {
    echo "Your message has been sent successfully.";
} else {
    echo "There was an error sending your message. Please try again later.";
}
?>
