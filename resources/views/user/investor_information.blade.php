@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>Investor information:</em><b class="hide"></b></span>
                </div>
                <form action="/sign/update" method="post" id="myform" enctype="multipart/form-data">
                <div class="contentBox">
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Before you decide to invest, you may, if you desire, make inquiries about the Company and its business or any other matters relating to the Company and your possible investment in the Company, by meeting with the Company’s management and/or obtaining documents and any other information which you believe necessary to make an investment decision. &nbsp;In connection with such inquiry, any documents that you wish to review, will be made available for inspection and copying or provided, upon request, subject to your agreement to maintain such information in confidence. &nbsp;You should address any inquiries or requests for additional information or documents in writing to Offering@Elev8united.com.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">If you would like to purchase one or more Notes in this offering, you will need to complete the following three steps:</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">STEP 1. Provide your personal information, including your full legal name, the number of Notes you would like to subscribe to purchase, and an upload copy of your Passport/ID Card.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">STEP 2. Sign your Subscription Agreement electronically.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">STEP 3. Pay the subscription amount by bank wire transfer.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Please click the Next step button below to proceed.</span>
                    </p>
                </div>
                    <input type="hidden" name="_method" value="put">
{{--                <iframe id="signpage" class="signpage step-div step-div-0" src="/hello?page=2" ></iframe>--}}
                <div class="step-note">
                    <a href="/company_information" class="layui-btn prev">@{{T['15573890488167']}}</a>
                    <a href="#" onclick="document.getElementById('myform').submit();return false;" class="layui-btn next" >@{{T['15573889694471']}}</a>
                </div>
                </form>
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
