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
                  <table class="layui-table content-box">
                    <tbody>
                        <tr>
                          <th>被邀请人</th>
                          <th>邀请时间</th>
                          <th>状态</th>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
    get_invite_list();
});

function get_invite_list(){
    //邀请列表
    var url = '{!! url("/invite") !!}';
    var index = layer.load(1);
    $.get(url,{},function(data){
        if (data.error) {
            layer.msg(data.message,{icon: 5});
            return;
        }
        var html = '';
        var data = data.data;
        if (data) {
            for (var x in data) {
                html+='<tr>'+
                        '<td>'+ data[x].Invitees+'</td>'+
                        '<td>'+ data[x].created_at+'</td>'+
                        '<td>'+ data[x].signs+'</td>'+
                      '</tr>';
            }
            $('table.content-box tbody').append(html);
        }
        layer.close(index);
    },'json');
}
</script>

@include('common.footer') 
</body>
</html>