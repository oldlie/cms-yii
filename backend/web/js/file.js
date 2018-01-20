$(function () {
    var core = new Core();

    // region 上传图片
    $(upload_btn).on('click', function () {
        $(file_input_group_id).addClass('hide');
        $(progress_group_id).removeClass('hide');
        var formData = new FormData();
        formData.append('_csrf-backend', csrf);
        formData.append('FileForm[image]', document.getElementById(file_input_id).files[0]);
        core.uploadFile(upload_url, formData, uploadImageProgerss, uploadImageComplete, null, null);
    });
    
    var uploadImageProgerss = function (event) {
        if (event.lengthComputable) {
            var percentComplete = Math.round(event.loaded * 100 / event.total);
            $(progress_name).css('width', percentComplete);
        }
    };
    
    var uploadImageComplete = function (event) {
        var request = event.target;
        var response = JSON.parse(request.responseText);
        console.log(response);
        $(file_input_group_id).removeClass('hide');
        $(progress_group_id).addClass('hide');
        $(image_id).attr('src', upload + response['image']);
        $(image_path_id).val(response['image']);
    }
    // endregion
});

