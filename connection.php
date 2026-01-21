<?php



header('Content-Type: application/json');
error_reporting(0);

$servername="localhost";
$username= "root";
$password="";
$conn = mysqli_connect($servername,$username,$password);

if($conn){

}
else{
    
}

$createDatabase = "CREATE DATABASE IF NOT EXISTS prototype2";
if (mysqli_query($conn, $createDatabase)) {
    
} else {
    
}


mysqli_select_db($conn, 'prototype2');


$createTable = "CREATE TABLE IF NOT EXISTS weather (
    City varchar(100) NOT NULL,
    Weather_Condition varchar(100) NOT NULL,
    Humidity FLOAT NOT NULL,
    Wind_Speed FLOAT NOT NULL,
    Pressure FLOAT NOT NULL,
    Temperature FLOAT NOT NULL,
    Icon varchar(100) NOT NULL,
    Small_Weather_Condition varchar(100) NOT NULL,
    Dates varchar(100) NOT NULL,
    CacheTime INT NOT NULL 
);";

if (mysqli_query($conn, $createTable)) {
   
} else {
    
}

if(isset($_GET['q'])){
    $cityName = $_GET['q'];
   if(empty($cityName)){
    echo json_encode(["error" => "City not Found!"]);
   }
}

else{
    $cityName = "Biratnagar";
}

$currentTime= time();

$selectAllData = "SELECT * FROM weather where City = '$cityName'";
$result = mysqli_query($conn, $selectAllData);


if(mysqli_num_rows($result)> 0){

$row = mysqli_fetch_assoc($result);

$cacheTime= (int)$row['CacheTime'];

if (($currentTime - $cacheTime) < 7200){

echo json_encode($row);
exit;

}

}

$API_KEY = "ea3af175a54d9a343657b1de3aab08b4";
$url = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$API_KEY&units=metric";
 $response = @file_get_contents($url);
$data = json_decode($response, true); 

    
if($response=== FALSE || !isset($data['name'])){
echo json_encode(["error" => "City not Found!",]);

exit;

}

    $city=$data['name'];
    $icon=$data['weather'][0]['icon'];
    $weather_condition = $data['weather'][0]['description'];
    $humidity = $data['main']['humidity'];
    $wind = $data['wind']['speed'];
    $pressure = $data['main']['pressure'];
    $temperature=$data['main']['temp']; 
    $main=$data['weather'][0]['main'];
    $dbtime= time();
    $db_created_time = date("d M Y, l");
    

$insertData = "INSERT INTO weather (City, Weather_Condition, Humidity, Wind_Speed, Pressure,Temperature, Icon, Small_Weather_Condition, Dates,CacheTime) VALUES ('$city','$weather_condition','$humidity', '$wind', '$pressure', '$temperature','$icon','$main','$db_created_time','$dbtime')";

mysqli_query($conn, $insertData);
 

$result = mysqli_query($conn, $selectAllData);

$row = mysqli_fetch_assoc($result);

echo json_encode($row);
?>

    