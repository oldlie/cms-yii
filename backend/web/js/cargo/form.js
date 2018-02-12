$(function () {
    
<<<<<<< HEAD
=======
    const  trTemp = `<tr>\
    <td>@{id}</td>
    <td>@{title}</td>
    <td>@{summary}</td>
    <td>
        <button class="btn btn-default btn-sm" data-id="@{id}" data-value="@{title}">选择<button>
    </td>
</tr>`;

    const core = new Core();
    const callout = new CallOut('#callOut');

    function loadSpec(form) {
        $.post('', form, function (json) {
            if (json['success'] === 1) {
                let html = '';
                for (let i = 0; i < json['list'].length; i++) {
                    let item  = json['list'][i];
                    html += core.html(trTemp, {
                        'id': item['id'], 
                        'title': itme['name'], 
                        'summary' : item['feature']
                    });
                }
                $('#specTableContent').html(html);
            } else {
                callout.warning(json['message']);
            }
        });
    };

    function loadTag(formData) {
        $.post('', formData, function (json) {
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
    }
>>>>>>> bb5de6703ef01e08ee56b305cce057df57e4e8b5
});