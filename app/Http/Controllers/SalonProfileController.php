<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Salon;
use App\Models\SalonProfile;
use App\Models\SalonStaff;
use App\Http\Middleware\SalonAuth;

class SalonProfileController extends Controller
{
    private $data;
    private $salon_uid;
    function __construct(){
        // Get Salon data on starting of request.
        $this->middleware('salon.auth');
        $this->middleware(function ($request, $next) {
            $this->salon_uid = Auth::guard('salon')->user()->salon_uid;
            $this->data['salon_details'] = Salon::where('salon_uid',$this->salon_uid)->with('profile')->first();
            return $next($request);
        });
    }

    public function index()
    {
        $this->data['salon_staff'] = optional(SalonStaff::where('salon_uid',$this->salon_uid)->get())->toArray();
        return view('salon.account.profile', $this->data);
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
    public function show(SalonProfile $salonProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalonProfile $salonProfile)
    {
        //
        return view('salon.account.editProfile', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalonProfile $salonProfile)
    {
        $validatedData = $request->validate([

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalonProfile $salonProfile)
    {
        //
    }

    public function update_password(Request $request){
        
        $validatedData = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        
        $salon = Auth::guard('salon')->user();
        $password = Hash::make($validatedData['password']);
        $updatePassword = Salon::where('salon_uid', $salon->salon_uid)->update(['password' => $password]);
        if($updatePassword){
            return redirect()->back()->with('success', errorMessage('PASSWORD_UPDATED_SUCCESS'));
        }else{
            return redirect()->back()->withErrors(errorMessage('PASSWORD_UPDATED_FAILURE'));
        }

    }

    public function update_salon_banner(Request $request){
        $validatedData = $request->validate([
            'banner' => 'required|file|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480|dimensions:max_width=1370,max_height=770'
        ]);
    }

    public function update_salon_logo(Request $request){

    }

    public function update_salon_social_media(Request $request){
        $validateData = $request->validate([
            'social_media_links.*' => 'required'
        ]);

        if(!empty($this->salon->profile->social_media_links)){
            $previous_links = json_decode($this->salon->profile->social_media_links);
            $new_links = $validateData;
        } 


    }
}
