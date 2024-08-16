<?php

namespace App\Services;

use Google\Auth\OAuth2;
use Google\Client;
use Illuminate\Support\Facades\Request;

class GoogleLoginService
{
    private string $clientid;

    private string $secretclient;

    private string $redirecturl;

    public function __construct() {
        $this->clientid = env('CLIENT_ID', null);
        $this->secretclient = env('SECRET_CLIENT', null);
        $this->redirecturl = env('REDIRECT_URL', null);
    }

    public function generateUrlLogin() {

        $client = new Client();
        // $client->setAuthConfigFile('client_secrets.json');
        $client->setClientId($this->clientid);
        $client->setClientSecret($this->secretclient);
        $client->setRedirectUri($this->redirecturl);
        $client->addScope('email');
        $client->addScope('profile');

        if (! isset($_GET['code'])) {
            return $client->createAuthUrl();
            // header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            // Configurar el cliente para usar el token de acceso

            // Obtener la información del perfil del usuario
            $oauth2 = new \Google\Service\Oauth2($client);
            $userInfo = $oauth2->userinfo->get();
            return $userInfo;
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            return 'Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL);
            // header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }


        // $token = $client->fetchAccessTokenWithAuthCode($code);
        // $client = $client->setAccessToken($token['access_token']);

        //get profile info

        // $google_oauth = new OAuth2($client);

    }
}
