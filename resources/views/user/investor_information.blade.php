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
    <span style=";font-family:Calibri;font-size:16px">If you would like to purchase one or more Notes in this offering, you will need to complete these three steps:</span>
</p>
<p style="margin-left:48px">
    <span style="font-family:Calibri;font-size:16px">1.&nbsp;</span><span style=";font-family:Calibri;font-size:16px">Input your personal information below, including the number of Notes you would like to subscribe to purchase, and click CONTINUE.</span>
</p>
<p style="margin-left:48px">
    <span style="font-family:Calibri;font-size:16px">2.&nbsp;</span><span style=";font-family:Calibri;font-size:16px">Sign your Subscription Agreement by clicking the SIGN button on the next page.</span>
</p>
<p style="margin-left:48px">
    <span style="font-family:Calibri;font-size:16px">3.&nbsp;</span><span style=";font-family:Calibri;font-size:16px">Pay the amount of your subscription per the bank wire transfer instructions that will be provided to you.</span>
</p>
<p>
    <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
</p>
<p>
    <span style=";font-family:Calibri;font-size:16px">STEP 1: &nbsp;</span>
</p>
<p style="margin-left:48px">
    <span style="font-family:Symbol;font-size:16px">·&nbsp;</span><span style=";font-family:Calibri;font-size:16px">YES, my name is <input class="underline-input" name="name" placeholder="input your name"/> and I would like to purchase <input class="underline-input" name="number" type="number" min="1" max="5" style="width: 100px" placeholder="number"/> Notes.</span>
</p>
<p style="margin-left:48px">
    <span style="font-family:Symbol;font-size:16px">·&nbsp;</span><span style=";font-family:Calibri;font-size:16px">My Elevate Member Number is <b>{{$member_id}}</b> and my email address is <b>{{$email}}</b>.</span>
</p>
<p>
    <span style=";font-family:Calibri;font-size:16px">I have uploaded my Passport/ID Card&nbsp;</span>
    <input class="hide inputFile" type="file" name="picture" />
    <span style="line-height: 34px;" class="layui-btn layui-btn-normal" lay-event="detail" onclick="$('.inputFile').click()">Upload</span>
</p>
<p>
    <br/>
</p>
                </div>
                    <input type="hidden" name="_method" value="put">
                <iframe id="signpage" class="signpage step-div step-div-0" src="/hello?page=2" ></iframe>
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
