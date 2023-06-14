jQuery("document").ready(() => {
    getUsers();
    getUserTypes();
});

const getUsers = () => {};

const getUserTypes = () => {
    jQuery.ajax({
        url: './controller/user/get_user_types.php',
        method: 'GET',
        type: 'json',
        dataType: 'json',
        data: {
            action: 'get_user_types',
            module: 'admin'
        },
        success: (response) => {
            
        }
    });
};