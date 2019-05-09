@include('common.top')
<div class="page">
    @include('common.header') 
    <div class="container1">
        @include('common.left')  
        <div class="right">
            <!-- <div class="back">← back to documents</div> -->
            <div class="short-title">
                <span><em>@{{T['15435650606516']}}：</em><b>@{{T['15573810025760']}}</b></span>
            </div>
            <div class="review-box">
                <div class="layui-form">
                  <table class="layui-table content-box">
                    <tbody>
                        <tr>
                          <th>@{{T['15573881491550']}}</th>
                          <th>@{{T['15573882257364']}}</th>
                          <th>@{{T['15573882906992']}}</th>
                          <th>@{{T['15434866105325']}}</th>
                          <th width="100" class="text-center">@{{T['15434866101019']}}</th>
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
