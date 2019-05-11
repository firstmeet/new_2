@include('common.top')
<div class="page">

    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15573884466817']}}</b></span>
            	<div id="myHSContainer" class="step-div step-div-4"></div>
                <div class="step-note">
                    <a href="#" class="layui-btn prev" onClick="step(-1)">@{{T['15573890488167']}}</a>
                    <a href="#" class="layui-btn next" onClick="step(1)">@{{T['15573889694471']}}</a>
                </div>
               
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>
<script>
getsign()
var LANG="{{session('lang','en')}}";

function getsign(){
	//alert('签约成功');window.location.href="/user/list";return;

		HelloSign.init("4912850865d71257e073d540c5764a2f");
		HelloSign.open({
			url: "{{$url}}",
			allowCancel: true,
			skipDomainVerification:true,
            userCulture: LANG=='en'?HelloSign.CULTURES.EN_US:HelloSign.CULTURES.ZH_CN,
			container:document.getElementById('myHSContainer'),
			messageListener: function(eventData) {
			    console.log(eventData);
				var data=eventData
				$.post('/sign',data,function(res){
					console.log(res);
					window.location.href="/company_information";
				})
			}
		});
}

//提交邀请
function postinfo(){	
	var params = {};
	params.name = $('form input[name=signname]').val();
	params.number = $('form select[name=shares]').val();
	var url = "/sign/update";
    if (!params.name || !params.number) {
        layer.msg(L['15574688507932']);
        return false;
    }
	$.ajax({
		url: url,
		type: 'PUT',
		dataType: 'json',
		data: params,
		success: function(res) {
			if (res.error == 0) {
				//layer.msg(res.message);
			}else{
				//layer.msg(res.message,{icon: 5});
			}
			getsign();
		}
	});
    return true;
};

</script>
@include('common.footer') 
