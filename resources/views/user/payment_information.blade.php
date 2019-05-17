@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box payinfopage" step="1">
                <div class="short-title title-note">
                    <span><em>@{{T[15577299351337]}}:</em><b class="hide"></b></span>
                </div>
                <div class="contentBox" v-html="T['15577322888841']">

                </div>
                <div class="step-note">
                    <a class="layui-btn prev" onclick="print_a()">@{{T[15575833488374]}}</a>
                    <a href="/download_word" class="layui-btn next">@{{T[15573922193994]}}</a>
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

$(function(){
    var money = "{{$money}}";
    console.log(money)
    var member_id = "{{$member_id}}";
    $("#money").text(money);
    $("#member_id").text(member_id);
    setTimeout("window.location.href = '/user/list'",20000);

});
</script>
@include('common.footer') 
