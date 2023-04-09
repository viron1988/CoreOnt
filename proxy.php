<?php

// Get the data from the POST request
$postData = file_get_contents('php://input');

// Set the URL of your AWS server
$url = 'http://44.208.130.22/sendemail.php';

// Set any headers that are required for your request (e.g. Content-Type)
$headers = array('Content-Type: application/json');

// Initialize a new cURL session
$curl = curl_init($url);

// Set the cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request and get the response
$response = curl_exec($curl);

// Close the cURL session
curl_close($curl);

// Save the response to a file
file_put_contents('response.log', $response);

// Return a success message to the client
echo 'Request completed successfully.';
?>
