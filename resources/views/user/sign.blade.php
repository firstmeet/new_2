@include('common.top')
<div class="page">
    @include('common.header')
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>Subscription Agreement Signature:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox">
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">STEP 2: &nbsp;Subscription Agreement Signature:</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">Thank you for successfully completing STEP 1. &nbsp;Please proceed to STEP 2 </span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">by clicking the GET STARTED button, and following the instructions to sign electronically. </span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">&nbsp;</span>
                    </p>
                    <p>
                        <span style=";font-family:Calibri;font-size:16px">After signing, click the CONTINUE button and then the I AGREE button to confirm your signature.</span>
                    </p>
                    <p>
                        <br/>
                    </p>
                </div>
                <div id="myHSContainer" class="step-div step-div-4"></div>
                <div class="step-note">
                    <a href="/investor_information" class="layui-btn next" onClick="manage.gostep(this)">@{{T['15573889694471']}}</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>

<script type="text/javascript">
    var LANG="{{session('lang','en')}}";

        getsign()

        function getsign() {
            //alert('签约成功');window.location.href="/user/list";return;

            HelloSign.init("4912850865d71257e073d540c5764a2f");
            HelloSign.open({
                url: "{{$url}}",
                allowCancel: true,
                // skipDomainVerification: true,
                userCulture: LANG=='en'?HelloSign.CULTURES.EN_US:HelloSign.CULTURES.ZH_CN,
                container: document.getElementById('myHSContainer'),
                messageListener: function (eventData) {
                    console.log(eventData);
                    var data = eventData
                    $.post('/sign', data, function (res) {
                        console.log(res);
                        window.location.href = "/payment_information";
                    })
                }
            });

        }


</script>
@include('common.footer') 
