@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <!-- <div class="back hide">← back to documents</div> -->
            <div class="short-title title-note">
                <span><em>@{{T[15577303752084]}}</em></span>
            </div>
            <div class="contentBox" v-html="T['15578995571522']">

            </div>
            <div class="new-sign-parent hide">
                <div class="new-sign-box">
                    <div class="review-note">@{{T[15573832517934]}}</div>
                    <div class="layui-btn-container"> 
                        <button onclick="gotoSign()" class="layui-btn layui-btn-lg layui-btn-normal gotoSign" lay-event="getCheckData">@{{T[15573886642645]}}</button> 
                    </div>
                </div>
            </div>

            <div class="review-box">

                <div class="layui-form">
                  <table class="layui-table content-box">
                    <tbody>
                        <tr>
                          <th>@{{T[15573881491550]}}</th>
                          <!-- <th>@{{T[15573882257364]}}</th> -->
                          <th>@{{T[15573882906992]}}</th>
                          <th>@{{T[15434866105325]}}</th>
                          <th width="100" class="text-center">@{{T[15434866101019]}}</th>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-right hide"><a href="/download_word" lay-event="detail" class="layui-btn layui-btn-sm">@{{T[15573922193994]}}</a></div>
            </div>

        </div>
    </div>
</div>

<script>
    function gotoSign(){
        location.href="/user/sign";
    }

    if("{!! session('no_files') !!}"){
        layer.msg("{!! session('no_files') !!}")
    }
    if ("{{session('error')}}"){
        layer.msg("{{session('error')}}")
    }
$(function(){
    manage.get_sign_list("/sign");
    // manage.homeshow('/sign');//home note
});
</script>

@include('common.footer') 
