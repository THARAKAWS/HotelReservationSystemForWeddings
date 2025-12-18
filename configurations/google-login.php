<?php
// downloaded this file from google cloud services 
require_once __DIR__ . '/../vendor/autoload.php'; 

use Google\Client as Google_Client;
use Google\Service\Oauth2; 

session_start();

// Google client credentials
$clientID = '1067500891841-p86vaam4qbah71njorghgqceo187fika.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/IWT-Assignment-Y1S2/configurations/callback.php'; 

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
} else {
    
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (array_key_exists('error', $token)) {
            throw new Exception(join(', ', $token));
        }
        $client->setAccessToken($token);

      
        $oauth = new Oauth2($client);
        $userInfo = $oauth->userinfo->get();

      
        $_SESSION['user_email'] = $userInfo->email;
        $_SESSION['user_name'] = $userInfo->name;

      
        header('Location: ../dashboard.php');
        exit();
    } catch (Exception $e) {
       
        echo 'Error: ' . htmlspecialchars($e->getMessage());
        exit();
    }
}
?>