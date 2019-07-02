<?php

require_once('classes/Car.php');

$request = str_replace("/rentals", "",  $_SERVER["REQUEST_URI"]);

switch ($request) {
    case '/' :
        $var = 'test';
        Car::index($var);
        break;
    case '' :
        echo $request;
        break;
    case '/car-form' :
        require __DIR__ . '/views/car-form.php';
        break;
    case '/booking-form' :
        require __DIR__ . '/views/booking-form.php';
        break;
    default:
        echo '404 not found';
        break;
}
?>