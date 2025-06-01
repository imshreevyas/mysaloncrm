<?php

function errorMessage($key){
    $errors = [
        'LOGIN_WITH_GMAIL' => 'Invalid Credntials, try to login with gmail.',
        'INVALID_LOGIN_CREDENTIALS' => 'Invalid Credntials!',
        'DEACTIVED_SALON' => 'Your Account is deactivate. Please contact us for more details.',
        'UNVERIFIED_SALON_EMAIL' => 'Your email id not verified yet!, please click on the link in your inbox.',
        'PASSWORD_UPDATED_SUCCESS' => 'Congratulations! your password is updated successfully.',
        'PASSWORD_UPDATED_FAILURE' => 'Oops! Something went wrong!',
        'PROFILE_UPDATE_SUCCESS' => 'Profile Details Updated Successfully!',
        'OOPS_SOMETHING_WENT_WRONG' => 'Oops! Something went wrong!',
    ];

    return isset($errors[$key]) ? $errors[$key] : 'Something went wrong, try again later!';
}