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
                <iframe id="signpage" class="signpage" src="http://www.baidu.com"></iframe>
                <div class="step-note">
                    <a href="http://www.layui.com/doc/element/button.html" class="layui-btn" target="_blank">下一步</a>
                </div>
            </div>

        </div>
    </div>
</div>
@include('common.footer') 
