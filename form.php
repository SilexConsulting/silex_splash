<?php

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');

require "vendor/autoload.php";

use Guzzle\Http\Client;

$client = new Client();

$request = $client->post('https://script.google.com/macros/d/MRlqlSWhYpttFwA8eAwPPe12tz4iPQq8U/exec')
    ->setPostField('email', $email)
    ->setPostField('timestamp', date("d/m/Y H:i:s"));

$response = $request->send();

echo $response->getStatusCode();

// Sent to $email variable

$subject = 'Thank you for your interest';

$message = '
<html>
<head>
  <title>Thank you for registering your interest in Silex Consulting.</title>
</head>
<body>
  <p>You will be the first to know any news about Silex Consulting.</p>
  <p>Follow us on Twitter. <a href="http://twitter.com/silexconsulting">CLICK HERE</a></p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Silex Consulting <donotreply@silex-consulting.co.uk>' . "\r\n";

// Mail it
mail($email, $subject, $message, $headers);
