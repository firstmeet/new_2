<div class="nav">
    <div class="nav-top">
        <div id="mini" style="border-bottom:1px solid rgba(255,255,255,.1)"><img src="/images/mini.png" ></div>
    </div>
    <ul>
        @if(auth()->user())
        <li class="nav-item act">
            <a href="/user/index"><i class="my-icon nav-icon icon_2"></i><span>@{{T['15318092344422']}}</span><i class="my-icon nav-more"></i></a>
        </li>
        <li class="nav-item">
            <a href="/user/list"><i class="my-icon nav-icon icon_3"></i><span>@{{T['15573810025760']}}</span><i class="my-icon nav-more"></i></a>
        </li>
        @if(auth()->user()->signmaster)
        <li class="nav-item">
            <a href="{!! url('/invite_list') !!}"><i class="my-icon nav-icon icon_3"></i><span>@{{T['15434808149179']}}</span><i class="my-icon nav-more"></i></a>
        </li>
        <li class="nav-item">
            <a href="/toinvite"><i class="my-icon nav-icon icon_2"></i><span>@{{T['15423543047283']}}</span><i class="my-icon nav-more"></i></a>
        </li>
        @endif
        @endif

    </ul>
</div>