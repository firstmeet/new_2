@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>Terms of service:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox">
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">“As a prospective investor in our company, Elevate Holding Inc. is pleased to have this opportunity to share confidential information with you.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">To get started, please review the confidentiality agreement below, and acknowledge your acceptance and agreement by clicking the SIGN button below.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Once you sign the confidentiality agreement, we will provide you with confidential information regarding the company and this offering.”</span>
                    </p>
                    <p>
                        <br/>
                    </p>
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
