@include('common.top')
<div class="page">
    @include('common.header')
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>@{{T['15577363544344']}}:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox" v-html="T['15577341392218']">

                </div>
                <div id="myHSContainer" class="step-div step-div-4"></div>
                <!--<div class="step-note">
                    <a href="/investor_information" class="layui-btn next" onClick="if(!is_sign){lalert(Translatedata[LANG]['15577159551392']);return false;}">@{{T['15573889694471']}}</a>
                </div>-->
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>

<script type="text/javascript">
    var LANG="{{session('lang','en')}}";

        getsign()
var is_sign=false;
        function getsign() {
            //alert('签约成功');window.location.href="/user/list";return;

            HelloSign.init("4912850865d71257e073d540c5764a2f");
            HelloSign.open({
                url: "{{$url}}",
                allowCancel: true,
                //skipDomainVerification: true,
                userCulture: LANG=="en"?HelloSign.CULTURES.EN_US:HelloSign.CULTURES.ZH_CN,
                container: document.getElementById('myHSContainer'),
                messageListener: function (eventData) {
                    // console.log(eventData);
					if(eventData.event=="signature_request_signed"){
						is_sign=true;
						var data = eventData
						
						$.post('/sign', data, function (res) {
							// console.log(res);
						  	window.location.href = "/payment_information";
						})
					}else{
						lalert('error');
					}
                }
            });

        }


</script>
@include('common.footer') 
