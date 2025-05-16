<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\SalonProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Two\InvalidStateException;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $data;
    private $salon_uid;
    public function index(Request $request)
    {
        return view('salon.auth.login');
    }

    public function salonLoginPost(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // Check if email exists and password is not set (likely Gmail signup)
        $existingSalon = Salon::where('email', $validatedData['email'])->first();
        if ($existingSalon && empty($existingSalon['password'])) {
            return redirect()->route('salon.login')->withErrors(errorMessage('LOGIN_WITH_GMAIL'));
        }

        // Attempt to log in the salon
        $credentials = request(['email', 'password']);
        if (Auth::guard('salon')->attempt($credentials)) {
            // Authentication successful

            $salon = Auth::guard('salon')->user();

            // Check salon status
            if ($salon->status == -1) {
                return redirect()->route('salon.login')->withErrors([
                    'email' => errorMessage('DEACTIVED_SALON')
                ]);
            }

            if ($salon->status == 0) {
                return redirect()->route('salon.login')->withErrors([
                    'email' => errorMessage('UNVERIFIED_SALON_EMAIL')
                ]);
            }
            
            session(['user_type' => 'Salon']);
            return redirect()->route('salon.dashboard');
               
        } else {
            // Authentication failed
            return redirect()->route('salon.login')->withErrors([
                'email' => errorMessage('INVALID_LOGIN_CREDENTIALS')
            ])->withInput($request->only('email')); // Keep email for convenience
        }
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
    public function show(Salon $salon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salon $salon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salon $salon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salon $salon)
    {
        //
    }

    public function register(){
        $data['form_name'] = 'basic-details-form';
        return view('salon.auth.register', $data);
    }

    // Google Redirect Function
    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function redirect_after_login($existingSalon = []){
        // Check if status is 0 then redirect with error
        if($existingSalon->status == -1)
            return redirect()->route('salon.login')->withErrors(errorMessage('DEACTIVED_SALON'));

        if($existingSalon->status == 0)
            return redirect()->route('salon.login')->withErrors(errorMessage('UNVERIFIED_SALON_EMAIL'));


        // if registered with normal form and tried loggin in with google update google verified as 1
        if($existingSalon->google_verified == 0){
            $updatedData['google_verified'] = 1;

            // Check if Salon has not verifed Email then make it verifed.
            if($existingSalon->is_salon_email_verified == 0)
                $updatedData['is_salon_email_verified'] = 1;

            $existingSalon->update($updatedData);
        }

        return redirect()->route('salon.dashboard');
    }

    public function google_callback(){
        try {
            // Get the user information from Google
            $user = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            // Handle the invalid state exception (likely due to re-hitting the callback)
            return redirect()->route('salon.login')->withErrors(['google_error' => errorMessage('INVALID_GOOGLE_STATE')]);
        }
        catch (Throwable $e) {
            return redirect()->route('salon.login')->withErrors('error', 'Google authentication failed.');
        }

        // Check if the user already exists in the database
        $existingSalon = Salon::where(['email' => $user->email])->first();

        if ($existingSalon) {
            // Log the user in if they already exist
            $salon = Auth::guard('salon')->login($existingSalon);
            return $this->redirect_after_login($existingSalon);
            
        } else {
            // Otherwise, create a new user and log them in
            $salon_uid = Str::uuid()->toString();
            $newUser = Salon::updateOrCreate([
                'email' => $user->email
            ], [
                'salon_uid' => $salon_uid,
                'owner_name' => $user->name,
                'email' => $user->email,
                'is_salon_email_verified' => 1,
                'salon_email_verified_date' => now(),
                'google_verified' => 1,
                'updated_profile' => 0,
                'status' => 1,
                'email_verified_at' => now()
            ]);
            Auth::guard('salon')->login($newUser);

            // Create Salon Profile also on register
            SalonProfile::create([
                'salon_uid' => $salon_uid,
                'salon_name' => '',
                'contact_number' => '+91',
                'business_email' => $user->email
            ]);

            return redirect('salon/profile');
        }
    }

    public function submit_register(Request $request){
        $validatedData = $request->validate([
            'salon_name' => 'required',
            'owner_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:salons',
            'password' => 'required',
            'mobile' => 'required'
        ]);

        // Send OTP on email after Insert to verify email id

        $salon_uid = Str::uuid()->toString();
        $salon_insert_data = array(
            'owner_name' => $validatedData['owner_name'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'salon_uid' => $salon_uid,
            'updated_profile' => 0,
            'status' => 0
        );

        $salon_insert_data['password'] = Hash::make($validatedData['password']);

        $create_new_salon = Salon::create($salon_insert_data);

        if($create_new_salon){
            Auth::guard('salon')->login($create_new_salon);

            // Create Salon Profile also on register
            SalonProfile::create([
                'salon_uid' => $salon_uid,
                'salon_name' => $validatedData['salon_name'],
                'contact_number' => $validatedData['mobile'],
                'business_email' => $user->email
            ]);

            return redirect()->route('salon.profile')->with('success', 'Welcome, Registered Successfully!');
        }else{
            return redirect()->back()->withErrors('Something went wrong, try again later!');
        }
    }

    public function logout(Request $request){
        Auth::guard('salon')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to(route('salon.login'));
    }

    public function salonDashboard(){

        // Get Whole Salon Data
        $this->salon_uid = Auth::guard('salon')->user()->salon_uid;
        $this->data['salon_details'] = Salon::where('salon_uid',$this->salon_uid)->with('profile')->first();
        return view('salon.home.dashboard', $this->data);
    }
}
