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
                <div class="contentBox">
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">STEP 3: Payment by Bank Wire Transfer:</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Thank you for successfully completing the STEP 2. &nbsp;Please proceed to STEP 3 by printing or downloading this Payment Information Page and visiting your bank to wire transfer funds for your subscription.</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Wire Transfer Instructions: &nbsp;</span>
                    </p>
                    <div class="print">
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Bank Name: &nbsp;DBS Bank Ltd, Singapore</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Bank Address: &nbsp;12 Marina Boulevard, DBS Asia Central, Marina Bay Financial Centre Tower 3, Singapore 018982</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">SWIFT: &nbsp;DBSSSGSG</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Beneficiary Name: &nbsp;Elevate United Pte. Ltd</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Beneficiary Account: &nbsp;072-008234-6</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;color:rgb(255,0,0);font-size:16px">Amount: {{$money}} USD</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;color:rgb(255,0,0);font-size:16px">
                        Reference: {{$member_id}}</span></span>
                    </p>
                    <p>
                        <br/>
                    </p>
                    </div>
                </div>
                <div class="step-note">
                    <a class="layui-btn prev" onclick="print_a()">@{{T['15575833488374']}}</a>
                    <a href="/download_word" class="layui-btn next">@{{T['15573922193994']}}</a>
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