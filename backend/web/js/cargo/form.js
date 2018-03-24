$(function () {
    
    const  trTemp = `<tr>\
    <td><input type="checkbox"></td>
    <td>@{id}</td>
    <td>@{title}</td>
    <td>@{summary}</td>
    <td>@{price}</td>
    <td>@{inventory}</td>
    <td>
        <button class="btn btn-default btn-sm" data-id="@{id}" data-value="@{title}">选择</button>
    </td>
</tr>`;

const  specTdhtmlTemp = `<tr>\
<td>@{id}</td>\
<td>@{title}</td>\
<td><a class=".spec-delete-btn text-red"><i class="fa fa-trash"></i></a></td>\
</tr>`;

const tagHtmlTemp = `<tr>
<th style="width:40px;">\
    <input id="checkAll" type="checkbox">
</th>
<th style="width:60px;">@{id}</th>\
<th style="width:180px;">@{title}</th>\
<th style="width:80px;">\
<button class="btn btn-default btn-sm" data-id="@{id}" data-value="@{title}">选择</button>\
</th>\
</tr>`;

    const core = new Core();
    const callout = new CallOut('#callOut');
    const specForm = {
        page: 1
    };
    const tagForm = {
        id: 0
    };

    function loadSpec() {
        $.post(ajaxListSpecUrl, specForm, function (json) {
            console.log(json);
            if (json['status'] === 1) {
                let html = '';
                for (let i = 0; i < json['list'].length; i++) {
                    let item  = json['list'][i];
                    html += core.html(trTemp, {
                        'id': item['id'], 
                        'title': item['name'], 
                        'summary' : item['feature'],
                        'price': item['price'],
                        'inventory': item['inventory']
                    });
                }
                $('#specTableContent').html(html);
            } else {
                callout.warning(json['message']);
            }
        });
    };

    function loadTag(formData) {
        $.get(`${ajaxListTagUrl}/id=${tagForm.id}`, function (json) {
            if (json['success'] === 1) {
                for (let i = 0; i < json['list'].length; i++) {
                    let item  = json['list'][i];
                    html += core.html(trTemp, {
                        'id': item['id'], 
                        'title': itme['t_text'], 
                        'summary' : item['feature']
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
                let html = core.html(specTdhtmlTemp, {id:json['id'], title: name});
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

    $('#tagModel').on('show.bs.modal', function () {
        tagForm.id = 0;
        loadTag();
    });
});