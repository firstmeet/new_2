<div class="nav">
    <div class="nav-top">
        <div id="mini" style="border-bottom:1px solid rgba(255,255,255,.1)"><img src="/images/mini.png" ></div>
    </div>
    <ul>
        <li class="nav-item act">
            <a href="/user/home"><i class="my-icon nav-icon icon_3"></i><span>HOME</span><i class="my-icon nav-more"></i></a>
        </li>
        <li class="nav-item">
            <a href="/user/list"><i class="my-icon nav-icon icon_1"></i><span>签约列表</span><i class="my-icon nav-more"></i></a>
        </li>
        @if(auth()->user())
        @if(auth()->user()->signmaster)
             <li class="nav-item">
            <a href="{!! url('/invite_page') !!}"><i class="my-icon nav-icon icon_1"></i><span>邀请列表</span><i class="my-icon nav-more"></i></a>
        </li>
        @endif
        @endif
        <li class="nav-item">
            <a href="/user/toinvite"><i class="my-icon nav-icon icon_1"></i><span>邀请</span><i class="my-icon nav-more"></i></a>
        </li>
        <li class="nav-item hide">
            <a href="javascript:;"><i class="my-icon nav-icon icon_2"></i><span>文章管理</span><i class="my-icon nav-more"></i></a>
            <ul>
                <li><a href="javascript:;"><span>站内新闻</span></a></li>
                <li><a href="javascript:;"><span>站内公告</span></a></li>
                <li><a href="javascript:;"><span>登录日志</span></a></li>
            </ul>
        </li>
        <li class="nav-item hide">
            <a href="javascript:;"><i class="my-icon nav-icon icon_3"></i><span>订单管理</span><i class="my-icon nav-more"></i></a>
            <ul>
                <li><a href="javascript:;"><span>订单列表</span></a></li>
                <li><a href="javascript:;"><span>打个酱油</span></a></li>
                <li><a href="javascript:;"><span>也打酱油</span></a></li>
            </ul>
        </li>
    </ul>
</div>