@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left',['sign'=>$sign])
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title hide">
            </div>
            <div class="no-invite-box"><span>@{{T['15574060442459']}}</span></div>

            <div class="review-box hide">
                <div class="new-sign-box">
                    <div class="review-note">@{{T['15573832517934']}}</div>
                    <div class="layui-btn-container"> 
                        <button onclick="gotoSign()" class="layui-btn layui-btn-lg layui-btn-normal gotoSign" lay-event="getCheckData">@{{T['15573886642645']}}</button> 
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
$(function(){
    manage.homeshow('/sign');//home note
});
</script>
@include('common.footer') 
