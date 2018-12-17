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
        }
    }
}
