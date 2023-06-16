jQuery("document").ready(() => {
    getUsers();
    getUserTypes();
});

const getUsers = () => {
    const userId = jQuery("#user-id").val();
    jQuery.ajax({
        url: './controller/user/users.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            userId,
            action: 'get_users',
            module: 'admin'
        },
        success: (response) => {
           switch (response.response) {
                case 'success':
                    const results = response.results;
                    
                    html = '';
                    if (results.length > 0) {
                        html = '<tbody>';
                        results.forEach(result => {
                            html += '<tr>' +
                                '<td>' + result.id + '</td>' +
                                '<td>' + result.name + '</td>' +
                                '<td>' + result.last_name + '</td>' +
                                '<td>' + result.email + '</td>' +
                                '<td>' + result.user_type + '</td>' +
                                '<td>' + result.created_at + '</td>';

                            if (result.deleted === 0) {
                                html += '<td>' +
                                        '<svg class="edit" onclick="editUser(' + result.id + ');" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">' +
                                            '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>' +
                                        '</svg>' +
                                    '</td>' +
                                    '<td>' +
                                        '<svg class="delete" onclick="deleteUser(' + result.id + ');" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
                                            '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>' +
                                        '</svg>' +
                                    '</td>';
                                
                            }else {
                                html += '<td class="enable" onclick="enableUser(' + result.id + ');" colspan="2">Habilitar</td>';
                            }

                            html += '</tr>';
                        });

                        html += '</tbody>';
                        jQuery("#users").append(html);
                    } else {
                        html = "<tbody>" +
                            "<tr>" +
                                "<td colspan='4'>No hay resultados</td>" +
                            "</tr>" +
                        "</tbody>";

                        jQuery("#users").append(html);
                    }
                    break;
                case 'error_select':
                    break;
                case 'error_request':
                    break;
           } 
        }
    });
};

const getUserTypes = () => {
    const userId = jQuery("#user-id").val();
    jQuery.ajax({
        url: './controller/user/user_types.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            userId,
            action: 'get_user_types',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    if (results.length > 0) {
                        results.forEach(result => {
                            jQuery("#user-type").append(
                                jQuery('<option>', { 
                                    value: result.id, 
                                    text: result.name 
                                })
                            );
                        });
                    }
                    break;
                case 'error_select':
                    break;
                case 'error_request':
                    break;
            }
        }
    });
};

jQuery("#create-user").on('click', () => {
    const id = jQuery("#id").val();

    if (id === '') {
        create();
    } else {
        update(id);
    }
});

const create = () => {
    const name = jQuery("#name").val();
    const lastName = jQuery("#last-name").val();
    const email = jQuery("#email").val();
    const userType = jQuery("#user-type").val();
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

    if (userType === '') {
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: './controller/user/create_user.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                name,
                lastName,
                email,
                userType,
                phone,
                address,
                url,
                action: 'create_user',
                module: 'admin'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success':
                        jQuery("#users").children('tbody').remove(); 
                        clearForm();
                        getUsers();
                        break;
                }
            }
        })
    }
};

const update = (id) => {
    const name = jQuery("#name").val();
    const lastName = jQuery("#last-name").val();
    const email = jQuery("#email").val();
    const userType = jQuery("#user-type").val();
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

    if (userType === '') {
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: './controller/user/update_user.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                id,
                name,
                lastName,
                email,
                userType,
                phone,
                address,
                url,
                action: 'update_user',
                module: 'admin'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success':
                        jQuery("#users").children('tbody').remove(); 
                        clearForm();
                        getUsers();
                        break;
                }
            }
        })
    }
};

jQuery("#clear").on('click', () => {
    clearForm();
});

const clearForm = () => {
    jQuery("#id").val('');
    jQuery("#name").val('');
    jQuery("#last-name").val('');
    jQuery("#email").val('');
    jQuery("#user-type").val('');
    jQuery("#phone").val('');
    jQuery("#address").val('');
    jQuery("#url").val('');
};

const editUser = (id) => {
    jQuery.ajax({
        url: './controller/user/get_user.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            id,
            action: 'get_user',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const result = response.result;
                    jQuery("#id").val(result.id);
                    jQuery("#name").val(result.name);
                    jQuery("#last-name").val(result.last_name);
                    jQuery("#email").val(result.email);
                    jQuery("#user-type").val(result.user_type_id);
                    jQuery("#phone").val(result.phone);
                    jQuery("#address").val(result.address);
                    jQuery("#url").val(result.url);
                    break;
                
            }
        }
    });
};

const deleteUser = (id) => {
    jQuery.ajax({
        url: './controller/user/delete_user.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            id,
            action: 'delete_user',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    jQuery("#users").children('tbody').remove();
                    getUsers();
                    break;
            }
        }
    });
};

const enableUser = (id) => {
    jQuery.ajax({
        url: './controller/user/enable_user.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            id,
            action: 'enable_user',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    jQuery("#users").children('tbody').remove();
                    getUsers();
                    break;
            }
        }
    });
}