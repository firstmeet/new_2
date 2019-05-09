@include('common.top')
<div class="page" id="vue_det">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back">← back to documents</div>
            <div class="short-title hide">

            </div>
            <div class="review-box hide">
                <div class="new-sign-box">
                    <div class="review-note">您好，您已经收到一份合同，点此按钮前去签名</div>
                    <div class="layui-btn-container"> 
                        <button onclick="gotoSign()" class="layui-btn layui-btn-lg layui-btn-normal gotoSign" lay-event="getCheckData">去签名</button> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
layer.open({
  type: 1,
  title: '提示',
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 1, //不显示关闭按钮
  anim: 2,
  shadeClose: true, //开启遮罩关闭
  content: $('.review-box').html()
});

function gotoSign(){
    location.href="/user/sign";
}

</script>
@include('common.footer') 