jQuery("document").ready(() => {
    const userId = jQuery("#user-id").val();

    jQuery.ajax({
        url: './controller/pet/search.php',
        method: 'POST',
        type: 'json',
        dataType: 'json',
        data: {
            userId,
            action: 'search'
        },
        success: (response) => {
            switch (response.response) {
                case 'success':
                    jQuery("#match-img").hide();
                    console.log(response.results);

                    html = "<div class='col-sm-2'>" +
                                "<img style='width: 100%;' src='" + response.results[0].lost_file_url+ "' alt='lost' ><hr>" +
                                "<img style='width: 100%;' src='./" + response.results[0].file_url + "' alt='found' />" +
                                "<p>Usuario: " + response.results[0].email + "</p>" +
                                "<button type='button' class='btn btn-primary'>Contactar</button>" +
                            "</div>";
                    jQuery("#match-space").html(html);
                    break;
            }
        }
    });
});