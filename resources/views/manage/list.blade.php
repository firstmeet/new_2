@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15573810025760']}}</b></span>
            </div>
            <div class="review-box">
                <div class="layui-form">
                  <table class="layui-table content-box">
                    <tbody>
                        <tr>
                          <th>@{{T['15573897293791']}}</th>
                          <th>@{{T['15573898069420']}}</th>
                          <th>@{{T['15434866105325']}}</th>
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
    manage.get_invite_list('/invite');
});

</script>

@include('common.footer') 
