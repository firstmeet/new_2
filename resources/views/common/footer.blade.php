<div class="shipping-area">
    <div class="container">
<a v-on:click="setlang('en')">en</a>
<a v-on:click="setlang('hk')">hk</a>
        <div class="row">
            <div class="footer-address"> 
               <address>
               @{{T[LANG]['15424380363827']}}
               </address>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var LANG="{!! session('lang','en') !!}";
    var vm = new Vue({
        el: '#vue_det',
        data: {
            T:Translatedata,
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
                console.log(obj.html());
                var l=obj.attr('val')
                this.lang=l;
                LANG=l;
                this.langname=obj.html();
            }
        },
        mounted:function(){
            this.setlang($('.dropdown-menu a[val='+LANG+']'));
          console.log(this.T.cn['15318092344422'])
        },
    })
</script>
</body>
</html>