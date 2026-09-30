
$(document).on('click', '.destroy', function (event) {
    var url = $(this).attr('data-route');
    var type = "single";
    $.confirm({
        columnClass: 'small', containerFluid: true,
        title: 'Are you sure?', content: 'Are you sure want to delete this entry?',
        type: 'blue',
        typeAnimated: true, buttons: {
            Delete: {
                text: 'Yes, delete it!', btnClass: 'btn-danger', action: function () {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            type: type,
                            // _token: $('meta[name="csrf-token"]').attr('content'), // Include the CSRF token
                        },
                        beforeSend: function () {
                            $('#loading-image').removeClass('d-none');
                        },
                        success: function (response) {
                            if (response.status) {
                                toastr.success(response.message);
                            } else {
                                toastr.error(response.message);
                            }
                            $('#loading-image').addClass('d-none');
                            $('#ajax-datatables').DataTable().ajax.reload();
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            toastr.error(errorThrown);
                            $('#loading-image').addClass('d-none');
                            $('#ajax-datatables').DataTable().ajax.reload();
                        }
                    });
                }
            }, cancel: {
                text: 'Cancel', btnClass: 'btn-primary', action: function () { },
            }
        }
    });
});
$(document).on('click', '.common_model', function () {
    let error_response = $(this).data('errors') || '';
    let url     = $(this).attr('data-url') || '';
    let title   = $(this).attr('data-title') || '';
    let size    = $(this).attr('data-size') ? 'modal-dialog ' + $(this).attr('data-size') : 'modal-dialog modal-md';
    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function () {
            $("#loading-image1").removeClass("d-none");
            $('.common_model_content').parent().parent().parent().attr('class', '');
        },
        success: function (data) {
            $('.common_model_content').html(data);
            $('.common_model_content').parent().parent().find('#exampleModalLabel').text(title);
            $('.common_model_content').parent().parent().parent().addClass(size);
            $('#common_model').modal('show');
        },
        complete: function () {
            $("#loading-image1").addClass("d-none");

            if (error_response) {
                $.each(error_response, function (field, errors) {
                    $.each(errors, function (index, errorMessage) {
                        $('#' + field + '-error').text(errorMessage);
                    });
                });
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            $("#loading-image1").addClass("d-none");
        },
    });
});