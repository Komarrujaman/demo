<?php

namespace App\Http\Controllers;

use App\Models\Aws;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AwsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sn)
    {
        $aws = Aws::detailData($sn);
        $temperature = [];
        foreach ($aws->sensors as $sensor) {
            if ($sensor->measurement_type === 'Temperature') {
                foreach ($sensor->data_sensor as $value) {
                    $temperature[] = [
                        'si_value' => $value->si_value,
                        'timestamp' => $value->timestamp,
                    ];
                }
            }
        }

        $humidity = [];
        foreach ($aws->sensors as $sensor) {
            if ($sensor->measurement_type === 'RH') {
                foreach ($sensor->data_sensor as $value) {
                    $humidity[] = [
                        'si_value' => $value->si_value,
                        'timestamp' => $value->timestamp,
                    ];
                }
            }
        }

        $solar_rad = [];
        foreach ($aws->sensors as $sensor) {
            if ($sensor->measurement_type === 'Solar Radiation') {
                foreach ($sensor->data_sensor as $value) {
                    $solar_rad[] = [
                        'si_value' => $value->si_value,
                        'timestamp' => $value->timestamp,
                    ];
                }
            }
        }
        return view('page.details.aws', ['aws' => $aws, 'temperature' => $temperature, 'hum' => $humidity, 'solar_rad' => $solar_rad]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('page.device.aws.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aws $aws)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aws $aws)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aws $aws)
    {
        //
    }
}
