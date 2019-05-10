@include('common.top')
<div class="page">

    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15573884466817']}}</b></span>
            </div>
            <div class="review-box">
            	<embed id="signpage" class="signpage step-div step-div-0" src=""  />
            	<embed id="signpage" class="signpage step-div step-div-2" src=""  />
            	<embed id="signpage" class="signpage step-div step-div-3" src=""  />
                <!--<iframe id="signpage" class="signpage step-div step-div-0" src="" onload="layer.close(typeof load0 == 'undefined' ? null : load0);"></iframe>
                <iframe id="signpage" class="signpage step-div step-div-1" src="" onload="layer.close(typeof load1 == 'undefined' ? null : load1);"></iframe>
                <iframe id="signpage" class="signpage step-div step-div-2" src="" onload="layer.close(typeof load2 == 'undefined' ? null : load2);"></iframe>-->
                <form class="layui-form invite-form  step-div step-div-3" onsubmit="return false">
                  <div class="layui-form-item">
                    <label class="layui-form-label">@{{T['15324194276032']}}</label>
                    <div class="layui-input-block">
                      <input type="text" name="signname" lay-verify="title" autocomplete="off" class="layui-input">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">@{{T['15573864972429']}}</label>
                    <div class="layui-input-block">
                      <select name="shares" lay-verify="required">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>

                </form>
                
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
var Now_step=-1;
function step(s){
	Now_step+=s;
	if(Now_step==4){
        if(!postinfo()){
            Now_step--;
            return;
        }
		$('.step-note .next').hide();
	}else{
		$('.step-note .next').show();
	}
	if(Now_step==0){
		$('.step-note .prev').hide();
	}else{
		$('.step-note .prev').show();
	}
	$('.step-div').hide();
	$('.step-div-'+Now_step).show();
	
	console.log(Now_step);
	if(Now_step==0){
		if($('embed.step-div-0').attr('src')==''){
            //load0 = layer.load(1);
			$('embed.step-div-0').attr('src',"/hello?page=1");
		}
	}else if(Now_step==1){
        if($('embed.step-div-1').attr('src')==''){
           // load1 = layer.load(1);
            $('embed.step-div-1').attr('src',"/hello?page=2");
        }
    }else if(Now_step==2){
		if($('embed.step-div-2').attr('src')==''){
            //load2 = layer.load(1);
			$('embed.step-div-2').attr('src',"/hello?page=3");
		}
	}else if(Now_step==3){
	}else if(Now_step==4){
		
	}
	
}
step(1);
function getsign(){
    var index1 = layer.load(1);
	//alert('签约成功');window.location.href="/user/list";return;
	$.get('/sign/create',function(url){
		HelloSign.init("4912850865d71257e073d540c5764a2f");
        layer.close(index1);
		HelloSign.open({
			url: url,
			allowCancel: true,
			// skipDomainVerification:true,
            userCulture: LANG=='en'?HelloSign.CULTURES.EN_US:HelloSign.CULTURES.ZH_CN,
			container:document.getElementById('myHSContainer'),
			messageListener: function(eventData) {
				var data=eventData
				$.post('/sign',data,function(res){
					console.log(res);
					window.location.href="/user/list";
				})
			}
		});
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
