@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>@{{T['15577350024988']}}:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox" v-html="T['15577319805110']">

                </div>
                    <input type="hidden" name="_method" value="put">
{{--                <iframe id="signpage" class="signpage step-div step-div-0" src="/hello?page=2" ></iframe>--}}
                <div class="step-note">
                   <!-- <a href="/company_information" class="layui-btn prev">@{{T['15573890488167']}}</a>-->
                    <a href="/personal_information" class="layui-btn next" >@{{T['15573889694471']}}</a>
                </div>
            </div>



        </div>
    </div>
</div>
<script type="text/javascript">
    var error="{{session('error')}}"
    if(error){
        layer.msg(error)
    }
function gotoSign(){
    location.href="/user/sign";
}
$(function(){
    $("input[type=file]").change(function(e){layer.msg("Upload Success")})
});
</script>
@include('common.footer') 
