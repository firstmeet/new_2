@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box payinfopage" step="1">
                <div class="short-title title-note">
                    <span><em>Company information:</em><b class="hide"></b></span>
                </div>
                <p class="contentBox">
<p style="text-indent:13px">Thanks for successfully completing the STEP 2 Subscription Agreement Signature Page.  Please proceed to STEP 3 by printing or downloading this Payment Information Page and visiting your bank to wire transfer funds for your subscription.</p>
<p class="stp" style="height: 1rem;"></p>

<p style="text-indent:13px">Wire Transfer Instructions:</p>
                    <div class="print">
<p style="text-indent:13px">Bank Name:  DBS Bank Ltd, Singapore</p>
<p style="text-indent:13px">Bank Address:  12 Marina Boulevard, DBS Asia Central, Marina Bay Financial Centre Tower 3, Singapore 018982</p>
<p style="text-indent:13px">SWIFT:  DBSSSGSG</p>
<p style="text-indent:13px">Beneficiary Name:  Elevate United Pte. Ltd</p>
<p style="text-indent:13px">Beneficiary Account:  072-008234-6</p>
<p style="text-indent:13px">Amount: [Amount pre-populated by system]</p>
<p style="text-indent:13px">Reference: [Member Number prepopulated by system]</p>
                </div>
                </p>
                <div class="step-note">
                    <a class="layui-btn prev" onclick="print_a()">@{{T['15575833488374']}}</a>
                    <a href="/user/list" class="layui-btn next">@{{T['15573922193994']}}</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="js/jquery.printarea.js"></script>
<script type="text/javascript">
    function print_a(){
        $(".print").printArea();
    }
</script>
@include('common.footer') 
