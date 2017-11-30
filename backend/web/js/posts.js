$(function () {
    var reg = /(\s|\.)+/g; // 替换空格为短横线

    $('#postsform-title').on('change', function () {
        var text = $(this).val();
        $('#postsform-slug').val(text.replace(reg, '-'));
    });

    // 保存草稿
    $('#saveDraftBtn').on('click', function () {
        var id = $('#postsform-id').val();
        console.log('save draft id:', id);
        if (id) { // update

        } else { // save
            $.post(saveNewPostUrl, {
                'PostsForm[title]' : $('#postsform-title').val(),
                'PostsForm[slug]' : $('#postsform-slug').val(),
                'PostsForm[slcontentug]' : $('#postsform-content').val(),
                'PostsForm[slcontentug]' : $('#postsform-content').val(),
            }, function(data) {
                console.log(data);
            });
        }
    });
});