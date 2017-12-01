$(function () {
    var callout = new CallOut('#callOut');
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
});