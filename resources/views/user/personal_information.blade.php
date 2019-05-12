@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title title-note">
                <span><em>Personal Information:</em></span>
            </div>
            <div class="review-box">
                <form action="/sign/update" method="post" id="myform" enctype="multipart/form-data">
                <div class="contentBox pinfo-ul">
                <ul>
                    <li>My Elevate Member Number is <b>{{$member_id}}</b></li>
                    <li>My email address is <b>{{$email}}</b></li>
                    <li>My full legal name is <input class="underline-input" name="name" placeholder="input your name"/></li>
                    <li>I would like to purchase <input class="underline-input" name="number" type="number" min="1" max="5" style="width: 100px" placeholder="number"/> Notes.</li>
                    <li>I have uploaded my Passport/ID Card  <input class="hide inputFile" type="file" name="picture" />
    <span class="layui-btn layui-btn-sm layui-btn-normal" lay-event="detail" onclick="$('.inputFile').click()">Upload</span></li>
                </ul>
                <div class="qtnote">Please click the Next step button below to proceed.</div>

                </div>
                    <input type="hidden" name="_method" value="put">
                <div class="step-note">
                    <a href="/investor_information" class="layui-btn prev">@{{T['15573890488167']}}</a>
                    <a onclick="document.getElementById('myform').submit();return false;" class="layui-btn next" >@{{T['15573889694471']}}</a>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('common.footer') 

<script type="text/javascript">
$(function(){
    var error="{{session('error')}}"
    if(error){
        layer.msg(error)
    }
    $("input[type=file]").change(function(e){layer.msg("Upload Success")})
});

layui.use('form', function(){
  var form = layui.form;
  form.render();
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});

</script>
