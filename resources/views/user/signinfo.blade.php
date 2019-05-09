@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15573872107246']}}</b></span>
            </div>
            <div class="review-box pre-sign-box">
                <form class="layui-form invite-form" onsubmit="return false">
                  <div class="layui-form-item">
                    <label class="layui-form-label">@{{T['15324194276032']}}</label>
                    <div class="layui-input-block">
                      <input type="text" name="signname" lay-verify="title" autocomplete="off" class="layui-input">
                    </div>
                  </div>


                  <div class="layui-form-item">
                    <label class="layui-form-label">@{{T['15573864972429']}}</label>
                    <div class="layui-input-block">
                      <select name="city" lay-verify="required">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  

                  <div class="layui-input-block">
                    <button class="layui-btn" type="button" lay-filter="demo1">@{{T['15434866101162']}}</button>
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

layui.use('form', function(){
  var form = layui.form;
  form.render();
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});

</script>