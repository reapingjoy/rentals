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
    case '/cars' :
        Car::show();
        break;
    case '/booking' :
        echo $request;
        break;
    default:
        echo '404 not found';
        break;
}
?>