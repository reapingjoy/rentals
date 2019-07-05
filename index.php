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
        if($_POST){
         $status = Car::createNewCar($_POST);  
        }
        $brands = Car::getAllBrands();
        $engines = Car::getAllEngines();
        $features = Car::getAllFeatures();
        require __DIR__ . '/views/add-car.php';
        break;
    // case '/cars/create' :
    //     Car::createNewCar($_POST);
    //     require __DIR__ . '/views/add-car.php';
    //     break;
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
        echo $request;
        break;
    case '/cars/features' :
        $car_id = $_POST['car_id'];
        echo json_encode(Car::getCarFeatures($car_id));
        break;
    case '/cars/models-by-brand' :
        $brand_id = $_POST['brand_id'];
        echo json_encode(Car::getModelsByBrand($brand_id));
        break;
    

// Booking routes
    case '/bookings/form' :
        if($_POST){
          $status = Booking::create($_POST['booked_from'],$_POST['booked_to'],$_POST['cars'],$_POST['total']);  
        }
        $cars = Car::getAllCars();
        require __DIR__ . '/views/booking-form.php';
        break;
    // case '/bookings/create' :
    //     Booking::create($_POST['booked_from'],$_POST['booked_to'],$_POST['cars'],$_POST['total']);
    //     break;
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
        $booked_from = $_POST['booked_from'];
        $booked_to = $_POST['booked_to'];
        $workdays = Booking::getWorkingDays($booked_from, $booked_to);
        echo Booking::checkTotal($workdays);
        break;
    case '/bookings/models-by-brand' :
        $brand_id = $_POST['brand_id'];
        echo json_encode(Booking::getModelsByBrand($brand_id));
        break;
    case '/bookings/years-by-model' :
        $model_id = $_POST['model_id'];
        echo json_encode(Booking::getYearsByModel($model_id));
        break;
    case '/bookings/bookings-by-date-range' :
        $filter_from = $_POST['filter_from'];
        $filter_to = $_POST['filter_to'];
        $bookings = Booking::getBookingsByDateRange($filter_from, $filter_to);

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
        $booked_brands = Booking::getBookedBrands();
        require __DIR__ . '/views/reports.php';
        break;

// Not Found
    default:
        require __DIR__ . '/views/404.php';
        break;
}
?>