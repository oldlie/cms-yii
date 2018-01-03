$(function () {
    var callout = new CallOut('#callOut');
    var core = new Core();
    var reg = /(\s|\.)+/g; // 替换空格为短横线
    var autoSaveTime = 15000;

    $('#postsform-title').on('change', function () {
        var text = $(this).val();
        $('#postsform-slug').val(text.replace(reg, '-'));
    });

    // region auto save
    var autoSaveCount = 0;
    var autoSaveInterval = setInterval(function () {
        console.log('AutoSaveCount:', autoSaveCount++);
        const promise = saveDraft();
        if (promise != null) {
            promise.then(x => {
                if (x['status'] === 0) {
                    callout.success('已保存。');
                } else {
                    callout.warning(x['message']);
                }
            });
        }
       
    }, autoSaveTime);

    $('#autoSaveDraftBtn').on('click', function () {
        if (autoSaveInterval) {
            autoSaveTime = (+$('#autoSaveDraftInput').val()) * 1000;
            console.log(autoSaveTime);
            clearInterval(autoSaveInterval);

            autoSaveInterval = setInterval(function () {
                saveDraft();
            }, autoSaveTime);
        }
    });

    var saveDraft = function () {
        var id = $('#postsform-id').val();
        var title = $('#postsform-title').val();
        console.log('save draft id:', id);
        if (title.replace(/(^\s)|(\s$)/g, '') === '') {
            console.log('no title');
            return null;
        }
        var data = {
            '_csrf-backend': csrf,
            'PostsForm[id]': $('#postsform-id').val(),
            'PostsForm[title]': $('#postsform-title').val(),
            'PostsForm[slug]': $('#postsform-slug').val(),
            'PostsForm[abstract]': $('#postsform-abstract').val(),
            'PostsForm[content]': $('#postsform-content').val(),
            'PostsForm[image]': $('#postsform-image').val(),
            'PostsForm[comment_status]': $('#postsform-comment_status').val()
        };
        let promise = new Promise((resolve, reject) => {
            if (id) {
                $.post(updateNewPostUrl, data, function (data) {
                    resolve(data);
                });
            } else {
                $.post(saveNewPostUrl, data, function (data) {
                    resolve(data);
                });
            }
        });
        return promise;
        // }
    };
    // endregion

    // 保存草稿
    $('#saveDraftBtn').on('click', saveDraft);

    // region 上传图片
    $('#uploadImageBtn').on('click', function () {
        $('#uploadImageBtn').attr('disabled', 'disabled');
        var formData = new FormData();
        formData.append('_csrf-backend', csrf);
        formData.append('id', 1);
        formData.append('PostsImageUploadForm[image]', document.getElementById('uploadImageFile').files[0]);
        core.uploadFile(uploadImaegUrl, formData, uploadImageProgerss, uploadImageComplete, null, null);
    });

    var uploadImageProgerss = function (event) {
        if (event.lengthComputable) {
            var percentComplete = Math.round(event.loaded * 100 / event.total);
            $('#uploadImageBtn').text('正在上传' + percentComplete + '%');
        }
    };

    var uploadImageComplete = function (event) {
        var request = event.target;
        $('#uploadImageBtn').text('上传图片').removeAttr('disabled');
        console.log(request.responseText);
        var response = JSON.parse(request.responseText);
        $('#postsform-image').val(response['image']);
        $('#uploadImg').attr('src', upload + response['image']);
    }
    // endregion

    // region Navigation
    var rootHtmlTemp =
        '<div class="btn-group">' +
        '<button type="button" class="btn btn-default root-btn" data-id="@{id}" data-parent="@{parent}">@{text}</button>' +
        '</div>';
    var itemHtmlTemp =
        '<div class="btn-group">' +
        '<button type="button" class="btn btn-default item-btn" data-id="@{id}">@{text}</button>' +
        '<button type="button" class="btn btn-default dropdown-toggle child-btn" data-toggle="dropdown" @{disabled} data-id="@{id}" data-parent="@{parent}" data-text="@{text}"> ' +
        '<span class="caret"></span>' +
        '<span class="sr-only">Toggle Dropdown</span> ' +
        '</button>' +
        '</div>';
    var currentId = 0;

    var bindEvent = function () {
        $('.item-btn').bind('click', function () {
            $('#postsform-category').val($(this).attr('data-id'));
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
                html = core.html(rootHtmlTemp, { id: 0, parent: 0, text: '根目录' });
            } else {
                let item = data.item;
                html = core.html(rootHtmlTemp, { id: item['id'], parent: item['parent'], text: item['title'] });
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
    // endregion

    // region publish
    $('#publishBtn').on('click', function () {
        const menuId = $('#postsform-category').val();
        if (menuId) {
            const promise = saveDraft();
            promise.then(x => {
                if (x['status'] === 0) {
                    $('#posts-form').submit();
                } else {
                    callout.error(x['message']);
                }
            });
        } else {
            callout.warning('请选择文章所在栏目。');
        }
    });
    // endregion
});


