var $country = $('#country');
var $city = $('#city');
var $district = $('#district');

$('#state').live('change', function () {
    var id = $(this).val();
    if( id ){
        if( !$('body').hasClass('page-submit') && !$('body').hasClass('page-edit-item') ) {
            $('#country').closest('select').removeAttr('disabled');
            $('#country').closest('.form-group').addClass('is-chained');
            $('#country').closest('.form-group').removeClass('selected-option-check');

            $('#city').closest('.form-group').addClass('is-chained');
            $('#city').closest('.form-group').removeClass('selected-option-check');

            $('#district').closest('.form-group').addClass('is-chained');
            $('#district').closest('.form-group').removeClass('selected-option-check');
        }

        $.ajax({
            url: 'assets/inc/search_form_query.php',
            type: 'POST',
            data: { action: 'state', id: id },
            success: function(data) {
                $('#country').closest('.form-group').removeClass('is-chained');
                $('#country').closest('.form-group').height(39);
                $('#country').closest('.form-group').html(data);
                $('#country').selectpicker('render');
            }
        });
    }
    else{
        if( !$('body').hasClass('page-submit') && !$('body').hasClass('page-edit-item') ) {
            $('#country').closest('.form-group').addClass('is-chained');
            $('#country').val('');
            $('#city').closest('.form-group').addClass('is-chained');
            $('#city').val('');
            $('#district').closest('.form-group').addClass('is-chained');
            $('#district').val('');
        }
    }

});

$country.live('change', function () {
    var id = $(this).val();
    if( id ){
        if( !$('body').hasClass('page-submit') && !$('body').hasClass('page-edit-item') ) {
            $('#city').closest('.form-group').addClass('is-chained');
            $('#city').closest('.form-group').removeClass('selected-option-check');

            $('#district').closest('.form-group').addClass('is-chained');
            $('#district').closest('.form-group').removeClass('selected-option-check');
        }
        $.ajax({
            url: 'assets/inc/search_form_query.php',
            type: 'POST',
            data: { action: 'country', id: id },
            success: function(data) {
                $('#city').closest('.form-group').removeClass('is-chained');
                $('#city').closest('.form-group').height(39);
                $('#city').closest('.form-group').html(data);
                $('#city').selectpicker('render');
            }
        });
    }
    else {
        if( !$('body').hasClass('page-submit') && !$('body').hasClass('page-edit-item') ) {
            $('#city').closest('.form-group').addClass('is-chained');
            $('#city').val('');
            $('#district').closest('.form-group').addClass('is-chained');
            $('#district').val('');
        }

    }

});

$city.live('change', function () {
    var id = $(this).val();
    if( id ){
        if( !$('body').hasClass('page-submit') && !$('body').hasClass('page-edit-item') ) {
            $('#district').closest('.form-group').addClass('is-chained');
            $('#district').closest('.form-group').removeClass('selected-option-check');
        }

        $.ajax({
            url: 'assets/inc/search_form_query.php',
            type: 'POST',
            data: { action: 'city', id: id },
            success: function(data) {
                $('#district').closest('.form-group').removeClass('is-chained');
                $('#district').closest('.form-group').height(39);
                $('#district').closest('.form-group').html(data);
                $('#district').selectpicker('render');
            }
        });
    }
    else {
        if( !$('body').hasClass('page-submit') && !$('body').hasClass('page-edit-item') ) {
            $('#district').closest('.form-group').addClass('is-chained');
            $('#district').val('');
        }

    }

});