<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lib\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weather;

    public function __construct()
    {
        $this->weather = new Weather(config("openapi.weather.appkey"));
    }

    public function getCitys()
    {
        $citysResult = $this->weather->getCitys();

        if ($citysResult['error_code'] == 0) {
            return $citysResult;
        } else {
            return $citysResult['error_code'].":".$citysResult['reason'];
        }
    }

    // 根据城市 ID 或城市名称获取天气
    public function getWeatherByCity(Request $request)
    {
        $city = $request->city;
        $cityWeatherResult = $this->weather->getWeather($city);

        if ($cityWeatherResult['error_code'] == 0) {
            $data = $cityWeatherResult['result'];
            return $data;
        } else {
            return $cityWeatherResult['error_code'].":".$cityWeatherResult['reason'];
        }
    }

    public function getWeatherByIP(Request $request)
    {
        $ip = $request->ip;
        $ipWeatherResult = $this->weather->getWeatherByIP($ip);

        if ($ipWeatherResult['error_code'] == 0) {
            $data = $ipWeatherResult['result'];
            return $data;
        } else {
            return $ipWeatherResult['error_code'].":".$ipWeatherResult['reason'];
        }
    }

    // 根据 GPS 获取天气
    public function getWeatherByGeo(Request $request)
    {
        $geoWeatherResult = $this->weather->getWeatherByGeo(116.401394, 39.916042);

        if ($geoWeatherResult['error_code'] == 0) {    //以下可根据实际业务需求，自行改写
            return $geoWeatherResult['result'];
        } else {
            return $geoWeatherResult['error_code'].":".$geoWeatherResult['reason'];
        }
    }

    // 根据城市 ID 或城市名称获取三小时内的天气
    public function getForecast(Request $request)
    {
        $forecastResult = $this->weather->getForecast($request->city);

        if ($forecastResult['error_code'] == 0) {
            return = $forecastResult['result'];
        } else {
            return $forecastResult['error_code'].":".$forecastResult['reason'];
        }
    }
}
