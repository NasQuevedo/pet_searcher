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

                    const results = response.results;
                    
                    let html = '<div' +
                                'id="carouselMultiItemExample"' +
                                'class="carousel slide carousel-dark text-center"' +
                                'data-mdb-ride="carousel"' +
                            '>' +
                                '<div class="d-flex justify-content-center mb-4">' +
                                    '<button' +
                                        'class="carousel-control-prev position-relative"' +
                                        'type="button"' +
                                        'data-mdb-target="#carouselMultiItemExample"' +
                                        'data-mdb-slide="prev"' +
                                    '>' +
                                        '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                                        '<span class="visually-hidden">Previous</span>' +
                                    '</button>' +
                                    '<button' +
                                        'class="carousel-control-next position-relative"' +
                                        'type="button"' +
                                        'data-mdb-target="#carouselMultiItemExample"' +
                                        'data-mdb-slide="next"' +
                                    '>' +
                                        '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                                        '<span class="visually-hidden">Next</span>' +
                                    '</button>' +
                                '</div>' +
                                '<div class="carousel-inner py-4">' +
                                    '<div class="carousel-item active">' +
                                        '<div class="container">' +
                                            '<div class="row">';
                    
                    results.forEach(result => {
                        html += '<div class="col-lg-4">' +
                                    '<div class="card">' +
                                    '<div style="display: flex;">' +
                                        '<img' +
                                            ' src="./' + result.lost_file_url  + '"' +
                                            ' class="card-img-top"' +
                                            ' alt="Waterfall" style="width: 50%"' +
                                        '/>' +
                                        '<img' +
                                            ' src="./' + result.file_url  + '"' +
                                            ' class="card-img-top"' +
                                            ' alt="Waterfall" style="width: 50%"' +
                                        '/>' +
                                    '</div>' +
                                        '<div class="card-body">' +
                                            '<h5 class="card-title">' + result.email + '</h5>' +
                                            '<p class="card-text">' + result.description + '</p>' +
                                            '<a href="#!" class="btn btn-primary">Contactar</a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                    });

                    html += '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

                    jQuery("#match-space").html(html);
                    break;
            }
        }
    });
});