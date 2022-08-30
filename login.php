<?php

//AUTOLOAD DO COMPOSER

require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS

use Google\Client as GoogleClient;
use \App\Session\User;


//VALIDAÇÃO PRINCIPAL DO COOKIE

//VERIFICA OS CAMPOS OBRIGATÓRIOS

if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token']))
{
    header('location: index.php');
    exit;
}

// COOKIE CSRF

$cookie = $_COOKIE['g_csrf_token'] ?? '';

//VERIFICA O VALOR DO COOKIE E DO POST PARA O CSRF 

if($_POST['g_csrf_token'] != $cookie){

    header('location: index.php');
    exit;
}

//VALIDAÇÃO SECUNDÁRIA DO TOKEN
//INSTANCIA DO CLIENT
$client = new GoogleClient(['client_id' => '751091202415-bifr539domsp9ejao1qijki0br1adsh9.apps.googleusercontent.com']);  // Specify the CLIENT_ID of the app that accesses the backend

//OBTEM OS DADOS DO CLIENTE COM BASE NO JWT

$payload = $client->verifyIdToken($_POST['credential']);

//VERIFICA OS DADOS DO PAYLOAD

if (isset($payload['email'])) {
    User::login($payload['name'],$payload['email']);

    header('location: index.php');
    exit;
}

//Problemas ao consultar API do google

die('Problemas ao consultar API do google');