@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15423543047283']}}</b></span>
            </div>
            <div class="review-box">
                <form class="layui-form invite-form" onsubmit="return false">
                  <div class="layui-form-item">
                    <label class="layui-form-label">@{{T['15318198537797']}}</label>
                    <div class="layui-input-block">
                      <input type="text" name="email" lay-verify="title" autocomplete="off" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-input-block">
                    <button class="layui-btn" lay-filter="demo1">@{{T['15434866101162']}}</button>
                  </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('common.footer') 

<script type="text/javascript">
$(function(){
    //提交邀请
    $('.invite-form button').click(function(){
        var params = {};
        params.email = $('input[name=email]').val();
        var url = '{!! url("/invite") !!}';
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