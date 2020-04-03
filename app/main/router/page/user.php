<?php
//rutas de usuario
$app->get('/user/signin', \App\Controllers\Page\UserController::class.':signinGet');
$app->post('/user/signin', \App\Controllers\Page\UserController::class.':signinPost');
$app->get('/user/signout', \App\Controllers\Page\UserController::class.':signout');
?>