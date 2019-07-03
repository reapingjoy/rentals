<?php

require_once('classes/Car.php');

$request = str_replace("/rentals", "",  $_SERVER["REQUEST_URI"]);

switch ($request) {
    case '/' :
        require __DIR__ . '/views/home.php';
        break;
    case '' :
        require __DIR__ . '/views/home.php';
        break;
    case '/car/create' :
        require __DIR__ . '/views/car-form.php';
        break;
    case '/booking/create' :
        require __DIR__ . '/views/booking-form.php';
        break;
    case '/reports' :
        require __DIR__ . '/views/reports.php';
        break;
    default:
        echo '404 not found';
        break;
}
?>