<?php 
if ( !function_exists('add_action') ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class ThoiTietAPI{
	public static function getWeather($city = 'Hanoi', $temp = 'c'){
		$units = $temp == 'c' ? 'metric' : 'imperial';
		$city = urlencode(trim($city));
		$url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&units='.$units.'&appid='.APPID;
		@$fget = file_get_contents($url);
		if($fget){
			return json_decode($fget,true);
		}
		return false;
	}
}