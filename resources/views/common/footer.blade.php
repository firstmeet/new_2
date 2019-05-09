<div class="shipping-area">
    <div class="container">
        <div class="row">
            <div class="footer-address"> 
               <address>
               @{{T['15424380363827']}}
               </address>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
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
            manage.homeshow();//home note
        },
    })
</script>
</body>
</html>