<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    public function adminLoginPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // validation false send error in array

        $credentials = request(['username', 'password']);
        if(!Auth::guard('admin')->attempt($credentials))
        return redirect()->route('admin.login')->withErrors('Invalid Credentials!');

        // Check if the admin is authenticated
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            return redirect()->route('admin.login')->withErrors('Authentication Failed!');
        }

        $request->session()->regenerate();
        session(['user_type' => 'admin']);
        return redirect()->route('admin.dashboard')->withSuccess('message', 'Login Successfully!');

    }

    public function dashboard(){
        return view('admin.home.dashboard');
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
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/admin');
    }

    public function generatePassword($newPass = 'Admin@123'){
        return Hash::make($newPass);
    }
}
