@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="short-title">
                <span><em>当前位置：</em><b>签名</b></span>
            </div>
            <div class="review-box">
                <iframe id="signpage" class="signpage step-div step-div-1" src=""></iframe>
                <iframe id="signpage" class="signpage step-div step-div-2" src=""></iframe>
                <form class="layui-form invite-form  step-div step-div-3" onsubmit="return false">
                  <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                      <input type="text" name="signname" lay-verify="title" autocomplete="off" class="layui-input">
                    </div>
                  </div>

                  <div class="layui-form-item">
                      <label class="layui-form-label">购买股数</label>
                      <div class="layui-input-block">
                        <input type="text" name="shares" lay-verify="title" autocomplete="off" class="layui-input">
                      </div>
                  </div>

                </form>
                
            	<div id="myHSContainer" class="step-div step-div-4">
                </div>
                <div class="step-note">
                    <a href="#" class="layui-btn prev" onClick="step(-1)">上一步</a>
                    <a href="#" class="layui-btn next" onClick="step(1)">下一步</a>
                </div>
               
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
var Now_step=0;
function step(s){
	Now_step+=s;
	if(Now_step==4){
		$('.step-note .next').hide();
	}else{
		$('.step-note .next').show();
	}
	if(Now_step==1){
		$('.step-note .prev').hide();
	}else{
		$('.step-note .prev').show();
	}
	$('.step-div').hide();
	$('.step-div-'+Now_step).show();
	
	console.log(Now_step);
	if(Now_step==1){
		if($('iframe.step-div-1').attr('src')==''){
			$('iframe.step-div-1').attr('src',"{!! url('hello?page=1') !!}");
		}
	}else if(Now_step==2){
		if($('iframe.step-div-2').attr('src')==''){
			$('iframe.step-div-2').attr('src',"{!! url('hello?page=2') !!}");
		}
	}else if(Now_step==3){
	}else if(Now_step==4){
		postinfo();
	}
	
}
step(1);
function getsign(){
	alert('签约成功');window.location.href="/user/list";return;
	$.get('/sign/create',function(url){
		HelloSign.init("4912850865d71257e073d540c5764a2f");
		HelloSign.open({
			url: url,
			allowCancel: true,
			skipDomainVerification:true,
			userCulture: HelloSign.CULTURES.ZH_CN,
			container:document.getElementById('myHSContainer'),
			messageListener: function(eventData) {
				var data=eventData
				$.post('{!! url('/sign') !!}',data,function(res){
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
	params.number = $('form input[name=shares]').val();
	var url = '{!! url("/sign/update") !!}';
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
};

</script>
@include('common.footer') 
