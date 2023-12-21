<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class WaterLevel extends Model
{
    use HasFactory;
    public static function mainData()
    {
        $client = new Client();
        $response = $client->get(env('APP_HOST_API') . 'awlr-last');
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
                $loggerData["jenis_{$measurementType}"] = $sensor->jenis;
                $loggerData["sn_{$measurementType}"] = $sensor->sensor_sn;
                $loggerData["{$measurementType}_sensor_id"] = $sensor->sensor_id;
                $loggerData["{$measurementType}_key"] = $sensor->sensor_key;
                $loggerData["{$measurementType}_data_type_id"] = $sensor->data_type_id;
                $loggerData["{$measurementType}_value"] = $sensor->si_value;
                $loggerData["{$measurementType}_unit"] = $sensor->si_unit;
                $loggerData["{$measurementType}_volume"] = $sensor->volume;
                $loggerData["{$measurementType}_debit"] = $sensor->debit;
                $loggerData["{$measurementType}_level_mdpl"] = $sensor->level_mdpl;
            }

            $transformedData[] = $loggerData;
        }
        return $transformedData;
    }
}
