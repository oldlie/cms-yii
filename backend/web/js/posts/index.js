$(function () {
    var checkedId = {};

    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    }).on('ifChecked', function (event) {
        var val = $(this).attr('data-value');
        checkedId[val] = val;
    }).on('ifUnchecked', function (event) {
        var val = $(this).attr('data-value');
        delete checkedId[val];
    });

    $('.refresh-btn').on('click', function () {
        location.reload();
    });

    $('.select-all-btn').on('click', function () {
        var value = +$(this).attr('data-value');
        if (value > 0) {
            $('input[type="checkbox"]').iCheck('uncheck');
            $(this).attr('data-value', '0');
            $('.select-all-btn').find('i').removeClass('fa-check-square-o').addClass('fa-square-o');
        } else {
            $('input[type="checkbox"]').iCheck('check');
            $(this).attr('data-value', '1');
            $('.select-all-btn').find('i').removeClass('fa-square-o').addClass('fa-check-square-o');
        }
    });
});