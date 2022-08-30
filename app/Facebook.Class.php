<?php

require __DIR__.'/vendor/autoload.php';

class Verifica{

    public function VerificaLogin() {

        $facebook_helper = $facebook->getRedirectLoginHelper();

        if(isset($_GET['code']))
        {
            if(isset($_SESSION['access_token']))
            {
                $access_token = $_SESSION['access_token'];
            }
            else
            {
            $access_token = $facebook_helper->getAccessToken();

            $_SESSION['access_token'] = $access_token;

            $facebook->setDefaultAccessToken($_SESSION['access_token']);
            }
        };
    }

    public function SessionCheck() {

        $_SESSION['user_id'] = '';
        $_SESSION['user_name'] = '';
        $_SESSION['user_email_address'] = '';
        $_SESSION['user_image'] = '';

        $graph_response = $facebook->get("/me?fields=name,email", $access_token);

        $facebook_user_info = $graph_response->getGraphUser();

        if(!empty($facebook_user_info['id']))
        {
        $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
        }

        if(!empty($facebook_user_info['name']))
        {
        $_SESSION['user_name'] = $facebook_user_info['name'];
        }

        if(!empty($facebook_user_info['email']))
        {
        $_SESSION['user_email_address'] = $facebook_user_info['email'];
        }
        else
        {
        // Get login url
            $facebook_permissions = ['email']; // Optional permissions

            $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:8080/wifi/', $facebook_permissions);
            
            // Render Facebook login button
            $facebook_login_url = '<div  align="center"><a href="'.$facebook_login_url.'"><img src="facebook.svg" height="150" width="300" /></a></div>';
        }
    }
}

?>