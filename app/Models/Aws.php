<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aws extends Model
{
    use HasFactory;

    public static function mainData()
    {
        $client = new Client();
        $response = $client->get(env('APP_HOST_API') . 'aws-last');
        $res = json_decode($response->getBody());
        $transformedData = [];

        foreach ($res as $item) {
            $loggerData = [
                'id' => $item->id,
                'sn' => $item->sn,
                'nama' => $item->nama,
                'lat' => $item->lat,
                'lng' => $item->lng,
                'created_at' => $item->created_at,
            ];

            foreach ($item->sensors as $sensor) {
                $measurementType = strtolower(str_replace(' ', '_', $sensor->measurement_type));
                $loggerData["sn_{$measurementType}"] = $sensor->sensor_sn;
                $loggerData["{$measurementType}_sensor_id"] = $sensor->sensor_id;
                $loggerData["{$measurementType}_key"] = $sensor->sensor_key;
                $loggerData["{$measurementType}_data_type_id"] = $sensor->data_type_id;
                $loggerData["{$measurementType}_value"] = $sensor->si_value;
                $loggerData["{$measurementType}_unit"] = $sensor->si_unit;
                $loggerData["{$measurementType}_timestamp"] = $sensor->timestamp;
            }

            $transformedData[] = $loggerData;
        }
        return $transformedData;
    }

    public static function detailData($sn)
    {
        $client = new Client();
        $response = $client->post(env('APP_HOST_API') . 'aws-detail/' . $sn);
        $res = json_decode($response->getBody());
        return $res;
    }
}
