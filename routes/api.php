 <?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => "App\Http\Controllers\Api"], function($api) {
    $api->get('weather', "WeatherController@getCitys");
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});