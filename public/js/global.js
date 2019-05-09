var manage = {};
manage.logout = function(dom){
    var logoutRrl = $(dom).attr('logoutRrl');
    var loginUrl = $(dom).attr('loginUrl');
    $.post(loginUrl,null,function(){
        location.href=loginUrl;
    });
}

manage.get_invite_list =  function (url){
    //邀请列表
    var index = layer.load(1);
    $.get(url,{},function(data){
        if (data.error) {
            layer.msg(data.message,{icon: 5});
            return;
        }
        var html = '';
        var data = data.data;
        if (data) {
            for (var x in data) {
                html+='<tr>'+
                        '<td>'+ data[x].Invitees+'</td>'+
                        '<td>'+ data[x].created_at+'</td>'+
                        '<td>'+ data[x].signs+'</td>'+
                      '</tr>';
            }
            $('table.content-box tbody').append(html);
        }
        layer.close(index);
    },'json');
}