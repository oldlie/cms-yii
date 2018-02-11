$(function () {
    
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
                
            } else {
                callout.warning();
            }
        });
    };
});