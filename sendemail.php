<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Set your SendGrid API key
    $api_key = "TQu3oz1fR_uVWEig9gu5yg";
    
    // Set the recipient email address
    $to = "gnrrobotics@gmail.com";
    
    // Set the subject line of the email
    $subject = "New message from $name";
    
    // Construct the email headers
    $headers = array(
        "Authorization: Bearer $api_key",
        "Content-Type: application/json"
    );
    
    // Construct the email body as a JSON string
    $email_data = array(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => "gnrrobotics@gmail.com"
                    )
                )
            )
        ),
        "from" => array(
            "email" => "gnrrobotics@gmail.com",
            "name" => "gnrrobotics"
        ),
        "subject" => $subject,
        "content" => array(
            array(
                "type" => "text/plain",
                "value" => $message
            )
        )
    );
    $json_email = json_encode($email_data);
    
    // Send the email using the SendGrid API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_email);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    
    // Redirect the user to a thank-you page
    header("Location: thank-you.html");
    exit();
}
?>
