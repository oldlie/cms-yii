var Core = (function () {

    var Core = function () {
        console.log('init core.');
    };

    var key;

    Core.prototype.html = function (template, keyValues) {
        for (key in keyValues) {
            var re = '\\@\{' + key + '\}';
            template = template.replace(new RegExp(re, "g"), keyValues[key]);
        }
        return template;
    };

    Core.prototype.pagination = function (page, size, total, cells) {
        var indexList = [];
        var pageStart = 0;
        var pageEnd = 0;
        var pages = Math.ceil(total / size);

        if (pages > cells) {
            var mid = Math.ceil(cells / 2);

            if (page > mid) {
                if (page + mid >= pages + 1) {
                    pageStart = pages - cells;
                } else {
                    pageStart = page - mid;
                }
            } else {
                pageStart = 0;
            }

            if (page > pages - cells + 1) {
                pageEnd = pages;
            } else {
                pageEnd = pageStart + cells;
            }

        } else {
            pageStart = 0;
            pageEnd = pages;
        }

        for (var i = pageStart; i < pageEnd; i++) {
            indexList.push(i + 1);
        }

        return { "pages": pages, "list": indexList };
    };

    Core.prototype.jQueryID2ID = function (id) {
        return id.slice(1);
    };

    Core.prototype.uploadFile = function (url, formData, progress, complete, error, cancel) {
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', progress, false);
        xhr.addEventListener("load", complete, false);
        if (error != null) {
            xhr.addEventListener("error", error, false);
        }
        if (cancel != null) {
            xhr.addEventListener("abort", cancel, false);
        }
        xhr.open("POST", url);//修改成自己的接口
        xhr.send(formData);
    }

    Core.prototype.uploadImageFile = function (url, jqID, fileCtlID, progress, complete) {
        $(jqID).on('click', function () {
            $(jqID).attr('disabled', 'disabled');
            var formData = new FormData();
            formData.append('_csrf-backend', csrf);
            formData.append('FileForm[image]', document.getElementById(fileCtlID).files[0]);
            this.uploadFileuploadFile(url, formData, progress, complete, null, null);
        });
    }

    return Core;
})();

var CallOut = (function () {

    var _isRender = false;
    var _counter = 1;
    var core = new Core();
    var _targetElement;

    function CallOut(targetElement) {
        _targetElement = targetElement;
    }

    var _tpl = {
        callOut: '<div id="@{id}" style="width: 30%; position: fixed; top: 0px; right: 0px; z-index: 99999;background-color: transparent;"></div>'
    };

    function render() {
        if (!_isRender) {
            if (!_targetElement) {
                throw "target element undefined";
            }
            $(_targetElement).replaceWith(core.html(_tpl.callOut, { id: core.jQueryID2ID(_targetElement) }));
        }
    }

    function showMessage(html) {
        render();
        var id = _targetElement + "-" + _counter.toString();
        _counter++;
        $(_targetElement).append('<div style="margin: 10px; width:100%;" id="' + core.jQueryID2ID(id) + '">' + html + "</div>");
        setTimeout(function () { $(id).remove() }, 3000);
    }

    CallOut.prototype.success = function (message) {
        return showMessage('<div class="callout callout-success"><i class="fa fa-check"></i>&nbsp;&nbsp;'
            + message +
            '</div>');
    };
    CallOut.prototype.info = function (message) {
        return showMessage('<div class="callout callout-info"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;'
            + message
            + '</div>');
    };
    CallOut.prototype.warning = function (message) {
        return showMessage('<div class="callout callout-warning"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;'
            + message
            + '</div>');
    };
    CallOut.prototype.danger = function (message) {
        return showMessage('<div class="callout callout-danger"><i class="fa fa-exclamation"></i>&nbsp;&nbsp;'
            + message
            + '</div>');
    };

    return CallOut;
})();

$(function () {

    // $(".select2").select2();

    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
});

var Pagination = (function () {
    const _ulWarp = '<ul class="pagination pagination-sm inline">@{content}</ul>';
    const _liWarp = '<li><a class="@{cssClass}" data-index="@{index}">@{text}</a></li>';

    let _targetElement;
    let _core;
    let _cssClass;
    let _pagination;

    function Pagination(targetElement, cssClass) {
        this._pagination = this;

        this._targetElement = targetElement;
        this._core = new Core();
        console.log(`_core:${this._core}`);
        this._cssClass = cssClass;
    }

    Pagination.prototype.render = function (page, size, total, cells) {
        const data = this._core.pagination(page, size, total, cells);
        const list = data['list'];
        const length = list.length;
        if (length <= 1) {
            return;
        }
        console.log(`pagination render:${_liWarp}`);
        let liHtml = this._core.html(_liWarp, {
            cssClass: this._cssClass, 
            index: 1,
            text: '&laquo;'
        });
        for (let i = 0; i < length; i++) {
            liHtml += this._core.html(_liWarp, {
                cssClass: this._cssClass,
                index: list[i],
                text: list[i]
            });
        }
        liHtml += this._core.html(_liWarp, {
            cssClass: this._cssClass, 
            index: data['pages'],
            text: '&raquo;'
        });
        let html = this._core.html(_ulWarp, {
            content: liHtml
        });
        $(this._targetElement).html(html);

        return this._pagination;;
    }

    Pagination.prototype.bindEvent = function (fn) {
        fn();
        return this._pagination;
    }

    return Pagination;
})();