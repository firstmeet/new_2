@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title">
                <span><em>当前位置：</em><b>填写用户信息</b></span>
            </div>
            <div class="review-box pre-sign-box">
                <form class="layui-form invite-form" onsubmit="return false">
                  <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                      <input type="text" name="signname" lay-verify="title" autocomplete="off" class="layui-input">
                    </div>
                  </div>

                  <div class="layui-form-item">
                      <label class="layui-form-label">购买股数</label>
                      <div class="layui-input-block">
                        <input type="text" name="shares" lay-verify="title" autocomplete="off" class="layui-input">
                      </div>
                  </div>

                  <div class="layui-input-block">
                    <button class="layui-btn" type="button" lay-filter="demo1">提交</button>
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
        params.name = $('form input[name=signname]').val();
        params.number = $('form input[name=shares]').val();
        var url = '{!! url("/sign/update") !!}';
        $.ajax({
            url: url,
            type: 'PUT',
            dataType: 'json',
            data: params,
            success: function(res) {
                if (res.error == 0) {
                    layer.msg(res.message);
                }else{
                    layer.msg(res.message,{icon: 5});
                }
            }
        });
    });
});
</script>