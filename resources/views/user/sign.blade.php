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
            

            
            	<div id="myHSContainer">
                <iframe id="signpage" class="signpage" src=""></iframe>
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
	if(Now_step==3){
		$('.step-note .next').hide();
	}else{
		$('.step-note .next').show();
	}
	if(Now_step==1){
		$('.step-note .prev').hide();
	}else{
		$('.step-note .prev').show();
	}
	
	if(Now_step==1){
		$('#myHSContainer iframe').attr('src',"{!! url('hello?page=1') !!}");
	}else if(Now_step==2){
		$('#myHSContainer iframe').attr('src',"{!! url('hello?page=2') !!}");
	}else if(Now_step==3){
		getsign();
	}
	
}
step(1);
function getsign(){
	alert('s-3');return;
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

</script>
@include('common.footer') 
