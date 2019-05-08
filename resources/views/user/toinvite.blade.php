@include('common.top')
</head>
<body>
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="back hide">← back to documents</div>
            <div class="short-title">
                <span><em>当前位置：</em><b>邀请会员</b></span>
            </div>
            <div class="review-box">
                <form class="layui-form invite-form" action="">
                  <div class="layui-form-item">
                    <label class="layui-form-label">email</label>
                    <div class="layui-input-block">
                      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                    </div>
                  </div>
                  <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                  </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('common.footer') 

<script type="text/javascript">

</script>
</body>
</html>