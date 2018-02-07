$(function () {
    const callout = new CallOut('#callOut');
    if (message && message != '') {
        callout.warning(message);
    }

    $('#checkAll').on('ifChecked ', function () {
        $('input.item-check').iCheck('check');
    }).on('ifUnchecked', function () {
        $('input.item-check').iCheck('uncheck');
    });

    $('#onlineBtn').on('click', function () {
        let ids = [];
        $('input.item-check').each(function () {
            if (true == $(this).is(':checked')) {
                ids.push($(this).val());
            }
        });
        if (ids.length <= 0) {
            callout.warning('请至少选择一件商品。');
            return;
        }
        const data = {
            '_csrf-backend': csrf,
            'ids': ids.join(','),
            'status': 1
        };
        console.log('onlineBtn data:', data);

        $.post(updateStatusUrl, data, function (json) {
            if (json['status'] == 1) {
                callout.success(json['message']);
                for (let i = 0; i < ids.length; i++) {
                    $('#td_status_' + ids[i]).html('<small class="label bg-green">已上架</small>');
                }
            } else {
                callout.warning(json['message']);
            }
        });
    });

    $('#offlineBtn').on('click', function () {
        let ids = [];
        $('input.item-check').each(function () {
            if (true == $(this).is(':checked')) {
                ids.push($(this).val());
            }
        });
        if (ids.length <= 0) {
            callout.warning('请至少选择一件商品。');
            return;
        }
        const data = {
            '_csrf-backend': csrf,
            'ids': ids.join(','),
            'status': 0
        };
        console.log('onlineBtn data:', data);

        $.post(updateStatusUrl, data, function (json) {
            if (json['status'] == 1) {
                callout.success(json['message']);
                for (let i = 0; i < ids.length; i++) {
                    $('#td_status_' + ids[i]).html('<small class="label bg-yellow">已下架</small>');
                }
            } else {
                callout.warning(json['message']);
            }
        });
    });
});