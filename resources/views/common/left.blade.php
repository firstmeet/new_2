<div class="nav hide">
    <div class="nav-top">
        <div id="mini" style="border-bottom:1px solid rgba(255,255,255,.1);"><img src="/images/mini.png" ></div>
    </div>
    <ul>
        @if(auth()->user())
        <li class="nav-item act">
            <a href="/user/index"><i class="my-icon nav-icon icon_2"></i><span>@{{T[15318092344422]}}</span><i class="my-icon nav-more"></i></a>
        </li>
        <li class="nav-item">
            <a href="/user/list"><i class="my-icon nav-icon icon_3"></i><span>@{{T[15573810025760]}}</span><i class="my-icon nav-more"></i></a>
        </li>
        @if(auth()->user()->is_signmaster&&session('sign_status'))
        <li class="nav-item">
            <a href="/invite_list"><i class="my-icon nav-icon icon_3"></i><span>@{{T[15434808149179]}}</span><i class="my-icon nav-more"></i></a>
        </li>
        <li class="nav-item hide">
            <a href="/toinvite"><i class="my-icon nav-icon icon_2"></i><span>@{{T[15423543047283]}}</span><i class="my-icon nav-more"></i></a>
        </li>
        @endif
        @endif
    </ul>
		<div class="picture lg-hide">
             <div class="logout" logoutRrl="/logout" loginUrl="{!! url('/login') !!}" onclick="manage.logout(this)">
                 <a>@{{T[15435651632647]}}</a>
             </div>
         </div>
                    <div class="operation lg-hide">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                            @{{langname}}<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"  url="/lang">
                              <li role="presentation">
                                  <a role="menuitem" tabindex="-1" v-on:click="setlang" val="en" onclick="manage.changeLang(this)">English</a>
                              </li>
                              <li role="presentation">
                                  <a role="menuitem" tabindex="-1" v-on:click="setlang" val="cn" onclick="manage.changeLang(this)">简体中文</a>
                              </li>

                              <li role="presentation">
                                  <a role="menuitem" tabindex="-1" v-on:click="setlang" val="hk" onclick="manage.changeLang(this)">繁體中文</a>
                              </li>
                        </ul>
                    </div>
                </div>
                
</div>
<script>
if($(window).width()<800){
	$('.nav').addClass('nav-mini');
}
</script>
