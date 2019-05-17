@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title title-note">
                <span><em>@{{T[15435651739321]}}:</em></span>
            </div>
            <div class="review-box">
            <iframe style="display:none" name="_hide_frame" ></iframe>
                <form action="/sign/update" method="post" id="myform" enctype="multipart/form-data">
                <div class="contentBox pinfo-ul">
                <ul>
                    <li>@{{T[15577330585542]}} {{$member_id}}</li>
                    <li>@{{T[15577331066633]}} {{$email}}</li>
                    <li>@{{T[15577331317896]}} <input class="underline-input" name="name" value="{{old('name')}}" placeholder="{{__t('15577332547932')}}"/></li>
                    <li>@{{T[15577331565116]}} 
                    <select name="number">
                    <option value="1" @if(old("number")==1) selected @endif>1</option>
                    <option value="2"  @if(old("number")==2) selected @endif>2</option>
                    <option value="3"  @if(old("number")==3) selected @endif>3</option>
                    <option value="4"  @if(old("number")==4) selected @endif>4</option>
                    <option value="5"  @if(old("number")==5) selected @endif>5</option>
                    </select>
                    <!--<input class="underline-input" name="number" type="number" min="1" max="5" style="width: 100px" placeholder="number"/>--> @{{T[15577333604848]}}
                    <pre>@{{T[15578170737323]}}</pre>
                    </li>
                    <li>@{{T[15577331834423]}}  <input class="hide inputFile" type="file" name="picture" />
    <span class="layui-btn layui-btn-sm" lay-event="detail" onclick="$('.inputFile').click()">@{{T[15577333286350]}}</span></li>
                </ul>
                <div class="qtnote">@{{T[15577332098746]}}</div>

                </div>
                    <input type="hidden" name="_method" value="put">
                <div class="step-note">
                    <a href="/investor_information" class="layui-btn prev">@{{T[15573890488167]}}</a>
                    <a onclick="document.getElementById('myform').submit();return false;" class="layui-btn next" >@{{T[15573889694471]}}</a>
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
    $("input[type=file]").change(function(e){layer.msg("{{__t("15577366808785")}}")})
});

layui.use('form', function(){
  var form = layui.form;
  form.render();
  //监听提交
  /*
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
  */
});

</script>
