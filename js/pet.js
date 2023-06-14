jQuery("document").ready(() => {
    getPetTypes();
    getPetEyeColors();
});

// Get pet types (Dog, Cat, etc...)
const getPetTypes = () => {
    jQuery.ajax({
        url: './controller/pet/get_pet_types.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            action: 'get_pet_types'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    results.forEach(result => {
                        jQuery("#pet-type").append(
                            jQuery('<option>', { 
                                value: result.id, 
                                text: result.name 
                            })
                        );
                    });
                    break;
                case 'error_get':
                    break;
                case 'error_request':
                    break;
            }
        }
    });
};

// Get pet properties
jQuery("#pet-type").on('change', () => {
    const petType = jQuery("#pet-type").val();

    if (petType !== '') {
        getBreeds(petType);
        getPetColors(petType);
    }
});

//Get Breeds
const getBreeds = (petType) => {
    jQuery.ajax({
        url: './controller/pet/get_breeds.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            petType,
            action: 'get_breeds'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    results.forEach(result => {
                        jQuery("#breeds").append(
                            jQuery('<option>', { 
                                value: result.id, 
                                text: result.name 
                            })
                        );
                    });
                    break;
                case 'error_get':
                    break;
                case 'error_request':
                    break;
            }
        }
    });
};

// Get Pet Color
const getPetColors = (petType) => {
    jQuery.ajax({
        url: './controller/pet/get_pet_colors.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            petType,
            action: 'get_pet_color'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    results.forEach(result => {
                        jQuery("#pet-color").append(
                            jQuery('<option>', { 
                                value: result.id, 
                                text: result.color 
                            })
                        );
                    });
                    break;
                case 'error_get':
                    break;
                case 'error_request':
                    break;
            }
        }
    });
};

// Get pet eye colors
const getPetEyeColors = () => {
    jQuery.ajax({
        url: './controller/pet/get_pet_eye_colors.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            action: 'get_pet_eye_color'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    const results = response.results;
                    results.forEach(result => {
                        jQuery("#pet-eye-color").append(
                            jQuery('<option>', { 
                                value: result.id, 
                                text: result.color 
                            })
                        );
                    });
                    break;
                case 'error_get':
                    break;
                case 'error_request':
                    break;
            }
        }
    });
};