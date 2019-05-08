<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>

</head>

<body>

</body>
<script type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script>
    HelloSign.init("4912850865d71257e073d540c5764a2f");
    HelloSign.open({
        url: "{!! $url !!}",
        allowCancel: true,
        skipDomainVerification:true,
        userCulture: HelloSign.CULTURES.ZH_CN,

        messageListener: function(eventData) {
            var data=eventData
            $.post('{!! url('/sign') !!}',data,function(res){
                console.log(res)
            })
        }
    });
</script>
</html>
