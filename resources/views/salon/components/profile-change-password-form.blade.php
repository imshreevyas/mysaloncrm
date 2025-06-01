<form action="{{ route('salon.update-password') }}">
    @csrf
    <div class="row g-2">
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="newpasswordInput" class="form-label">New
                    Password*</label>
                <input type="password" class="form-control" id="newpasswordInput" placeholder="Enter new password">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="confirmpasswordInput" class="form-label">Confirm
                    Password*</label>
                <input type="password" class="form-control" id="confirmpasswordInput" placeholder="Confirm password">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot
                    Password ?</a>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="text-end">
                <button type="submit" class="btn btn-success">Change
                    Password</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>
