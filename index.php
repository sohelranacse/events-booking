<?php

require_once 'config/config.php';
require_once 'config/Router.php';
require_once 'config/database.php';
require_once 'helpers/Load.php';

require_once 'models/BookingModel.php';
require_once 'controllers/BookingController.php';
require_once 'controllers/AboutController.php';

$router = new Router();
$model = new BookingModel($db);
$bookingController = new BookingController($model);
$aboutController = new AboutController();

// url routing
$router->addRoute('GET', '/', function() use ($bookingController) {
    $bookingController->index($_GET);
});
$router->addRoute('GET', '/search', function() use ($bookingController) {
    $bookingController->filterBookings($_GET);
});

$router->addRoute('POST', '/', function() use ($bookingController) {
    $bookingController->saveBookingsFromJson();
});

$router->addRoute('GET', '/about', function() use ($aboutController) {
    $aboutController->index();
});

$router->run();