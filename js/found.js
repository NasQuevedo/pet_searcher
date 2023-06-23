jQuery("document").ready(() => {
    getFounds();
});

const getFounds = () => {
    userId = jQuery("#user-id").val();
    jQuery.ajax({
        url: './controller/pet/get_founds.php',
        method: 'POST',
        dataType: 'json',
        type: 'json',
        dataType: 'json',
        data: {
            userId,
            action: 'get_founds'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    if (results.length > 0) {
                        jQuery("#found-img").hide();
                        jQuery("#found-table").show();
                        html = "<thead>" +
                                "<tr>" +
                                    "<th>Nombre</th>" +
                                    "<th>Sexo</th>" +
                                    "<th>Tipo</th>" +
                                    "<th>Raza</th>" +
                                    "<th>Color</th>" +
                                    "<th>Color de Ojos</th>" +
                                "</tr>" +
                            "</thead>" +
                            "<tbody >";

                        results.forEach(result => {
                            html += '<tr>';
                            html += '<td>' + result.name + '</td>';
                            html += '<td>' + result.genre + '</td>';
                            html += '<td>' + result.pet_type + '</td>';
                            html += '<td>' + result.breed + '</td>';
                            html += '<td>' + result.color + '</td>';
                            html += '<td>' + result.color_eyes + '</td>';
                            html += '</tr>';
                        });

                        html += "</tbody>";
                        jQuery("#table").html(html);
                    }
                    break;
            }
        }
    });
};

jQuery("#save").on('click', () => {
    clearErrors();
    //Fields
    const userId = jQuery("#user-id").val();
    const name = jQuery("#name").val();
    const genre = jQuery("#genre").val();
    const petType = jQuery("#pet-type").val();
    const breeds = jQuery("#breeds").val();
    const petColor = jQuery("#pet-color").val();
    const petEyeColor = jQuery("#pet-eye-color").val();
    const description = jQuery("#description").val();
    let validated = true;
    //Errors

    if (genre === '') {
        jQuery("#genre-error").show();
        validated = false;
    }
    if (petType === '') {
        jQuery("#type-error").show();
        validated = false;
    }
    
    if (breeds === '')  {
        jQuery("#breed-error").show();
        validated = false;
    }

    if (petColor === '') {
        jQuery("#color-error").show();
        validated = false;
    }

    if (petEyeColor === '') {
       jQuery("#color-eye-error").show();
       validated = false; 
    }

    let formData = new FormData();
    let files = jQuery("#pet-photo")[0].files[0];
    formData.append('userId', userId);
    formData.append('name', name);
    formData.append('genre', genre);
    formData.append('petType', petType);
    formData.append('breeds', breeds);
    formData.append('petColor', petColor);
    formData.append('petEyeColor', petEyeColor);
    formData.append('description', description);
    formData.append('file', files);
    formData.append('action', 'create_found');

    if (validated) {
        jQuery.ajax({
            url: './controller/pet/create_found.php',
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                switch (response.response) {
                    case 'success': 
                        clearForm();
                        jQuery("#success-found").html('Registro Exitoso! Gracias por tu ayuda');
                        jQuery("#success-found").show();
                        getFounds();
                        break;
                    case 'error_insert':
                        jQuery("#error-found").html('Error al Registro! Intente nuevamente');
                        jQuery("#error-found").show();
                        break;
                    case 'error_request':
                        jQuery("#error-found").html('Algo Salio Mal!');
                        jQuery("#error-found").show();
                        break;
                }
            }
        });
    }    
});

jQuery("#clear").on('click', () => {
    clearForm();
});

const clearErrors = () => {
    jQuery("#genre-error").hide();
    jQuery("#type-error").hide();
    jQuery("#breed-error").hide();
    jQuery("#color-error").hide();
    jQuery("#color-eye-error").hide();
};

const clearForm = () => {
    jQuery("#name").val('');
    jQuery("#genre").val('');
    jQuery("#pet-type").val('');
    jQuery("#breeds").val('');
    jQuery("#pet-color").val('');
    jQuery("#pet-eye-color").val('');
    jQuery("#pet-photo").val('');

    jQuery("#pet-type").children('option').remove();
    jQuery("#pet-type").append(
        jQuery('<option>', { 
            value: '', 
            text: '-- Seleccionar --' 
        })
    );

    jQuery("#breeds").children('option').remove();
    jQuery("#breeds").append(
        jQuery('<option>', { 
            value: '', 
            text: '-- Seleccionar --' 
        })
    );

    jQuery("#pet-color").children('option').remove();
    jQuery("#pet-color").append(
        jQuery('<option>', { 
            value: '', 
            text: '-- Seleccionar --' 
        })
    );
};