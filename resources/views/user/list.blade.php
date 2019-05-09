@include('common.top')
</head>
<body>
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <!-- <div class="back">← back to documents</div> -->
            <div class="short-title">
                <span><em>当前位置：</em><b>签约列表</b></span>
            </div>
            <div class="review-box">
                <div class="layui-form">
                  <table class="layui-table content-box">
                    <tbody>
                        <tr>
                          <th>标题</th>
                          <th>用户名称</th>
                          <th>创建时间</th>
                          <th>状态</th>
                          <th width="100" class="text-center">操作</th>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
$(function(){
    manage.get_sign_list('{!! url("/sign") !!}');
});
</script>

@include('common.footer') 
</body>
</html>