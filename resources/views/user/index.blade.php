@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back">← back to documents</div>
            <div class="short-title hide">

            </div>
            <div class="review-box hide">
                <div class="new-sign-box">
                    <div class="review-note">@{{T['15573832517934']}}</div>
                    <div class="layui-btn-container"> 
                        <button onclick="gotoSign()" class="layui-btn layui-btn-lg layui-btn-normal gotoSign" lay-event="getCheckData">去签名</button> 
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
function gotoSign(){
    location.href="/user/sign";
}

</script>
@include('common.footer') 