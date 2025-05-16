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

function show_toast(type, message) {
    var success = "#00b09b, #96c93d";
    var error = "#a7202d, #ff4044";
    var ColorCode = type == "success" ? success : error;

    return Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "bottom", // top or bottom
        position: "center", // left, center or right
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: `linear-gradient(to right, ${ColorCode})`,
        },
    }).showToast();
}


$(document).ready(function() {
    function show_password_popup (){
        $('#update_password').modal(SHOW_PASSWORD_POPUP);
    }
    show_password_popup()
});


$('#profile-foreground-img-file-input').on('change', function(){
    const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Show preview in the dedicated preview image
                $('.profile-wid-img').attr('src', e.target.result);
                $('.upload-cover-photo-btn').addClass('d-none');
                $('.update-cover-photo-btn').removeClass('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, hide preview and show change button
            previewImage.attr('src', '#'); // Clear the preview source
            previewContainer.hide();
            changeButton.show();

            // OPTIONAL: Revert background preview
            // profileWidBg.css('background-image', '');
            // currentBannerImage.show();
        }
});

$('#cancel-banner-upload').on('click',function(){
    var default_banner = $(this).attr('data-default-banner');
    $('.profile-wid-img').attr('src', default_banner);
    $('.upload-cover-photo-btn').removeClass('d-none');
    $('.update-cover-photo-btn').addClass('d-none');
});

$('#upload-banner').on('click',function(e){
    e.preventDefault();
    const uploadBannerForm = $('#upload-banner-form')[0]; // Get the native DOM form element
    const formData = new FormData(uploadBannerForm);
    axios.post(`${APP_URL}salon/update-salon-banner`,formData, {headers: {
        'Content-Type': 'multipart/form-data', 
    }}).then(function(response) {
        // handle success
        show_toast(response.data.message, response.data.type)
        if (response.data.type == 'success') {
            var default_banner = $(this).attr('data-default-banner');
            $('.profile-wid-img').attr('src', default_banner);
            $('.upload-cover-photo-btn').removeClass('d-none');
            $('.update-cover-photo-btn').addClass('d-none');
        } else {
            return false;
        }
    }).catch(function(err) {
        show_toast('error', err.response.data.message)
    });
});

$('#add_new_social_media_link').on('click', function(){
    var item_count = parseInt($(this).val()) + 1;
    
    if(item_count > 5){
        show_toast('error', 'Oops! only 5 Links are allowed!');
    }
    var html = `<div id="social-media-link-${item_count}" class="row pt-1"><div class="input-group">
        <select class="form-control" name="" id="socail_media_links[${item_count}]['type']">
            <option value="instagram"><i class="ri-instagram-fill"></i>Instagram</option>
            <option value="facebook"><i class="ri-facebook-fill"></i>Facebook</option>
            <option value="youtube"><i class="ri-youtube-fill"></i>Youtube</option>
            <option value="tiktok"><i class="ri-tiktok-fill"></i>Tiktok</option>
            <option value="other"><i class="ri-browser-fill"></i>Other</option>
        </select>
        <input type="text" class="form-control" name="socail_media_links[${item_count}]['type']" aria-label="Text input with dropdown button">
        <button class="btn btn-danger" onclick="deleteLink('${item_count}')"><i class="ri-delete-bin-fill"></i></button>
    </div></div>`; 
    $(this).val(item_count)
    $('#save_social_media_links').removeClass('d-none');
    $('#social_media_links_form').append(html);
});

function deleteLink(id){
    $(this).removeClass('ri-delete-bin-fill');
    $(this).addClass('spinner-grow spinner-grow-xs');
    var item_count = parseInt($('#add_new_social_media_link').val()) - 1;
    if(item_count == 0){
        $('#save_social_media_links').addClass('d-none');
    }
    $('#add_new_social_media_link').val(item_count);
    $(`#social-media-link-${id}`).remove();
}

$('#save_social_media_links').on('click',function(){
    e.preventDefault();
    const uploadBannerForm = $('#social_media_links_form')[0]; // Get the native DOM form element
    const formData = new FormData(uploadBannerForm);
    axios.post(`${APP_URL}salon/update-salon-social-media`,formData, {headers: {
        'Content-Type': 'multipart/form-data', 
    }}).then(function(response) {
        // handle success
        show_toast(response.data.message, response.data.type)
        if (response.data.type == 'success') {
            var default_banner = $(this).attr('data-default-banner');
            $('.profile-wid-img').attr('src', default_banner);
            $('.upload-cover-photo-btn').removeClass('d-none');
            $('.update-cover-photo-btn').addClass('d-none');
        } else {
            return false;
        }
    }).catch(function(err) {
        show_toast('error', err.response.data.message)
    });
});
