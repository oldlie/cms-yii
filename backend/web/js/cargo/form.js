$(function () {

    const trTemp = `<tr>\
    <td><input type="checkbox"></td>
    <td>@{id}</td>
    <td>@{title}</td>
    <td>@{summary}</td>
    <td>@{price}</td>
    <td>@{inventory}</td>
    <td>
        <button class="btn btn-default btn-sm spec-chose-btn" data-id="@{id}" data-value="@{title}">选择</button>
    </td>
</tr>`;

    const specTdhtmlTemp = `<tr>\
<td>@{id}</td>\
<td>@{title}</td>\
<td><a class=".spec-delete-btn text-red"><i class="fa fa-trash"></i></a></td>\
</tr>`;

    const core = new Core();
    const callout = new CallOut('#callOut');
    const specForm = {
        page: 1,
        name: ''
    };

    const specPagination = new Pagination('#specPagenation', 'spec-pagination');

    $('#specNameSearchBtn').on('click', function () {
        specForm.name = $('#specNameSearchInput').val();
        console.log($('#specNameSearchInput').val(), specForm);
        loadSpec();
    });

    function loadSpec() {
        $.post(ajaxListSpecUrl, specForm, function (json) {
            console.log(json);
            if (json['status'] === 1) {
                let html = '';
                for (let i = 0; i < json['list'].length; i++) {
                    let item = json['list'][i];
                    html += core.html(trTemp, {
                        'id': item['id'],
                        'title': item['name'],
                        'summary': item['feature'],
                        'price': item['price'],
                        'inventory': item['inventory']
                    });
                }
                $('#specTableContent').html(html);
                specPagination.render(specForm.page, 10, json['total'], 5)
                    .bindEvent(() => {
                        $('.spec-pagination').on('click', function () {
                            specForm.page = $(this).attr('data-index');
                            loadSpec();
                        });
                    });

                $('.spec-chose-btn').on('click', function () {
                    $('#specModel').modal('hide');
                    let id = $(this).attr('data-id');
                    let title = $(this).attr('data-value');
                    let html = core.html(specTdhtmlTemp, { id: id, title: title });
                    $('#specTableBody').append(html);
                });
            } else {
                callout.warning(json['message']);
            }
        });
    };

    function loadTag(formData) {
        $.post('', formData, function (json) {
            if (json['success'] === 1) {
                for (let i = 0; i < json['list'].length; i++) {
                    let item = json['list'][i];
                    html += core.html(trTemp, {
                        'id': item['id'],
                        'title': itme['t_text'],
                        'summary': item['feature']
                    });
                }
            } else {
                $('#stagTableContent').html(html);
            }
        });
    };

    $('#newSpecBtn').on('click', function () {
        const name = $('#specNameInput').val();
        const breed = $('#breedInput').val();
        const origin = $('#originInput').val();
        const feature = $('#featureInput').val();
        const store = $('#storeInput').val();
        const spec = $('#specInput').val();
        const productDatetime = $('#productDatetimeInput').val();
        const quota = $('#quotaInput').val();
        const price = $('#priceInput').val();
        const inventory = $('#inventoryInput').val();

        const formData = {
            '_csrf-backend': csrf,
            'SpecificationForm[name]': name,
            'SpecificationForm[breed]': breed,
            'SpecificationForm[origin]': origin,
            'SpecificationForm[feature]': feature,
            'SpecificationForm[store]': store,
            'SpecificationForm[spec]': spec,
            'SpecificationForm[product_datetime]': productDatetime,
            'SpecificationForm[quota_policy]': quota,
            'SpecificationForm[price]': price,
            'SpecificationForm[inventory]': inventory,
        };

        $.post(ajaxCreateSpecUrl, formData, function (json) {
            console.log(json);
            if (json['status'] == 0) {
                callout.warning(json['message']);
            } else {
                $('#specModel').modal('hide');
                console.log('temp:', specTdhtmlTemp);
                let html = core.html(specTdhtmlTemp, { id: json['id'], title: name });
                $('#specTableBody').append(html);
                clearNewSpecInput();
            }
        })
    });

    function clearNewSpecInput() {
        $('#specNameInput').val('');
        $('#breedInput').val('');
        $('#originInput').val('');
        $('#featureInput').val('');
        $('#storeInput').val('');
        $('#specInput').val('');
        $('#productDatetimeInput').val('');
        $('#quotaInput').val('');
        $('#priceInput').val('');
        $('#inventoryInput').val('');
    }

    $('#specModel').on('show.bs.modal', function () {
        specForm.page = 1;
        loadSpec();
    });
});