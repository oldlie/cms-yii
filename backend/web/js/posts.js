$(function () {
    var callout = new CallOut('#callOut');
    var core = new Core();
    var reg = /(\s|\.)+/g; // 替换空格为短横线

    $('#postsform-title').on('change', function () {
        var text = $(this).val();
        $('#postsform-slug').val(text.replace(reg, '-'));
    });

    // 保存草稿
    $('#saveDraftBtn').on('click', function () {
        var id = $('#postsform-id').val();
        console.log('save draft id:', id);
        var data = {
            'PostsForm[id]' : $('#postsform-id').val(),
            'PostsForm[title]' : $('#postsform-title').val(),
            'PostsForm[slug]' : $('#postsform-slug').val(),
            'PostsForm[content]' : $('#postsform-content').val()
        };
        if (id) { // update
            $.post(updateNewPostUrl, data, function(data) {
                console.log(data);
            });
        } else { // save
            $.post(saveNewPostUrl, data, function(data) {
                if (data['status'] === 1) {
                    callout.success('已保存。');
                } else {
                    callout.warning(data['message']);
                }
            });
        }
    });

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
        $('#uploadImageBtn').text('上传图片').removeAttr('disabled');
    }
    // endregion
});

