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
                <div class="contentBox">
                    <pre>
Thanks for successfully completing the STEP 1 Investor Information Page.  Please proceed to STEP 2 by reviewing and signing the Subscription Agreement below. 
<p class="stp"></p>                         
i. “Before you decide to invest, you may, if you desire, make inquiries about the Company and its business or any other matters relating to the Company and your possible investment in the Company, by meeting with the Company’s management and/or obtaining documents and any other information which you believe necessary to make an investment decision.  In connection with such inquiry, any documents that you wish to review, will be made available for inspection and copying or provided, upon request, subject to your agreement to maintain such information in confidence.  You should address any inquiries or requests for additional information or documents in writing to Offering@Elev8united.com.
<p class="stp"></p>
ii. “If you would like to purchase one or more Notes in this offering, you will need to complete these three steps:
1. Input your personal information below, including the number of Notes you would like to subscribe to purchase, and click CONTINUE.
2. Sign your Subscription Agreement by clicking the SIGN button on the next page.
3. Pay the amount of your subscription per the bank wire transfer instructions that will be provided to you.
<p class="stp"></p>
iii. STEP 1:  
1. YES, my name is <input class="underline-input" placeholder="input your name"/> and I would like to purchase <input class="underline-input" placeholder="input number"/> Notes.
2. My Elevate Member Number is <b>100098</b> and my email address is <b>458551154@qq.com</b>.
3. I have uploaded my Passport/ID Card <span class="layui-btn layui-btn-xs layui-btn-primary" lay-event="detail">Upload</span>                    
                    </pre>
                </div>
                <div class="step-note">
                    <a href="/company_information" class="layui-btn prev">@{{T['15573890488167']}}</a>
                    <a href="/payment_information" class="layui-btn next" onClick="">@{{T['15573889694471']}}</a>
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

});
</script>
@include('common.footer') 
