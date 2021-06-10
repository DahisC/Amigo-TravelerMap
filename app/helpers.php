<?php

namespace App;

use GuzzleHttp;

class helpers
{
    public function convertAddressIntoLatLng()
    {
        $client = new GuzzleHttp\Client();
    }

    /**
     * 計算某個經緯度的周圍某段距離的正方形的四個點
     * @param $lat 緯度
     * @param $lng 經度
     * @param float $distance 該點所在圓的半徑，該圓與此正方形內切，預設值為 0.5km
     * @return array
     *
     * ref: https://www.twblogs.net/a/5cb6d663bd9eee0eff457bb5
     */
    const EARTH_RADIUS = 6371; //地球半徑，平均半徑為 6371km
    public static function getSquarePoint($lat, $lng, $distance)
    {
        $dlng = 2 * asin(sin($distance / (2 * self::EARTH_RADIUS) / cos(deg2rad($lat))));
        $dlng = rad2deg($dlng);
        $dlat = $distance / self::EARTH_RADIUS;
        $dlat = rad2deg($dlat);
        return [
            // ['lat' => $lat + $dlat, 'lng' => $lng + $dlng], // 東北
            ['lat' => $lat + $dlat, 'lng' => $lng - $dlng], // 西北
            // ['lat' => $lat - $dlat, 'lng' => $lng - $dlng], // 西南
            ['lat' => $lat - $dlat, 'lng' => $lng + $dlng], // 東南
        ];
    }
}
