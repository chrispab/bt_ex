<?php

// Routes
$app->get('/', 'App\Controller\ContactsController:search');
$app->map(['GET', 'POST'], '/edit/{id}', 'App\Controller\ContactsController:edit');