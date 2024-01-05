<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Admin::users();
        $role = Admin::roles();
        return view('page.user.index', ['user' => $user, 'role' => $role]);
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
        $role_id = $request->input('role_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirm_password =  $request->input('confirm_password');
        $createUser = Admin::addUser($role_id, $name, $email, $password, $confirm_password);

        if ($createUser->success == true) {
            Alert::success('Berhasil', 'User baru berhasil ditambahkan')->autoClose(1000);
            return back();
        } else {
            Alert::error('Gagal', 'Email Sudah Terdaftar');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $role_id  = $request->input('role_id');
        $user = Admin::updateUser($id, $name, $email, $role_id);

        if ($user->success == true) {
            Alert::success('Berhasil', 'User baru berhasil di update')->autoClose(1000);
            return back();
        } else {
            Alert::error('Gagal', 'Cek Kembali Data User');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin, $id)
    {
        $user = Admin::deleteUser($id);
        return back();
    }
}
