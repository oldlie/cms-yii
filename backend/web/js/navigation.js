$(function () {

    var core = new Core();
    var rootHtmlTemp = 
    '<div class="btn-group">' +
    '<button type="button" class="btn btn-default root-btn" data-id="@{id}" data-parent="@{parent}">@{text}</button>' +
    '</div>';
    var itemHtmlTemp = 
    '<div class="btn-group">' +
    '<button type="button" class="btn btn-default item-btn" data-id="@{id}">@{text}</button>' +
    '<button type="button" class="btn btn-default dropdown-toggle child-btn" data-toggle="dropdown" @{disabled} data-id="@{id}" data-parent="@{parent}" data-text="@{text}"> ' +
    '<span class="caret"></span>' +
    '<span class="sr-only">Toggle Dropdown</span> '+
    '</button>' +
    '</div>';
    var currentId = 0;

    var bindEvent = function () {
        $('.item-btn').bind('click', function () {
            $('#categoryform-parent').val($(this).attr('data-id'));
            $('#parentTxtLabel').html($(this).text());
            $('#myModal').modal('hide');
        });
        $('.root-btn').bind('click', function () {
            let id = +$(this).attr('data-id');
            if (id === 0) {
                $('#categoryform-parent').val(0);
                $('#parentTxtLabel').html('根目录');
                $('#myModal').modal('hide');
            } else {
                console.log('id is not zero.');
                currentId = +$(this).attr('data-parent');
                loadData();
            }
        });
        $('.child-btn').bind('click', function () {
            currentId = +$(this).attr('data-id');
            loadData();
        });
    };

    var loadData = function () {
        $.post('index.php?r=category/list', { 'id': currentId }, function (data) {
            console.log(data);
            let html = '';
            if (currentId === 0) {
                html = core.html(rootHtmlTemp, {id: 0, parent: 0, text: '根目录'});
            } else {
                let item = data.item;
                html = core.html(rootHtmlTemp, {id: item['id'], parent: item['parent'], text: item['title']});
            }
            for (let i = 0; i < data.list.length; i++) {
                let item = data.list[i];
                let disabled = 'disabled="disabled"';
                if (+item['child_count'] > 0) {
                    disabled = '';
                }
                html += core.html(itemHtmlTemp, {
                    'id': item['id'],
                    'text': item['title'],
                    'parent': item['parent'],
                    'disabled': disabled
                });
            }
            console.log(html);
            $('#categoryListPanel').html(html);
            bindEvent();
        });
    }

    loadData();
});