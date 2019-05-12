@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15434808149179']}}</b></span>
            </div>
            <div class="review-box">
                <form class="layui-form invite-form" onsubmit="return false">
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 70px;">@{{T['15318198537797']}}</label>
                    <div class="layui-input-block" style="margin-left: 90px;width: 100%;">
                      <input type="text" name="email" lay-verify="title" autocomplete="off" class="layui-input" style="display: inline-block;width: 30%;margin-right: 15px;">
                      <button class="layui-btn" lay-filter="demo1">@{{T['15434866101162']}}</button>
                    </div>
                  </div>
                </form>

                <div class="layui-form">
                  <table class="layui-table content-box">
                    <tbody>
                        <tr>
                          <th>@{{T['15573897293791']}}</th>
                          <th>@{{T['15573898069420']}}</th>
                          <th>@{{T['15434866105325']}}</th>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
    manage.get_invite_list('/invite');

    //提交邀请
    $('.invite-form button').click(function(){
        var params = {};
        params.email = $('input[name=email]').val();
        var url = '/invite';
        $.post(url,params,function(res){
            if (res.error != 0) {
                layer.msg(res.message,{icon: 5});
            }else{
                layer.msg(res.message);
            }
        },'json');
    });
});

</script>

@include('common.footer') 
