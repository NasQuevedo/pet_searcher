jQuery("#login").on('click', () => {
    const email     = jQuery("#email").val();
    const password  = jQuery("#password").val();
    let validated = true;

    if (email === '') {
        validated = false;
    }

    if (password === '') {
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
                action: 'login',
                module: 'admin'
            },
            success: (response) => {
                switch (response.response) {
                    case  'success':
                        location.reload();
                        break;
                    case 'error_login':
                        jQuery("#error-login").html("E-Mail o contraseña invalida!");
                        jQuery("#error-login").show();
                        break;
                    case 'error_request':
                        jQuery("#error-login").html("Algo salio mal!");
                        jQuery("#error-login").show();
                        break;
                }
            }
        });
    }
});

jQuery("#logout").on('click', () => {
    jQuery.ajax({
        url: './controller/logout.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            action: "logout",
            module: "admin"
        },
        success: () => {
            switch (response.response) {
                case  'success':
                    location.reload();
                    break;
                case 'error_request':
                    jQuery("#error-login").html("Algo salio mal!");
                    jQuery("#error-login").show();
                    break;
            }
        }
    });
});