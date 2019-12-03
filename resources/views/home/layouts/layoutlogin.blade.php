
<!DOCTYPE html>
<!-- saved from url=(0031)https://www.bangyuanjiaoyu.com/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no,minimum-scale=0.5,maximum-scale=2.0">
    <meta name="format-detection" content="telephone=no">
    <title>{{$sysconfig['webname']}}</title>
    <meta name="keywords" content="{{$sysconfig['keywords']}}">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/jquery.fullPage.css')}}">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/index2.css')}}">
    <script type="text/javascript" src="{{loadEdition('/home/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{loadEdition('/home/js/common.js')}}"></script>
    @yield('css')
</head>
<body style="backgroud:url({{$sysconfig['backgroundlogin']}})">
<div class="logo_head">
        <a href="/">
            <img src="{{$sysconfig['logo']}}" class="fadeInDownBig wow animated animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInDownBig;"></a>
    </div>
@yield('content')
 <p class="copyright">{{$sysconfig['copyright']}}</p>
<script type="text/javascript" src="{{loadEdition('/home/js/wow.min.js')}}"></script>
@yield('js')
<script type="text/javascript">
$(function(){
	$('.sec1').css('height',$(window).height());
})
var wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    mobile: true
});
wow.init();
$('.after_log').hover(function() {
	$(document.body).css({
	   "margin-right":"17px",
	   "overflow-y":"hidden"
	 });
}, function() {
	$(document.body).css({
	   "margin-right":"0",
	   "overflow-y":"auto"
	 });
});
</script>
  @yield('js')
    <script type="text/javascript" src="{{loadEdition('/Home/js/jquery.fullPage.min.js')}}"></script>
    <script type="text/javascript" src="{{loadEdition('/Home/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{loadEdition('/Home/js/android.js')}}"></script>
    @yield('js')
    <script type="text/javascript">
    $(function () {
        var height = parseInt($("body").height());
        var h = parseInt($(".default_main").height());
        var mar = ((height - h) / 2) - 100;
        $(".default_main").css("margin-top", mar);
    });
         $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    @yield('footer-js')
</body>

</html>