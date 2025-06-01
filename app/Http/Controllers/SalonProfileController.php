<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Salon;
use App\Models\SalonProfile;
use App\Models\SalonStaff;
use App\Models\StateMaster;
use App\Models\CityMaster;
use App\Models\PincodeMaster;
use App\Http\Middleware\SalonAuth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SalonProfileController extends Controller
{
    private $data;
    private $salon_uid;
    function __construct(){
        // Get Salon data on starting of request.
        $this->middleware('salon.auth');
        $this->middleware(function ($request, $next) {
            $this->salon_uid = Auth::guard('salon')->user()->salon_uid;
            $this->data['salon_details'] = Salon::where('salon_uid',$this->salon_uid)->with(['profile.state_master', 'profile.city_master'])->first();
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
        $this->data['state'] = optional(StateMaster::where('status', 1)->get())->toArray();
        $this->data['tab'] = session('active_tab', 'basicDetails');
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

    public function update_salon_banner(Request $request){
        $validatedData = $request->validate([
            'salon_banner' => 'required|file|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480'
        ]);

        if ($request->hasFile('salon_banner')) {
            $asset = $request->file('salon_banner'); // Get the single file
            $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
            $directory = $this->salon_uid;

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                chmod(storage_path('app/public/' . $directory), 0775);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $banner_url = $assetPath;
            $validatedData['salon_banner'] = $banner_url;
        }

        
        //delete Previous Image if in folder
        if($this->data['salon_details']->profile->salon_banner && !empty($this->data['salon_details']->profile->salon_banner)) {
            $oldImagePath = str_replace('/storage/', '', $this->data['salon_details']->profile->salon_banner);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }
        $update_banner = SalonProfile::updateOrCreate(['salon_uid' => $this->salon_uid],$validatedData);
        if($update_banner){
            return response()->json(['type' => 'success', 'message' => 'Banner Updated Successfully!', 'new_banner_url' => asset($banner_url)]);
        }else{
            return response()->json(['type' => 'error', 'message' => 'Oops, Something went wrong!']);
        }
    }

    public function update_salon_logo(Request $request){
        $validatedData = $request->validate([
            'salon_logo' => 'required|file|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480|dimensions:max_width=500,max_height=500'
        ]);

        if ($request->hasFile('salon_logo')) {
            $asset = $request->file('salon_logo'); // Get the single file
            $filename = Str::random(20).'-'.time() . '.' . $asset->getClientOriginalExtension();
            $directory = $this->salon_uid;

            // Ensure the directory exists and set permissions
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                chmod(storage_path('app/public/' . $directory), 0775);
            }

            $path = $asset->storeAs($directory, $filename, 'public');
            $assetPath = Storage::url($path);
            $logo_url = $assetPath;
            $validatedData['salon_logo'] = $logo_url;
        }

        
        //delete Previous Image if in folder
        if($this->data['salon_details']->profile->salon_logo && !empty($this->data['salon_details']->profile->salon_logo)) {
            $oldImagePath = str_replace('/storage/', '', $this->data['salon_details']->profile->salon_logo);
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }
        $update_logo = SalonProfile::updateOrCreate(['salon_uid' => $this->salon_uid],$validatedData);
        if($update_logo){
            return response()->json(['type' => 'success', 'message' => 'Logo Updated Successfully!', 'new_logo_url' => asset($logo_url)]);
        }else{
            return response()->json(['type' => 'error', 'message' => 'Oops, Something went wrong!']);
        }
    }

    public function update_salon_social_media(Request $request){
        $validatedData = $request->validate([
            'social_media_links.*' => 'required'
        ]);

        $salon_profile_update = SalonProfile::where('salon_uid', $this->salon_uid)->update([
            'social_media_links' => json_encode(array_values($validatedData['social_media_links']))
        ]);

        $html = '';

        foreach($validatedData['social_media_links'] as $single_links){
            $html .= '<div class="mb-3 d-flex">
                <div class="avatar-xs d-block flex-shrink-0 me-3">
                    <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                        <i class="ri-'.$single_links['type'].'-fill"></i>
                    </span>
                </div>
                <input type="text" disabled class="form-control" id="'.$single_links['type'].'-link" placeholder="Your Link" value="'.$single_links['link'].'">
            </div>';
        }

        if($salon_profile_update)
            return response()->json(['type' => 'success', 'message' => 'Social media links updated!', 'html' => $html]);
        else
            return response()->json(['type' => 'error', 'message' => 'Something went wrong!']);
    }

    public function update_basic_details(Request $request){
        $validatedData = $request->validate([
            'salon_name' => 'nullable',
            'salon_type' => 'nullable',
            'contact_number' => 'nullable|unique:salon_profiles,contact_number,' . $this->salon_uid . ',salon_uid',
            'business_email' => 'nullable|email:rfc,dns',
            'staff_count' => 'nullable',
            'established_year' => 'nullable',
            'opening_hour' => 'nullable',
            'closing_hour' => 'nullable',
            'operating_days' => 'nullable',
            'website_url' => 'nullable'
        ]);

        if ($request->has('operating_days') && is_array($request->operating_days)) {
            $validatedData['operating_days'] = json_encode($request->operating_days);
        }
        
        $salon_profile = SalonProfile::where('salon_uid', $this->salon_uid)->first();
        if(!$salon_profile){
            $validatedData['salon_uid'] = $this->salon_uid;
            $validatedData['contact_number'] = '+91';
        }
        
        $salonData['salon_name'] = $validatedData['salon_name'];
        if ($request->has('owner_name') && !empty($request->has('owner_name'))) {
            $salonData['owner_name'] = $request->owner_name;
        }

        Salon::where('salon_uid',$this->salon_uid)->update($salonData);
        return $this->update_profile_data($validatedData, 'basicDetails');
    }

    public function update_address_details(Request $request){
        $validatedData = $request->validate([
            'full_address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required'
        ]);
        $salon = Auth::guard('salon')->user();
        $salon_profile = SalonProfile::where('salon_uid', $salon->salon_uid)->first();
        if(!$salon_profile){
            $validatedData['salon_uid'] = $salon->salon_uid;
            $validatedData['contact_number'] = '+91';
        }
        
        return $this->update_profile_data($validatedData, 'address');
    }

    public function update_password(Request $request){
        
        $validatedData = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        
        $password = Hash::make($validatedData['password']);
        $updatePassword = Salon::where('salon_uid', $this->salon_uid)->update(['password' => $password]);
        if($updatePassword){
            return redirect()->route('salon.edit-profile')->with('success', errorMessage('PASSWORD_UPDATED_SUCCESS'))->with('active_tab', 'changePassword');
        }else{
            return redirect()->route('salon.edit-profile')->withErrors([ 'error' => 'Something went wrong: ' . $e->getMessage(),])->with('active_tab', 'changePassword');
        }

    }

    private function update_profile_data($validatedData, $tab){
        try {
            SalonProfile::updateOrCreate(
                ['salon_uid' => $this->salon_uid],
                $validatedData
            );
    
            return redirect()->route('salon.edit-profile')->with('success', errorMessage('PROFILE_UPDATE_SUCCESS'))->with('active_tab', $tab);
        } catch (\Exception $e) {
            return redirect()->route('salon.edit-profile')->withErrors([
                'error' => 'Something went wrong: ' . $e->getMessage(),
            ])->with('active_tab', $tab);
        }
    }
    
    public function get_cities(Request $request){
        $validatedData = $request->validate([
            'state_id' => 'required|numeric'
        ]);

        $json = [];
        $cities = CityMaster::where('state_id', $validatedData['state_id'])->get();
        $salon_profile = SalonProfile::where('salon_uid', $this->salon_uid)->first();
        if(count($cities) > 0){
            foreach($cities as $key => $single_city){
                $json[$key]['value'] =  $single_city['id'];
                $json[$key]['label'] =  $single_city['name'];

                // Add "selected" key if it matches selected_city_id
                if (!empty($salon_profile->city) && $salon_profile->city == $single_city['id']) {
                    $json[$key]['selected'] = true;
                }
            }
        }

        return response()->json(['type' => 'success', 'cities' => json_encode($json)]);
    }

    public function get_pincodes(Request $request){
        $validatedData = $request->validate([
            'city_id' => 'required|numeric'
        ]);

        $json = [];
        $pincodes = PincodeMaster::where('city_id', $validatedData['city_id'])->get();
        if(count($pincodes) > 0){
            foreach($pincodes as $key => $single_pincode){
                $json[$key]['value'] =  $single_pincode['id'];
                $json[$key]['label'] =  $single_pincode['pincode'];
            }
        }

        return response()->json(['type' => 'success', 'pincodes' => json_encode($json)]);
    }
}
