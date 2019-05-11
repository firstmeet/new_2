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
i. Elevate Holdings, Inc. (“Company”) is pleased to offer you the opportunity to participate as an investor in our company.
<p class="stp"></p>
ii. Company proposes to issue Convertible Promissory Notes (“Notes”) to limited number of invitees with a total offering of up to US$400,000, and up to 5,000,000 shares of Company upon conversion.  Company reserves the right to increase or decrease the total offering amount and total shares offered.
<p class="stp"></p>
iii. Each Note will be issued upon in a principal amount equal to US$1,400 (or approximately RMB 9,888 or TWD 45,500), with 6.0% annual interest.  
<p class="stp"></p>
iiii. Purchases by an invitee are limited to a maximum of five (5) notes, and a maximum of US$7,000 in principal amount (or approximately RMB49,400 or TWD 227,500).
<p class="stp"></p>
v. Each Note and accrued interest will convert into Company’s Class B shares at US$0.08 per share upon a Qualified Financing of US$8,000,000; or an IPO (Initial Public Offering).
<p class="stp"></p>
vi. The Notes will be repaid by Company in 36 months unless sooner converted to shares.
<p class="stp"></p>
vii. Please review the information in the Subscription Booklet o learn more about the terms of this offering.                    
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
