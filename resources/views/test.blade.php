<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="9wK4gNugxSpuYeUlDm3Tvz7roDlGvf43l54UuOC4">
<title>Elevate Holdings</title>
<!-- Scripts -->
<script src="js/app.js" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="js/layui/css/layui.css">
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="js/layui/layui.js"></script>
<script src="https://www.elevateunited.cn/translate.js?v={{$VS}}"></script>
<script type="text/javascript" src="/js/vue.min.js"></script>
<script type="text/javascript" src="/js/global.js?v=1557749735"></script>

<!-- Styles -->
<link href="css/app.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/paper.css?v=1557749735">
<style type="text/css">
[v-cloak] {
	display: none;
}
.dropdown ul li {
	line-height: 28px;
	padding-left: 13px;
}
.dropdown-menu a:hover {
	text-decoration: none;
}
.operation {
	height: auto;
	position: relative;
	top: 0;
	text-align: right;
	right: -8px;
	margin-left: 70%;
}
.dropdown-menu.pull-right {
	top: 52px;
}
.shipping-area {
	padding-top: 0;
	bottom: 0;
	width: 100%;
	text-align: center;
	line-height: 90px;
}
.footer-address address {
	text-align: center;
	margin-bottom: 0;
}
.footer-address {
	width: 100%;
}
.vue_det {
	height: 100%;
}
#app {
	height: 100%;
}
.py-4 {
	min-height: 1000px;
	height: 100%;
}

@media (max-width: 860px) {
.account1 .username {
	float: none;
}
.operation {
	margin-left: 0;
}
.dropdown-menu.pull-right {
	top: 42px;
}
}
</style>
<script type="text/javascript">
	$(function(){
    var error=""
    layui.use('layer', function(){
        var layer = layui.layer;
        if (error){
            layer.msg(error);
        }
    });
	})
</script>
</head>
<body>
<div id="vue_det" v-cloak >
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container"> <a class="navbar-brand" href="http://www.elev8united.com"> {{T['15575437879405']}} </a>
        <div class="operation ">
          <div class="dropdown">
            <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"> {{langname}}<span class="caret"></span> </button>
            <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"  url="/lang">
              <li role="presentation"> <a role="menuitem" tabindex="-1" v-on:click="setlang" val="en" onclick="manage.changeLang(this)">English</a> </li>
              <li role="presentation"> <a role="menuitem" tabindex="-1" v-on:click="setlang" val="cn" onclick="manage.changeLang(this)">简体中文</a> </li>
              <li role="presentation"> <a role="menuitem" tabindex="-1" v-on:click="setlang" val="hk" onclick="manage.changeLang(this)">繁體中文</a> </li>
            </ul>
          </div>
        </div>
        <button class="navbar-toggler hide" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>
          
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
          </ul>
        </div>
      </div>
    </nav>
    <div class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{T['15438200244017']}}</div>
              <div class="card-body">
                <form method="POST" action="/login">
                  <input type="hidden" name="_token" value="9wK4gNugxSpuYeUlDm3Tvz7roDlGvf43l54UuOC4">
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{test}}</label>
                    <div class="col-md-6">
                      <input id="email" type="text" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control " name="email" value="" required autocomplete="email" oninvalid="setCustomValidity('Please enter your email');"  autofocus>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{  T['15318199317935'] }}</label>
                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary"> {{ T['t_login'] }} </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="shipping-area">
    <div class="container">
      <div class="row">
        <div class="footer-address">
          <address>
          {{T['15575439967181']}}
          </address>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    var LANG="en";
    var L = Translatedata[LANG];
    var vm = new Vue({
        el: '#vue_det',
        data: {
            T:Translatedata[LANG],
            lang:'cn',
            test:'ttttttttttt',
            langname:''
        },
        methods:{
            setlang:function(event){
                if(typeof event.target !='undefined'){
                    var obj=$(event.target);
                }else{
                    var obj=event;
                }
                var l=obj.attr('val')
                this.lang=l;
                LANG=l;
                this.langname=obj.html();
                this.T = Translatedata[LANG];
            }
        },
        mounted:function(){
			$('title').html(Translatedata[LANG]['15575437879405']);
            this.setlang($('.dropdown-menu a[val='+LANG+']'));
            layui.use('form', function(){

              //form
              var form = layui.form;
              form.render();
              //监听提交
              form.on('submit(formDemo)', function(data){
                layer.msg(JSON.stringify(data.field));
                return false;
              });
            });
        },
    })
</script>
</body>
</html>
