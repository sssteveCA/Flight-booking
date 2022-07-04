<?php
//This script is used to get the Flight Events info from datatabse

require_once("./vendor/autoload.php");

use App\Http\Controllers\welcome\FlightEventsController;

$response = array();
$fec = new FlightEventsController();
$response['flight_events'] = $fec->getAll();

echo response()->json($response);


?>