<?php

$info = \App\Session\User::getInfo();

?>
<h1>Login com Google</h1>

<p>Olá, <b><?=$info['name']?></b>. Seja bem vindo.</p>
<p>Você logou com o e-mail <b><?=$info['email']?></b>

<a href="logout.php">
    <button class="btn btn-danger">Sair</button>
</a>

