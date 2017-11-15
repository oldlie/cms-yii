$(function () {
    
    var core = new Core();
    var template = '<button type="button" class="list-group-item" data-id="@{id}">@{text}</button>';
    
    var currentId = 0;
    
    var bindEvent = function () {
        $('.list-group-item').bind('click', function () {
            currentId = $(this).attr('data-id');
            loadData();
        });
    };

    var loadData = function () {
        $.post('index.php?r=category/list', { 'id' : currentId }, function (data) {
            console.log(data);
            let html = '';
            if (data.list.length <= 0)
            if (currentId > 0) {;

            }
            for (let i = 0; i < data.list.length; i++) {
                let item = data.list[i];
                html += core.html(template, {
                    'id' : item['id'],
                    'text' : item['title']
                });
            }
            console.log(html);
            $('#categoryList').html(html);
            bindEvent();
        });
    }

    //loadData();
});