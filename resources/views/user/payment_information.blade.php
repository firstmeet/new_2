@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>Company information:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox">
                    <pre>
i. Thanks for successfully completing the STEP 2 Subscription Agreement Signature Page.  Please proceed to STEP 3 by printing or downloading this Payment Information Page and visiting your bank to wire transfer funds for your subscription.
<p class="stp"></p>
ii. Wire Transfer Instructions:  
Bank Name:  DBS Bank Ltd, Singapore
Bank Address:  12 Marina Boulevard, DBS Asia Central, Marina Bay Financial Centre Tower 3, Singapore 018982
SWIFT:  DBSSSGSG
Beneficiary Name:  Elevate United Pte. Ltd
Beneficiary Account:  072-008234-6
Amount: [Amount pre-populated by system]
Reference: [Member Number prepopulated by system]           
                    </pre>
                </div>
                <div class="step-note">
                    <a class="layui-btn prev">@{{T['15575833488374']}}</a>
                    <a href="/user/list" class="layui-btn next">@{{T['15573922193994']}}</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){

});
</script>
@include('common.footer') 
