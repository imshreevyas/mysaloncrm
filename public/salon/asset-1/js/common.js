function showpassword(e){
    var type = $('#password').attr('type');
    if(type == 'password'){
        $(e).removeClass('ri-eye-close-fill');
        $(e).addClass('ri-eye-fill');
        $('#password').attr('type','text');
    }else{
        $(e).removeClass('ri-eye-fill');
        $(e).addClass('ri-eye-close-fill');
        $('#password').attr('type','password');
    }
}

$('#register-form').on('submit', function(e) {
    e.preventDefault();

    let hasError = false;

    // Reset previous error styles
    $('.form-control').removeClass('error-input shake'); // Remove shake class as well

    // Function to highlight an input field with a red border and shake
    function showError(selector, message) {
        show_toast('error', message);
        $(selector).addClass('error-input shake'); // Add the shake class
        hasError = true;

        // Optionally, remove the shake class after the animation completes
        setTimeout(() => {
            $(selector).removeClass('shake');
        }, 200); // Duration should match your CSS animation duration
    }

    // Validate Full Name
    var fullname = $('#salon_name').val().trim();
    if (fullname === '') {
        showError('#salon_name', 'Please enter your Salon name.');
        return false;
    }


    // Validate Full Name
    var fullname = $('#owner_name').val().trim();
    if (fullname === '') {
        showError('#owner_name', 'Please enter your name.');
        return false;
    }

    // Validate Mobile Number
    var mobile = $('#mobile').val().trim();
    const mobileRegex = /^[0-9]{10}$/; // Basic 10-digit mobile number validation
    if (mobile === '') {
        showError('#mobile', 'Please enter your mobile number.');
        return false;
    } else if (!mobileRegex.test(mobile)) {
        showError('#mobile', 'Please enter a valid 10-digit mobile number.');
        return false;
    }

    // Validate Email
    var email = $('#email').val().trim();
    const emailRegex =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // More robust email regex
    if (email === '') {
        showError('#email', 'Please enter your email address.');
        return false;
    } else if (!emailRegex.test(email)) {
        showError('#email', 'Please enter a valid email address.');
        return false;
    }

    // Validate Password
    var password = $('#password').val();
    if (password === '') {
        showError('#password', 'Please enter a password.');
        return false;
    }

    this.submit();
});

function show_toast(type, msg){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr[type](msg);
}


$(document).ready(function() {
    function show_password_popup (){
        $('#update_password').modal(SHOW_PASSWORD_POPUP);
    }
    show_password_popup()
});
