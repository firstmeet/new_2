var manage = {};
manage.logout = function(dom){
    var logoutRrl = $(dom).attr('logoutRrl');
    var loginUrl = $(dom).attr('loginUrl');
    $.post(logoutRrl,null,function(){
        location.href=loginUrl;
    });
}

//admin-获取邀请列表
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

//custom-获取签约列表
manage.get_sign_list =  function (url){
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
                var signResObj = {};
                //签名状态判断
                if (data[x].status == '1') {
                    signResObj.event = 'detail';
                    signResObj.act = '查看';
                    signResObj.buttonClass = 'layui-btn-primary';
                }else{
                    signResObj.event = 'edit';
                    signResObj.act = '签名';
                    signResObj.buttonClass = '';
                }

                html+='<tr>'+
                        '<td>'+ data[x].title+'</td>'+
                        '<td>'+ data[x].username+'</td>'+
                        '<td>'+ data[x].created_at+'</td>'+
                        '<td>'+ data[x].status_text+'</td>'+
                        '<td>'+
                            '<div class="layui-table-cell laytable-cell-1-0-11">'+
                                '<a class="layui-btn layui-btn-xs '+signResObj.buttonClass+'" lay-event="'+signResObj.event+'">'+signResObj.act+'</a>'+
                            '</div>'+
                        '</td>'+
                      '</tr>';
            }
            $('table.content-box tbody').append(html);
        }
        layer.close(index);
    },'json');
}