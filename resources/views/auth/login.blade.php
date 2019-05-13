@extends('layouts.app')

@section('content')
<div class="container" id="vue_det" v-cloak>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@{{ T['15438200244017'] }}</div>

                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@{{ T['15573882257364'] }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" oninvalid="setCustomValidity('{{__t("15575059913573")}}');"  autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@{{ T['15318199317935'] }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @{{ T['t_login'] }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var error="{!! session('msg') !!}"
    layui.use('layer', function(){
        var layer = layui.layer;
        if (error){
            layer.msg(error);
        }
    });
    var LANG="{!! session('lang','en') !!}";
    var L = Translatedata[LANG];
    var vm = new Vue({
        el: '#vue_det',
        data: {
            T:Translatedata[LANG],
            lang:'cn',
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
<script>
@endsection
