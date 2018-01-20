$(function () {
    
    let breadcrumb = [
        {id:0, text: '根标签', parent_id: 0}
    ]

    let buildBreadcrumb = function () {
        let html = '';
        console.log(breadcrumb.length);
        for (let i = 0; i < breadcrumb.length; i++) {
            const item = breadcrumb[i];
            if (i === breadcrumb.length - 1) {
                html += `<li class="active">${item.text}</li>`;
            } else {
                html += `<li><a class="bc-check" data-id="${item.id}">${item.text}</a></li>`;
            }
        }
        $('#breadcrumb').html(html);
    };

    var load = function(id) {
        var url = load_url.replace('&id=0', '&id=' + id);
        $.get(url, function (json) {
            let html = '';
            if (json['status'] === 1 && json['list'].length > 0) {
                if (id == 0) {
                    html += `\
<tr>\
    <td>0</td>\
    <td><a class="select-item" data-id="0" data-value="根标签" data-toggle="tooltip" data-placement="top" title="点击选择">根标签</a></td>\
    <td><img src="/uploads/image/1.jpg" style="width:32px;height:32px;"></td>\
    <td></td>\
</tr>`;
                }
                for (let i = 0; i < json['list'].length; i++) {
                    const item = json['list'][i];
                    console.log('id:', item['id']);
                    console.log(id);
                    if (item['id'] == id) {
                        continue;
                    }
                    let image = item['t_icon_file'];
                    if (!image || image == '') {
                        image = '/uploads/image/1.jpg';
                    } else {
                        image = upload + image;
                    }
                    html += `\
<tr>\
    <td>${item['id']}</td>\
    <td><a class="select-item" data-id="${item['id']}" data-value="${item['t_text']}" data-toggle="tooltip" data-placement="top" title="点击选择">${item['t_text']}</a></td>\
    <td><img src="${image}" style="width:32px;height:32px;"></td>\
    <td><a class="goto-child" data-id="${item['id']}" data-value="${item['t_text']}" data-parent="${item['parent_id']}">查看子标签</a></td>\
</tr>`;
                }
                $('#tag_table').html(html);
                buildBreadcrumb();
                bindEvents();
            }
        });
    };

    let bindEvents = function () {
        $('#tag_table_overlay').addClass('hide');
        $('[data-toggle="tooltip"]').tooltip()
        $('.select-item').on('click', function (){
            $('#tagform-parent_id').attr('value', $(this).attr('data-id'));
            $('#tagform-parent_text').attr('value', $(this).attr('data-value'));
            $('#parent_list_modal').modal('hide');
        });
        $('.goto-child').on('click', function () {
            const id = $(this).attr('data-id');
            breadcrumb.push({
                id: id,
                text: $(this).attr('data-value'),
                parent_id: $(this).attr('data-parent')
            });
            load(id);
        });
        $('.bc-check').on('click', function () {
            const id = $(this).attr('data-id');
            let find = false;
            for (let i = 0; i < breadcrumb.length; i++) {
                const item = breadcrumb[i];
                if (id == item.id) {
                    find = true;
                }
                if (find) {
                    breadcrumb.pop();
                }
            }
            console.log(breadcrumb.length);
            load(id);
        });
    };    

    $('#parent_list_modal').on('show.bs.modal', function () {
        $('#tag_table_overlay').removeClass('hide');
        load(0);
    });
});