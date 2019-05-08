@include('common.top')
</head>
<body>
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="short-title">
                <span><em>当前位置：</em><b>邀请列表</b></span>
            </div>
            <div class="review-box">
                <div class="layui-form">
                  <table class="layui-table">
                    <tbody>
                        <tr>
                          <th>标题</th>
                          <th>创建时间</th>
                          <th>状态</th>
                          <th width="100" class="text-center">操作</th>
                        </tr> 
                      <tr>
                        <td>贤心</td>
                        <td>1989-10-14</td>
                        <td>待签名</td>
                        <td>
                            <div class="layui-table-cell laytable-cell-1-0-11"> 
                                <a class="layui-btn layui-btn-xs" lay-event="edit">签名</a>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>张爱玲</td>
                        <td>1920-09-30</td>
                        <td>已签名</td>
                        <td>
                            <div class="layui-table-cell laytable-cell-1-0-11"> 
                                <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
// layer.load(1);
</script>

@include('common.footer') 
</body>
</html>