<?php

//AUTOLOAD DO COMPOSER

require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS

use \App\Session\User as SessionUser;

SessionUser::logout();

header('Location: index.php');
exit;