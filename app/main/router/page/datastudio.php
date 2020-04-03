<?php
//rutas de usuario
$app->get('/dashboard', \App\Controllers\Page\DashboardController::class.':index');
$app->get('/dashboard/{id:[0-9]+}', \App\Controllers\Page\DashboardController::class.':dashboard');
