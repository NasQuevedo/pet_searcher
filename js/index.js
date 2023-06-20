jQuery("document").ready(() => {
    
});

// Sign up function
jQuery("#signup").on('click', () => {
    clearErrorsSignup();

    const name = jQuery("#name").val();
    const lastName = jQuery("#last-name").val();
    const email = jQuery("#email-signup").val();
    const password = jQuery("#password-signup").val();
    const confirmPassword = jQuery("#confirm-password-signup").val();
    let validated = true;

    if (name === '') {
        jQuery("#name-error").show();
        validated = false;
    }

    if (lastName === '') {
        jQuery("#last-name-error").show();
        validated = false;
    }

    if (email === '') {
        jQuery("#email-error").show();
        validated = false;
    }

    if (password === '') {
        jQuery("#password-error").show();
        validated = false;
    }

    if (password.length < 8) {
        jQuery("#password-length-error").show();
        validated = false;
    }

    if (confirmPassword === '') {
        jQuery("#confirm-password-error").show();
        validated = false;
    }

    if (confirmPassword !== password) {
        jQuery("#no-match-error").show();
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: './controller/signup.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                name,
                lastName,
                email,
                password,
                action: 'signup'
            },
            success: (response) => {
                switch(response.response) {
                    case 'success':
                        jQuery("#success-signup").html('Registro Exitoso!');
                        jQuery("#success-signup").show();
                        break;
                    case 'error_signup':
                        jQuery("#error-signup").html('Error al Registrar!');
                        jQuery("#error-signup").show();
                        break;
                    case 'error_request':
                        jQuery("#error-signup").html('Algo salio Mal!');
                        jQuery("#error-signup").show();
                        break; 
                }
            }
        });
    }
});

// Clean errors
const clearErrorsSignup = () => {
    // Inputs Errors
    jQuery("#name-error").hide();
    jQuery("#last-name-error").hide();
    jQuery("#email-error").hide();
    jQuery("#password-error").hide();
    jQuery("#password-length-error").hide();
    jQuery("#confirm-password-error").hide();
    jQuery("#no-match-error").hide();

    // General Errors
    jQuery("#success-signup").hide();
    jQuery("#error-signup").hide();
};

//show password
jQuery("#show-password").on('click', () => {
    if (jQuery("#show-password").is(":checked")) {
        jQuery("#password-signup").attr('type', 'text');
        jQuery("#confirm-password-signup").attr('type', 'text');
    } else {
        jQuery("#password-signup").attr('type', 'password');
        jQuery("#confirm-password-signup").attr('type', 'password');
    }
});

// Login function
jQuery("#login").on('click', () => {
    clearErrorLogin();

    const email = jQuery("#email").val();
    const password = jQuery("#password").val();
    let validated = true;

    if (email === '') {
        jQuery("#email-login-error").show();
        validated = false;
    }

    if (password === '') {
        jQuery("#password-login-error").show();
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: './controller/login.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                email,
                password,
                action: 'login'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success':
                        location.reload();
                        break;
                    case 'error_login':
                        jQuery("#error-login").html("E-Mail o Contraseña invalida");
                        jQuery("#error-login").show();
                        break;
                    case 'error_request':
                        jQuery("#error-login").html("Algo salio Mal");
                        jQuery("#error-login").show();
                        break;
                }
            }
        });
    }
});

const clearErrorLogin = () => {
    // Input Errors
    jQuery("#email-login-error").hide();
    jQuery("#password-login-error").hide();

    // General Errors
    jQuery("#error-login").hide();
};

// Show password login
jQuery("#show-password-login").on('click', () => {
    if (jQuery("#show-password-login").is(":checked")) {
        jQuery("#password").attr("type", "text");
    } else {
        jQuery("#password").attr("type", "password");
    }
});

// logout function
jQuery("#logout").on('click', () => {
    jQuery.ajax({
        url: './controller/logout.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            action: 'logout'
        },
        success: (response) => {
            if (response.response === 'success') {
                location.href = "index.php";
            }
        }
    });
});

jQuery("#accompaniment-button").on('click', () => {
    location.href = "index.php?module=accompaniment";
});

jQuery("#education-button").on('click', () => {
    location.href = "index.php?module=education";
});