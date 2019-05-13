@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')
        <div class="right">
            <div class="back hide">← back to documents</div>

            <div class="review-box" step="1">
                <div class="short-title title-note">
                    <span><em>@{{T['15577217008565']}}</em><b class="hide"></b></span>
                </div>
                <div class="contentBox" v-html="T['15577318649661']">

                </div>
                <iframe id="signpage" class="signpage step-div step-div-0" src="/hello?page=3" style="width: 100%" ></iframe>
                <div class="step-note">
                    <a href="/investor_information" class="layui-btn next" onClick="manage.gostep(this)">@{{T['15573889694471']}}</a>
                </div>
            </div>



        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){

});
</script>
@include('common.footer') 
