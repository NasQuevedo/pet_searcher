jQuery("#update-info").on('click', () => {
    const id = jQuery("#id").val();
    const name = jQuery("#name").val();
    const lastName = jQuery("#last-name").val();
    const email = jQuery("#email").val();
    const phone = jQuery("#phone").val();
    const address = jQuery("#address").val();
    const url = jQuery("#url").val();
    let validated = true;

    if (name === '') {
        validated = false;
    }

    if (lastName === '') {
        validated = false;
    }

    if (email === '') {
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: './controller/config/update_info.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                id,
                name,
                lastName,
                email,
                phone,
                address,
                url,
                action: 'update_info'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success':
                        location.reload();
                        break;
                }
            }
        });
    }
});

jQuery("#update-password").on('click', () => {
    const id = jQuery("#id").val();
    const currentPassword = jQuery("#current-password").val();
    const newPassword = jQuery("#new-password").val(); 
    const confirmPassword = jQuery("#confirm-password").val();
    let validated = true;

    if (currentPassword === '') {
        validated = false;
    }

    if (newPassword === '') {
        validated = false;
    }

    if (confirmPassword === '') {
        validated = false;
    }

    if (confirmPassword !== newPassword) {
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: './controller/config/update_password.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                id,
                currentPassword,
                newPassword,
                action: 'update_password'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success':
                        location.href = 'index.php';
                        break;
                }
            }
        });
    }
    
});

jQuery("#delete").on('click', () => {
    const id = jQuery("#id").val();
    jQuery.ajax({
        url: './controller/config/delete_account.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            id,
            action: 'delete_account'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    location.href = 'index.php';
                    break;
            }
        }
    });
});