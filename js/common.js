$record = 4;

// Hàm hiệu ứng hiển thị vùng nhóm
function movemaID(maid) {
    var target = $('#' + maid);
    if (target.length) {
        $('html,body').animate({
            scrollTop: target.offset().top
        }, 1000);
        return false;
    }
}

// Hàm phân trang
function buildSlidePage(obj, codan, pageActive, totalPage) {
    var html = '';
    pageActive = parseInt(pageActive);
    for (i = 1; i <= codan; i++) {
        if (pageActive - i < 0) break;
        html = '<button type="button" class="btn btn-outline btn-default" value="' + (pageActive - i) + '">' + (pageActive - i + 1) + '</button>' + html;
    }
    // if (pageActive > codan) {
    //     html = '<button type="button" class="btn btn-outline btn-default" value="' + (pageActive - i) + '">...</button>' + html;
    // }
    html += '<button type="button" class="btn btn-outline btn-default" style="background-color:  rgb(179, 213, 243)" value="' + pageActive + '">' + (pageActive + 1) + '</button>';
    for (i = 1; i <= codan; i++) {
        if (pageActive + i >= totalPage) break;
        html = html + '<button  type="button" class="btn btn-outline btn-default" value="' + (pageActive + i) + '">' + (pageActive + i + 1) + '</button>';
    }
    // if (totalPage - pageActive > codan + 1) {
    //     html = html + '<button type="button" value="' + (pageActive + i) + '" class="btn btn-outline btn-default">...</button>';
    // }
    obj.html('<button type="button" class="btn btn-outline btn-default" value="0">|&lt;</button><button type="button" class="btn btn-outline btn-default" value="' + (pageActive - 1) + '">&lt;&lt;</button>' + html + '<button type="button" class="btn btn-outline btn-default" value="' + (pageActive + 1) + '">&gt;&gt;</button><button type="button" class="btn btn-outline btn-default" value="' + (totalPage - 1) + '">&gt;|</button>');
}


function printSTT(record, pageCurr) {
    if ((pageCurr + 1) == 1) {
        return 1;
    } else {
        return record * (pageCurr + 1) - (record - 1);
    }
}

//Hàm gởi và trả dữ liệu về client
function queryDataGet(url, dataSend, callback) {
    $.ajax({
        type: 'GET',
        url: url,
        data: dataSend,
        async: true,
        dataType: 'json',
        success: callback
    });
}
function queryDataPost(url, dataSend, callback) {

    $.ajax({
        type: 'POST',
        url: url,
        data: dataSend,
        async: true,
        dataType: 'json',
        success: callback
    });
}
