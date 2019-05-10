<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Elevate United</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js',true) }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('js/layui/css/layui.css',true) }}">
    <script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/layui/layui.js',true) }}"></script>
    <script type="text/javascript" src="https://www.elevateunited.cn/translate.js?v={{time() }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.8/vue.min.js"></script>
    <script type="text/javascript" src="/js/global.js?v={{time() }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css',true) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/paper.css',true) }}?v={{time() }}">
    <style type="text/css">
        [v-cloak]{ display: none; }
        .dropdown ul li {
            line-height: 28px;
            padding-left: 13px;
        }
        .dropdown-menu a:hover {
            text-decoration: none;
        }

        @media (max-width: 860px) {
        .account1 .username {
            float:none;
        }
        .operation {
            height: auto;
            line-height: 20px;
            text-align: right;
            color: #333;
            float: right;
            position: relative;
            top: 0;
            right: -8px;
        }
    </style>
</head>
<body>
<div id="vue_det" v-cloak >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/',true) }}">
                    @{{ T['15432003825681'] }}
                </a>
                <div class="operation">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
                            @{{langname}}<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1"  url="{!! url('/lang',true) !!}">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

