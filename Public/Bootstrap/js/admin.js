$("#msg_alert_close").click(function () {
    $("#msg_alert").alert('close');
    //$('#msg_alert').removeClass('show').addClass('hidden');
});

function change_status(class_id, url, mode) {
    mode = mode || 'recycle';
    $("." + class_id).click(function () {
        var data_id = $(this).attr('data-id');
        $.post(url, {'id': data_id, 'mode': mode}, function (data) {
            if (data.status == 1) {
                location.reload();
            } else {
                $('#alert_msg').html(data.info);
                $('#msg_alert_box').modal('show');
            }
        }, 'json').error(function () {
            $('#alert_msg').html('网络连接错误，请稍后重试');
            $('#msg_alert_box').modal('show');
        });
    });
}




