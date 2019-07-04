<?php

spl_autoload_register(function ($class_name) {
  include './classes/'.$class_name.'.php';
});

// require_once('classes/Car.php');
// require_once('classes/Booking.php');
require_once('config/db_config.php');

$request = str_replace("/rentals", "",  $_SERVER["REQUEST_URI"]);

switch ($request) {

// Home routes
    case '/' :
        require __DIR__ . '/views/home.php';
        break;
    case '' :
        require __DIR__ . '/views/home.php';
        break;

// Car routes
    case '/cars/form' :
        $brands = Car::index();
        require __DIR__ . '/views/car-form.php';
        break;
    case '/cars/show' :
        echo $request;
        break;
    case '/cars/update' :
        echo $request;
        break;
    case '/cars/delete' :
        echo $request;
        break;
    case '/cars/list' :
        Car::getAllCars();
        break;

    case '/brands/list' :
        Car::index();
        break;
    case '/cars/features' :
        $car_id = $_POST['car_id'];
        echo json_encode(Car::getCarFeatures($car_id));
        break;

// Booking routes
    case '/bookings/form' :
        $cars = Car::getAllCars();
        $features = Car::getCarFeatures(1);
        require __DIR__ . '/views/booking-form.php';
        break;
    case '/bookings/create' :
        Booking::create($_POST['booked_from'],$_POST['booked_to'],$_POST['cars'],$_POST['total']);
        break;
    case '/bookings/show' :
        echo $request;
        break;
    case '/bookings/update' :
        echo $request;
        break;
    case '/bookings/delete' :
        echo $request;
        break;
    case '/bookings/list' :
        echo $request;
        break;
    case '/bookings/workdays' :
        $startDate = '2019-07-08';
        $endDate = '2019-07-22';
        Booking::getWorkingDays($startDate, $endDate);
        break;
    case '/bookings/check-total' :
        $booked_from = $_POST['booked_from'];
        $booked_to = $_POST['booked_to'];
        $workdays = Booking::getWorkingDays($booked_from, $booked_to);
        echo Booking::checkTotal($workdays);
        break;

// Price Plans routes
    case '/price-plans/create' :
        echo $request;
        break;
    case '/price-plans/show' :
        echo $request;
        break;
    case '/price-plans/update' :
        echo $request;
        break;
    case '/price-plans/delete' :
        echo $request;
        break;
    case '/price-plans/list' :
        echo $request;
        break;

// Report routes
    case '/reports' :
        require __DIR__ . '/views/reports.php';
        break;

// Not Found
    default:
        echo '404 not found';
        break;
}
?>