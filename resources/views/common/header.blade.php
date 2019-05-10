
 <div class="header">
     <div class="title1">
         <span>@{{T['15432003825681']}}</span>
     </div>
     <div class="title2 hide">
         <span>Partner Portal</span>
     </div>
     <div class="account">
          <div class="account1">
              <div class="username">
                  <span>
                    @if(auth()->user())
                    {!!auth()->user()->username!!}
                    @endif
                    </span>
              </div>
              <div class="operation">
                  <div class="dropdown">
                      <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                          @{{langname}}<span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"  url="{!! url('/lang') !!}">
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
         <div class="picture">
             <div class="logout" logoutRrl="{!! url('/logout') !!}" loginUrl="{!! url('/login') !!}" onclick="manage.logout(this)">
                 <a>@{{T['15435651632647']}}</a>
             </div>
         </div>
     </div>
 </div>