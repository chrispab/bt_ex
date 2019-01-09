<?php

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Services
// -----------------------------------------------------------------------------

// view
$container['view'] = function ($c) {
    
    // get the view settings (e.g. template path)
    $settings = $c->get('settings')['view'];
    
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// database
$container['pdo'] = function ($container) {
    
    // get the database settings
    $settings = $container->get('settings')['db'];
    
    // connect to the database
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'] . ";charset=" . $settings['charset'], $settings['user'], $settings['password']);
    
    // set attributes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    return $pdo;
};

// monolog
$container['logger'] = function ($container) {
    
    // get the logging settings
    $settings = $container->get('settings')['logger'];
    
    // register the logger
    $logger = new \Monolog\Logger($settings['name']);
    
    // use StreamHandler
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    
    return $logger;
};

// flash message
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

// -----------------------------------------------------------------------------
// Error handlers
// -----------------------------------------------------------------------------

// default error handler
$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        
        // log the error
        $container['logger']->error($exception->getCode() . ", " . $exception->getMessage(),$request->getParams());
        
        // return error response
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write($exception->getMessage());
    };
};

// -----------------------------------------------------------------------------
// Models
// -----------------------------------------------------------------------------

// default model
$container['contactsModel'] = function ($container) {
    $contactsModel = new App\Model\ContactsModel($container->get('pdo'));
    return $contactsModel;
};

// -----------------------------------------------------------------------------
// Controllers
// -----------------------------------------------------------------------------

// default controller
$container['App\Controller\ContactsController'] = function ($container) {   
    return new App\Controller\ContactsController($container);
};