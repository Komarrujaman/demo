<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;

    public static function login($email, $password)
    {
        $client = new Client();
        $response = $client->post(env('APP_HOST_API') . 'login', [
            'form_params' => [
                'email' => $email,
                'password' => $password
            ]
        ]);

        return json_decode($response->getBody());
    }
}
