var manage = {};

//退出
manage.logout = function(dom){
    var logoutRrl = $(dom).attr('logoutRrl');
    var loginUrl = $(dom).attr('loginUrl');
    $.post(logoutRrl,null,function(){
        location.href=loginUrl;
    });
}

//切换语言
manage.changeLang = function(dom){
    var lang = $(dom).attr('val');
    var url = $(dom).closest('.dropdown-menu').attr('url');
    $.ajax({
        url: url,
        // type: 'GET',
        dataType: 'json',
        data: {lang:lang},
        success: function(result) {
            console.log();
            location.href=window.location.href.replace(/lang\=[stCNencn]+/,'');
           // location.reload();
        }
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
                var status_text = '';
                html+='<tr>'+
                        '<td>'+ data[x].Invitees+'</td>'+
                        '<td>'+ data[x].created_at+'</td>'+
                        '<td>'+ data[x].status_text +'</td>'+
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
                    signResObj.act = L['15573922193994'];//下载
                    signResObj.buttonClass = 'layui-btn-primary';
                    signResObj.href = '/sign_download?signature_request_id=' + data[x].signature_id;
                }else{
                    signResObj.event = 'edit';
                    signResObj.act = L['15573884466817'];//签约
                    signResObj.buttonClass = '';
                    signResObj.href = '/user/sign';
                }

                html+='<tr>'+
                        '<td>'+ L['offer']+'</td>'+
                        // '<td>'+ data[x].sign['name']+'</td>'+
                        '<td>'+ data[x].created_at+'</td>'+
                        '<td>'+ data[x].sign.status_text+'</td>'+
                        '<td></td>'+
                      '</tr>';
                html+='<tr>'+
                        '<td colspan="3">'+ L['15577299351337']+'</td>'+
                        '<td><a href="/download_word" lay-event="detail" class="layui-btn layui-btn-sm">'+ L['15573922193994'] +'</a></td>'+
                      '</tr>';
            }
            $('table.content-box tbody').append(html);
        }
        layer.close(index);
    },'json');
}

//user首页弹框提示
manage.homeshow = function(url){
    $.get(url,{status:0},function(data){
        if (data.error) {
            layer.msg(data.message,{icon: 5});
            return;
        }
        var data = data.data;
        if (data && data.length) {
            layer.open({
              type: 1,
              title: L['15573844885030'],
              skin: 'layui-layer-demo', //样式类名
              closeBtn: 1, //不显示关闭按钮
              anim: 2,
              shadeClose: true, //开启遮罩关闭
              content: $('.new-sign-parent').html(),
              success: function(){
                  $('.review-note').text();
              }
            });
        }else{
            $('.no-invite-box').show();
        }
    },'json');
}

//去签名
manage.gotoSign = function(){
    location.href="/user/sign";
}

/**
* 获取客户端信息
*/
manage.getClientInfo = function (){
   var userAgentInfo = navigator.userAgent;
   var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
   var agentinfo = null;
   for (var i = 0; i < Agents.length; i++) {
       if (userAgentInfo.indexOf(Agents[i]) > 0) { agentinfo = userAgentInfo; break; }
   }
   if(agentinfo){
        return agentinfo;
   }else{
        return "PC";
   }
}

//步骤跳转
manage.gostep = function(dom,stepDom,callback){
    // location.href="/user/sign";
    var callback = callback ? callback : function(){};
    var stepDom = stepDom ? stepDom : '.review-box';
    var isNext = $(dom).hasClass('next');
    var isPrev = $(dom).hasClass('prev');
    var curStep = $(dom).parents(stepDom).attr('step');

    //如果是下一步
    if (isNext) {
        var showStepNum = Number(curStep)  + 1;
        $(stepDom + '[step='+curStep+']').hide();
        $(stepDom + '[step='+showStepNum+']').show();
        callback();
    }

    //如果是上一步
    if (isPrev) {
        var showStepNum = Number(curStep)  - 1;
        $(stepDom + '[step='+curStep+']').hide();
        $(stepDom + '[step='+showStepNum+']').show();
        callback();
    }
}


function lalert(msg){
	layer.alert(msg,{title:false,closeBtn:false});
}
