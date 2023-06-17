const url = './controller/color';

jQuery("document").ready(() => {
    getColors();
    getTypes();
});

const getTypes = () => {
    jQuery.ajax({
        url: './controller/type/types.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            action: 'get_types',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    if (results.length > 0) {
                        results.forEach(result => {
                           jQuery("#pet-type").append(
                                jQuery('<option>', {
                                    value: result.id,
                                    text: result.name
                                })
                           );
                        });
                    }
                    break;
            }
        }
    });
};

const getColors = () => {
    jQuery.ajax({
        url: url + '/colors.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            action: 'get_colors',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;

                    html = '<tbody>';
                        results.forEach(result => {
                            html += '<tr>' +
                                '<td>' + result.id + '</td>' +
                                '<td>' + result.pet_type + '</td>' +
                                '<td>' + result.color + '</td>';

                            if (result.deleted === 0) {
                                html += '<td>' +
                                        '<svg class="edit" onclick="editColor(' + result.id + ');" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">' +
                                            '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>' +
                                        '</svg>' +
                                    '</td>' +
                                    '<td>' +
                                        '<svg class="delete" onclick="deleteColor(' + result.id + ');" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
                                            '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>' +
                                        '</svg>' +
                                    '</td>';
                                
                            }else {
                                html += '<td class="enable" onclick="enableUser(' + result.id + ');" colspan="2">Habilitar</td>';
                            }

                            html += '</tr>';
                        });

                        html += '</tbody>';
                        jQuery("#colors").append(html);
                    break;
            }
        }
    });
};

jQuery("#save").on('click', () => {
    const id = jQuery("#id").val();
    if (id === '') {
        create();
    } else {
        update(id);
    }
});

const create = () => {
    const petType = jQuery("#pet-type").val();
    const name = jQuery("#name").val();
    let validated = true;

    if (petType === '') {
        validated = false;
    }

    if (name === '') {
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: url + '/create_color.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                petType,
                name,
                action: 'create_color',
                module: 'admin'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success': 
                        jQuery("#colors").children('tbody').remove();
                        getColors();
                        clearForm();
                        break;
                }
            }
        });
    }
};

const update = (id) => {
    const petType = jQuery("#pet-type").val();
    const name = jQuery("#name").val();
    let validated = true;

    if (petType === '') {
        validated = false;
    }

    if (name === '') {
        validated = false;
    }

    if (validated) {
        jQuery.ajax({
            url: url + '/update_color.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                id,
                petType,
                name,
                action: 'update_color',
                module: 'admin'
            },
            success: (response) => {
                switch (response.response) {
                    case 'success': 
                        jQuery("#colors").children('tbody').remove();
                        getColors();
                        clearForm();
                        break;
                }
            }
        })
    }
};

const clearForm = () => {
    jQuery("#id").val('');
    jQuery("#pet-type").val('');
    jQuery("#name").val('');
};

const editColor = (id) => {
    jQuery.ajax({
        url: url + '/get_color.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            id,
            action: 'get_color',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const result = response.result;
                    jQuery("#id").val(result.id);
                    jQuery("#pet-type").val(result.pet_type);
                    jQuery("#name").val(result.color);
                    break;
            }
        }
    });
};

const deleteColor = (id) => {
    jQuery.ajax({
        url: url + '/delete_color.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            id,
            action: 'delete_color',
            module: 'admin'
        },
        success: (response) => {
            switch (response.response) {
                case 'success': 
                    jQuery("#colors").children('tbody').remove();
                    getColors();
                    clearForm();
                    break;
            }
        }
    });
};