@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>@{{T['15577352126471']}}:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox" v-html="T['15577316849167']">
                    
                </div>
                <iframe id="signpage" class="signpage step-div step-div-0" src="/hello?page=1" ></iframe>
                <div class="step-note">
                    <a class="layui-btn next" href="/sign_pdf">@{{T['15573886642645']}}</a>
                </div>
            </div>

            <div class="review-box noshow"  step="2">
                <div class="short-title title-note">
                    <span><em>Sign:</em><b class="hide"></b></span>
                </div>

                <iframe id="signpage" class="signpage step-div step-div-0" src="http://www.qq.com" ></iframe>
                <div class="step-note">
                    <a class="layui-btn prev" onClick="manage.gostep(this)">@{{T['15573890488167']}}</a>
                    <a href="/company_information" class="layui-btn next">@{{T['15573889694471']}}</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
function gotoSign(){
    location.href="/user/sign?step=1";
}
$(function(){

});
</script>
@include('common.footer') 
