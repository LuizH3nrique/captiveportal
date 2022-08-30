
<div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                    <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Bem Vindo<br>A<br>Comepi Wifi Free</h2>
                    <p class="text-white-50 mb-5">Entre com seu cadastro do <b>CLUBE<b>!</p>
                    <div class="form-outline form-white mb-4">  
                      <!---    <label class="form-label" for="typeEmailX">Email</label> -->
                      <!---    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" /> -->

                    </div>
<!---
                    <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-white mb-4">
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                    </div> -->
                    <div class="form-outline form-white mb-4">
                    <!--<label class="form-label" for="typeGoogle">Ou</label>-->
                    <script src="https://accounts.google.com/gsi/client" async defer></script>
                        <div id="g_id_onload"
                            data-client_id="751091202415-bifr539domsp9ejao1qijki0br1adsh9.apps.googleusercontent.com"
                            data-login_uri="http://localhost:8080/wifi/login.php"
                            data-auto_prompt="false">
                        </div>
                        <div class="g_id_signin"
                            data-type="standard"
                            data-size="large"
                            data-theme="filled_blue"
                            data-text="sign_in_with"
                            data-shape="circle"
                            data-logo_alignment="left"
                            data-locale="pt_BR">
                        </div>
                    <!-- LOCAL PARA INSERIR VALIDAÇÃO COM O GOOGLE -->
                        </div>
                        <div class="form-outline form-white mb-4">
                        <?php

                        //index.php

                        include('config.php');

                        $facebook_output = '';

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
                        
                        }
                        else
                        {
                        // Get login url
                            $facebook_permissions = ['email']; // Optional permissions

                            $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost:8080/wifi/', $facebook_permissions);
                            
                            // Render Facebook login button
                            $facebook_login_url = '<div  align="center"><a href="'.$facebook_login_url.'"><img src="facebook.svg" height="150" width="300" /></a></div>';
                        }
                        ?>

                        <div class="panel panel-default">
                        <?php 
                        if(isset($facebook_login_url))
                        {
                        echo $facebook_login_url;
                        }
                        else
                        {
                        echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                        echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                        echo '<h3><b>Name :</b> '.$_SESSION['user_name'].'</h3>';
                        echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                        echo '<h3><a href="logout.php">Logout</h3></div>';
                        }
                        ?>
                        </div>
                    </div>
                    </form> 
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>