@include('common.top')
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
    manage.get_invite_list('{!! url("/invite") !!}');
});

</script>

@include('common.footer') 
