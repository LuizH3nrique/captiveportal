<?php

//AUTOLOAD DE CLASSES DO COMPOSER
require __DIR__.'/vendor/autoload.php';

//INCLUSÃO DO HEADER.PHP

use \App\Session\User as SessionUser;

include __DIR__.'/includes/header.php';

//INCLUSÃO DO LOGIN.PHP

include SessionUser::isLogged() ?
 __DIR__.'/includes/admin.php' :
 __DIR__.'/includes/login.php';

//INCLUSÃO DO FOOTER.PHP

include __DIR__.'/includes/footer.php';

?>