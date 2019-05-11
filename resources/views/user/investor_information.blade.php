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
                    <pre>
Thanks for successfully completing the STEP 1 Investor Information Page.  Please proceed to STEP 2 by reviewing and signing the Subscription Agreement below.    
<p class="stp"></p>                      
 “Before you decide to invest, you may, if you desire, make inquiries about the Company and its business or any other matters relating to the Company and your possible investment in the Company, by meeting with the Company’s management and/or obtaining documents and any other information which you believe necessary to make an investment decision.  In connection with such inquiry, any documents that you wish to review, will be made available for inspection and copying or provided, upon request, subject to your agreement to maintain such information in confidence.  You should address any inquiries or requests for additional information or documents in writing to Offering@Elev8united.com.
 <p class="stp"></p>
“If you would like to purchase one or more Notes in this offering, you will need to complete these three steps:
Input your personal information below, including the number of Notes you would like to subscribe to purchase, and click CONTINUE.
<p class="stp"></p>
 Sign your Subscription Agreement by clicking the SIGN button on the next page.
 Pay the amount of your subscription per the bank wire transfer instructions that will be provided to you.
 <p class="stp"></p>
 STEP 1:
 YES, my name is <input class="underline-input" name="name" placeholder="input your name"/> and I would like to purchase <input class="underline-input" name="number" type="number" min="1" max="5" placeholder="input number"/> Notes.
 My Elevate Member Number is <b>{{$member_id}}</b> and my email address is <b>{{$email}}</b>.
I have uploaded my Passport/ID Card <span class="layui-btn layui-btn-xs layui-btn-primary" lay-event="detail"><input
                                type="file" name="picture">Upload</span>
                    </pre>
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

});
</script>
@include('common.footer') 
