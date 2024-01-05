<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public static function roles()
    {
        $client = new Client();
        $response = $client->get(
            env('APP_HOST_API') . 'role',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token')
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    public static function users()
    {
        $client = new Client();
        $response = $client->get(
            env('APP_HOST_API') . 'all',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token')
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    public static function addUser($role_id, $name, $email, $password, $confirm_password)
    {
        $client = new Client();
        $response = $client->post(
            env('APP_HOST_API') . 'register',
            [
                'form_params' => [
                    'role_id' => $role_id,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'confirm_password' => $confirm_password
                ]
            ]
        );

        return json_decode($response->getBody());
    }


    public static function deleteUser($id)
    {
        $client = new Client();
        $response = $client->delete(
            env('APP_HOST_API') . 'delete/' . $id,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token')
                ]
            ]
        );

        return json_decode($response->getBody());
    }

    public static function updateUser($id, $name, $email, $role_id)
    {
        $client = new Client();
        $response = $client->post(
            env('APP_HOST_API') . 'edit',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . session('token')
                ],
                'form_params' => [
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'role_id' => $role_id
                ]
            ]
        );

        return json_decode($response->getBody());
    }
}
