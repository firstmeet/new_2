<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script type="text/javascript" src="/js/global.js?v={{time()}}"></script>

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/paper.css?v={{time()}}">
    <style type="text/css">
        [v-cloak]{ display: none; }
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
        .shipping-area{
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
        .vue_det{height: 100%;}
        #app{
            height: 100%;
        }
        .py-4 {
        min-height: 1000px;
        height: 100%;
        }


        @media (max-width: 860px) {
        .account1 .username {
            float:none;
        }
        .operation {
            margin-left:0;
        }
        .dropdown-menu.pull-right {
            top: 42px;
        }
        }
    </style>
    <script type="text/javascript">
	$(function(){
    var error="{!! session('msg') !!}"
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
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @{{T[15575437879405]}}
                </a>
                <div class="operation ">
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
                <button class="navbar-toggler hide" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('common.footer') 

