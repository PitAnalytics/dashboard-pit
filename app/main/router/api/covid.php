<?php
//rutas de de covid-api
$app->get('/api/covid', \App\Controllers\Api\CovidController::class.':index');