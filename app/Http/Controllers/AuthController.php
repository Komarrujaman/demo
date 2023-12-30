<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.auth.login');
    }

    public function auth(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $auth = Auth::login($email, $password);
        if ($auth && $auth->success == true) {
            Alert::success('Berhasil');
            session(['token' => $auth->data->token, 'name' => $auth->data->name]);
            // Refresh token CSRF setelah login
            $request->session()->regenerateToken();
            return redirect()->route('home');
        } else {
            return redirect('login');
        }
    }

    public function logout()
    {
        session()->forget('token', 'name');
        return redirect('login');
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
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
