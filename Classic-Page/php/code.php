<?php

require 'connection.php';

function appendOrInit(&$array, $key, $value) //if key is set, it will append value into array, if not, it creates then initialises
{
    if (!isset($array[$key])) { //checks if they key is in the array
        $array[$key] = array(); // if true, create index and assign to array
    }
    $array[$key][] = $value;    //append value to array with index; append using symbol for 2D-arrays
}

function get_package_details($pdo, $package_type)
{
    $stmt = $pdo->prepare(
        "SELECT package.Package_ID, package.Day,tour.Site_Name, tour.Description, tour.Start_Time, tour.End_Time,  package.Price
            FROM toursession
        JOIN package USING(Package_ID)
        JOIN tour USING(Tour_ID)
        WHERE
            package_type = :package_type
        ORDER BY package.Day
        "
    );
    $stmt->execute([':package_type' => $package_type]);
    $tours = $stmt->fetchAll(PDO::FETCH_ASSOC); //associative array so index can be string
    $result = [];
    foreach ($tours as $tour) {
        appendOrInit($result, $tour['Day'], $tour); //Grouping tours by day
    }
    $result_string =  json_encode($result);

    // return "beforereturn";
    return $result_string;
}



// [
//     "Sunday" => [tours[0], tours[10], tours[12]],
//     "Monday" => [],
//     "Tuesday" => [],
//     "Wednesday" => [],
// ]