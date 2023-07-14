<?php

require_once 'config/database.php';
require_once 'models/BookingModel.php';
require_once 'controllers/BookingController.php';

$model = new BookingModel($db);
$controller = new BookingController($model);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->filterBookings($_GET);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'import') {
        $controller->saveBookingsFromJson('events.json');
        echo "JSON data imported successfully!";
    }
}
