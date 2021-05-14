<?php
	// define API_KEY constant to store your API Key
	// please get your API Key by registering yours at: 
	// https://developers.accuweather.com/
	//jgxAwAYiOV1kTM2wPkWavN8FJOAHA9o2
	define('API_KEY','AfQDsAklfRngIO14X2eWnV9jP9teK7dA');
	// If the API Key doesn't work because it has reach its limit of 50 requests,
	// Delete the old key and create a new one.

	$apikey = API_KEY;

	// Use this when testing in localhost
	// $user_ip = '123.16.195.21';

	// Use this when you public your web site
	// $user_ip = '27.76.97.87';
	// $user_ip = '113.160.86.58';
	// $user_ip = file_get_contents('http://checkip.dyndns.com/');
	// //echo $user_ip;
	// $user_ip = str_replace("Current IP Address: ","",$user_ip);
    // $user_ip = '42.112.94.124';
    // $user_ip = '10.66.8.11';
	// $user_ip = '127.0.0.1';

	$user_ip = '123.16.195.21';


	// $user_ip = $_SERVER['REMOTE_ADDR'];

	// echo $user_ip;





	$location = json_decode(file_get_contents("http://dataservice.accuweather.com/locations/v1/cities/ipaddress?apikey={$apikey}&q={$user_ip}"), true);

	$loc_key = $location['Key'];
	
	$weather = json_decode(file_get_contents("http://dataservice.accuweather.com/currentconditions/v1/{$loc_key}?apikey={$apikey}"), true);

	//print_r($location);
	//echo "<hr>";
	//print_r($weather);
	//echo "<hr>";

	$city = $location['EnglishName'];
	$country = $location['Country']['EnglishName'];
	$dt = $weather[0]['LocalObservationDateTime'];
	$temp = $weather[0]['Temperature']['Metric']['Value'];
	$img = $weather[0]['WeatherIcon'];
		if($img<10) {
			$img = "0{$img}";
		}

	echo '<h6><i class="fas fa-search-location"></i>&nbsp;&nbsp;';
	echo $city . ', ' . $country . '&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<i class="far fa-calendar-alt"></i></i>&nbsp;&nbsp;' . substr($dt,0,10);

	// echo substr($dt,0,10) . " " . substr($dt,11,8);
	// echo substr($dt,0,10);
	// echo '<p>' . $dt . '</p>';
	echo "</h6>&nbsp;&nbsp;&nbsp;&nbsp;<h6>Temperature: {$temp}&#8451;</h6><br/>";
	echo "<img src='https://developer.accuweather.com/sites/default/files/{$img}-s.png'>";
	// echo '<i class="fas fa-clock"></i>&nbsp;&nbsp;' . substr($dt,0,10);

?>