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
            'banner' => 'required|file|mimes:jpeg,png,jpg,webp,PNG,JPG|max:20480|dimensions:max_width=1370,max_height=770'
        ]);
    }

    public function update_salon_logo(Request $request){

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
        
        $salon = Auth::guard('salon')->user();
        $password = Hash::make($validatedData['password']);
        $updatePassword = Salon::where('salon_uid', $salon->salon_uid)->update(['password' => $password]);
        if($updatePassword){
            return redirect()->back()->with('success', errorMessage('PASSWORD_UPDATED_SUCCESS'));
        }else{
            return redirect()->back()->withErrors(errorMessage('PASSWORD_UPDATED_FAILURE'));
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
