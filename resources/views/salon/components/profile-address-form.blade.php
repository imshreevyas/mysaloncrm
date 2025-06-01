<form action="{{ route('salon.update-address-details') }}" method="POST">
    @csrf
    <!--end col-->
    <div class="col-lg-12">
        <div class="mb-3 pb-2">
            <label for="exampleFormControlTextarea" class="form-label">Full Adrress</label>
            <textarea class="form-control" id="exampleFormControlTextarea" name="full_address" placeholder="Enter your Full Address"
                rows="3" value="{{ check_isset_or_null($salon_details->profile, 'full_address', '') }}">{{ check_isset_or_null($salon_details->profile, 'full_address', '') }}</textarea>
        </div>
    </div>

    <!--end col-->
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="designationInput" class="form-label">State</label>
            <select data-choices class="form-control state-select" name="state" id="choices-single-state">
                @foreach ($state as $single_state)
                    @php
                        $selected = '';
                        if ($single_state['id'] == '1') {
                            $selected = 'selected';
                        } elseif (
                            !empty($salon_details->profile->state) &&
                            $salon_details->profile->state == $single_state['id']
                        ) {
                            $selected = 'selected';
                        }
                    @endphp
                    <option value="{{ $single_state['id'] }}" {{ $selected }}>{{ $single_state['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label for="designationInput" class="form-label">City</label>
            <select data-choices class="form-control city-select" name="city" id="choices-single-city"></select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label for="designationInput" class="form-label">Pincode</label>
            <input type="text" class="form-control" name="pincode"
                value="{{ check_isset_or_null($salon_details->profile, 'pincode', '') }}"
                placeholder="Enter Your Pincode">
        </div>
    </div>

    <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-start">
            <button type="submit" class="btn btn-primary">Updates</button>
        </div>
    </div>
</form>
