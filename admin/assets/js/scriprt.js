
ajaxRequest = function (url, data, callback) {
    console.log('ajax...');
    $.ajax({
        url: url,
        method: 'POST',
        data: data,

        success: function (success, data) {
            if (success) {
                console.log(data);
                callback(data);
            }
            
        }
    })
}