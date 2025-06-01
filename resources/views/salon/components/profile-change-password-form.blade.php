<form action="{{ route('salon.update-password') }}" method="POST">
    @csrf
    <div class="row g-2">
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="newpasswordInput" class="form-label">New
                    Password*</label>
                <input type="password" class="form-control" id="newpasswordInput" name="password" placeholder="Enter new password">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="confirmpasswordInput" class="form-label">Confirm
                    Password*</label>
                <input type="password" class="form-control" id="confirmpasswordInput" name="confirm_password" placeholder="Confirm password">
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="text-start">
                <button type="submit" class="btn btn-success">Change
                    Password</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>
