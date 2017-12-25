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