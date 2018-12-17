 <?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => "App\Http\Controllers\Api"], function($api) {
    $api->get('weather/citys', "WeatherController@getCitys");
    $api->get('weather/city', "WeatherController@getWeatherByCity");
    $api->get('weather/ip', "WeatherController@getWeatherByIP");
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});