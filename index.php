<?php

spl_autoload_register(function ($class_name) {
  include './classes/'.$class_name.'.php';
});

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
        $car = new Car();
        if($_POST){
         $status = $car->createNewCar($_POST);  
        }
        $brands = $car->getAllBrands();
        $engines = $car->getAllEngines();
        $features = $car->getAllFeatures();
        require __DIR__ . '/views/add-car.php';
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
        $car = new Car();
        $car->getAllCars();
        break;
    case '/brands/list' :
        echo $request;
        break;
    case '/cars/features' :
        $car = new Car();
        $car_id = $_POST['car_id'];
        echo json_encode($car->getCarFeatures($car_id));
        break;
    case '/cars/models-by-brand' :
        $car = new Car();
        $brand_id = $_POST['brand_id'];
        echo json_encode($car->getModelsByBrand($brand_id));
        break;
    

// Booking routes
    case '/bookings/form' :
        $booking = new Booking();
        if($_POST){
          $status = $booking->create($_POST['booked_from'],$_POST['booked_to'],$_POST['cars'],$_POST['total']);  
        }
        $car = new Car();
        $cars = $car->getAllCars();
        require __DIR__ . '/views/booking-form.php';
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
    case '/bookings/check-total' :
        $booking = new Booking();
        $booked_from = $_POST['booked_from'];
        $booked_to = $_POST['booked_to'];
        $workdays = $booking->getWorkingDays($booked_from, $booked_to);
        echo $booking->checkTotal($workdays);
        break;
    case '/bookings/models-by-brand' :
        $booking = new Booking();
        $brand_id = $_POST['brand_id'];
        echo json_encode($booking->getModelsByBrand($brand_id));
        break;
    case '/bookings/years-by-model' :
        $booking = new Booking();
        $model_id = $_POST['model_id'];
        echo json_encode($booking->getYearsByModel($model_id));
        break;
    case '/bookings/bookings-by-date-range' :
        $book = new Booking();
        $filter_from = $_POST['filter_from'];
        $filter_to = $_POST['filter_to'];
        $bookings = $book->getBookingsByDateRange($filter_from, $filter_to);

        $brands = array();
        $models = array();
        $years = array();
        $engines = array();
        foreach($bookings as $booking) {
          $brands[$booking['brand_name']] = $booking['brand_name'];
          $models[$booking['model_name']] = $booking['model_name'];
          $years[$booking['manufacture_year']] = $booking['manufacture_year'];
          $engines[$booking['engine_id']] = $booking['fuel_type'].' - '.$booking['transmission'];
        }


        require __DIR__ . '/views/report-result.php';
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
        $book = new Booking();
        $booked_brands = $book->getBookedBrands();
        require __DIR__ . '/views/reports.php';
        break;

// Not Found
    default:
        require __DIR__ . '/views/404.php';
        break;
}
?>