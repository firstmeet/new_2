<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="js/global.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>


    <div id="myPDF" style="height: 95%; width: 95%; margin: auto;"></div>

    </body>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.media.js"></script>
    <script type="text/javascript" src="js/touchpdf/pdf.js"></script>
{{--    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
    <script type="text/javascript" src="js/touchpdf/jquery.touchSwipe.js"></script>
    <script type="text/javascript" src="js/touchpdf/jquery.touchPDF.js"></script>
    <script type="text/javascript" src="js/touchpdf/jquery.panzoom.js"></script>
    <script type="text/javascript" src="js/touchpdf/jquery.mousewheel.js"></script>

    <script>
        $(function() {
            $("#myPDF").pdf( {
                title:'title',
                source: "1.pdf",
                // disableKeys:true,
                showToolbar:false,
                // loaded:1
                // disableZoom:true,
                // disableLinks:true
            } );
        });
     // var vue=new Vue({
     //     el:"#app",
     //     data:{
     //         urls:"/hello"
     //     },
     //     methods:{
     //         next_page:function(page_num) {
     //             this.urls="/hello"+"?page="+page_num
     //         }
     //     }
     // })
        {{--function next_page(page_num) {--}}
        {{--    document.getElementsByTagName("iframe").src="{!! url('hello',['page'=>2]) !!}"--}}
        {{--}--}}
    </script>
</html>
