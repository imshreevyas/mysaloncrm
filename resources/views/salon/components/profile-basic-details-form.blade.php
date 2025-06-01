<form action="{{ route('salon.update-basic-details') }}" method="POST">
    @csrf
    @php
        $salon_type = old('salon_type', check_isset_or_null($salon_details->profile, '$salon_type', 'unisex'));
        $operating_days_arr = old(
            'operating_days',
            json_decode(check_isset_or_null($salon_details->profile, 'operating_days', []), true),
        );
    @endphp
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Salon Name</label>
                <input type="text" class="form-control" name="salon_name" placeholder="Enter your Salon Name"
                    value="{{ old('salon_name', check_isset_or_null($salon_details->profile, 'salon_name', '')) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Owner Name</label>
                <input type="text" class="form-control" name="owner_name" placeholder="Enter Owner Name"
                    value="{{ old('salon_name', check_isset_or_null($salon_details, 'owner_name', '')) }}">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="lastnameInput" class="form-label">Salon Type</label>
                <select class="form-control" name="salon_type" id="skillsInput">
                    <option value="unisex" {{ $salon_type == 'unisex' ? 'selected' : '' }}>Unisex</option>
                    <option value="male" {{ $salon_type == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $salon_type == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="phonenumberInput" class="form-label">Phone
                    Number</label>
                <input type="text" class="form-control" name="contact_number" placeholder="Enter your Phone Number"
                    value="{{ old('contact_number', check_isset_or_null($salon_details->profile, 'contact_number', '')) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="phonenumberInput" class="form-label">Business Email id</label>
                <input type="email" class="form-control" name="business_email" placeholder="Enter your Business Email"
                    value="{{ old('business_email', check_isset_or_null($salon_details->profile, 'business_email', '')) }}">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="JoiningdatInput" class="form-label">Total Staff</label>
                <input type="text" class="form-control" name="staff_count"
                    value="{{ old('staff_count', check_isset_or_null($salon_details->profile, 'staff_count', '0')) }}"
                    placeholder="Enter Your Total Staff Count" />
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="JoiningdatInput" class="form-label">Website (if Any)</label>
                <input type="text" class="form-control" name="website_url"
                    value="{{ old('website_url', check_isset_or_null($salon_details->profile, 'website_url', '')) }}"
                    placeholder="Enter Your Website URL" />
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Days Open</label>
                <select class="form-control" name="operating_days[]" data-choices data-choices-sorting-false
                    data-choices-removeItem data-choices-text-unique-true multiple id="operating_days">
                    <option value="monday" {{ in_array('monday', $operating_days_arr) ? 'selected' : '' }}>Monday
                    </option>
                    <option value="tuesday" {{ in_array('tuesday', $operating_days_arr) ? 'selected' : '' }}>Tuesday
                    </option>
                    <option value="wednesday" {{ in_array('wednesday', $operating_days_arr) ? 'selected' : '' }}>
                        Wednesday</option>
                    <option value="thrusday" {{ in_array('thrusday', $operating_days_arr) ? 'selected' : '' }}>Thrusday
                    </option>
                    <option value="friday" {{ in_array('friday', $operating_days_arr) ? 'selected' : '' }}>Friday
                    </option>
                    <option value="saturday" {{ in_array('saturday', $operating_days_arr) ? 'selected' : '' }}>Saturday
                    </option>
                    <option value="sunday" {{ in_array('sunday', $operating_days_arr) ? 'selected' : '' }}>Sunday
                    </option>
                </select>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Opening Time</label>
                <input type="time" class="form-control" id="opening_hour" name="opening_hour"
                    data-provider="timepickr"
                    data-default-time="{{ old('opening_hour', date('H:i', strtotime($salon_details->profile->opening_hour))) }}"
                    value="{{ old('opening_hour', date('H:i', strtotime($salon_details->profile->opening_hour))) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Closing Time</label>
                <input type="time" class="form-control" id="closing_hour" name="closing_hour"
                    data-provider="timepickr"
                    data-default-time="{{ old('closing_hour', date('H:i', strtotime($salon_details->profile->closing_hour))) }}"
                    value="{{ old('closing_hour', date('H:i', strtotime($salon_details->profile->closing_hour))) }}">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Updates</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>
