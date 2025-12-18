<?php
// downloaded this file from google cloud services 
require_once __DIR__ . '/../vendor/autoload.php'; 
use Google\Client;
use Google\Service\Oauth2; 
session_start();

$clientID = '1067500891841-p86vaam4qbah71njorghgqceo187fika.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/IWT-Assignment-Y1S2/configurations/google_redirect.php';
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


if (!isset($_GET['code'])) {
    header('Location: ../login.php'); 
    exit();
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);


$oauth2 = new Google_Service_Oauth2($client);
$userInfo = $oauth2->userinfo->get();


$_SESSION['user_email'] = $userInfo->email;
$_SESSION['user_name'] = $userInfo->name;


header('Location: ../dashboard.php');
exit();
?>
