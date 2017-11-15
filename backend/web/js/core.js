var Core = (function(){
    
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

    Core.prototype.pagination = function(page, size, total, cells) {
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

        return {"pages": pages, "list" : indexList};
    };

    return Core;
})();