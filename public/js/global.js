var manage = {};
manage.logout = function(dom){
    var logoutRrl = $(dom).attr('logoutRrl');
    var loginUrl = $(dom).attr('loginUrl');
    $.post(url,null,function(){
        location.href=loginUrl;
    });
}