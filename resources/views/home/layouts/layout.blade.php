
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
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/index2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/reset.css')}}">
    <script type="text/javascript" src="{{loadEdition('/home/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{loadEdition('/home/js/common.js')}}"></script>
    @yield('css')
</head>
<body style="backgroud:url({{$sysconfig['background']}})">
    <input type="hidden" id="SiteDomain">
    <div class="zz"></div>
<div class="study_box">
</div>
<!--<div class="qrcode_box">
	<img src="{{loadEdition('/home/image/img33.png')}}" class="close_qrcode">
    <div class="qrcode_box2">
        <img src="{{loadEdition('/home/image/signin_0.jpg')}}" alt="">
        <p>请用微信扫一扫上面的二维码，分享页面到<br>朋友圈或者分享给朋友即可打卡签到成功</p>
    </div>
</div>-->
<!--<div class="zl_box clearfix">
	<p class="p1 text-center">个人资料</p>
	<p class="p2 text-center">Personal information</p>
	<div class="tx_box left"><div><img src="{{loadEdition('/home/image/img30.png')}}" class="img-responsive"></div></div>
	<form class="right">
		<div class="com_div clearfix">
			<div class="left"><span class="left s1">姓名：</span><input type="text" name="" class="input1"></div>
			<div class="left sex_box">
				<span class="left s1">性别：</span>
				<select class="left sel1">
					<option>男</option>
					<option>女</option>
				</select>
			</div>
			<div class="right">
				<span class="left s1">生日：</span>
				<div id="date" class="left">
					<select name="year" id="year" class="select2 left">
						<option value="">选择年份</option>
					<option value="2019">2019年</option><option value="2018">2018年</option><option value="2017">2017年</option><option value="2016">2016年</option><option value="2015">2015年</option><option value="2014">2014年</option><option value="2013">2013年</option><option value="2012">2012年</option><option value="2011">2011年</option><option value="2010">2010年</option><option value="2009">2009年</option><option value="2008">2008年</option><option value="2007">2007年</option><option value="2006">2006年</option><option value="2005">2005年</option><option value="2004">2004年</option><option value="2003">2003年</option><option value="2002">2002年</option><option value="2001">2001年</option><option value="2000">2000年</option><option value="1999">1999年</option><option value="1998">1998年</option><option value="1997">1997年</option><option value="1996">1996年</option><option value="1995">1995年</option><option value="1994">1994年</option><option value="1993">1993年</option><option value="1992">1992年</option><option value="1991">1991年</option><option value="1990">1990年</option><option value="1989">1989年</option><option value="1988">1988年</option><option value="1987">1987年</option><option value="1986">1986年</option><option value="1985">1985年</option><option value="1984">1984年</option><option value="1983">1983年</option><option value="1982">1982年</option><option value="1981">1981年</option><option value="1980">1980年</option><option value="1979">1979年</option><option value="1978">1978年</option><option value="1977">1977年</option><option value="1976">1976年</option><option value="1975">1975年</option><option value="1974">1974年</option><option value="1973">1973年</option><option value="1972">1972年</option><option value="1971">1971年</option><option value="1970">1970年</option><option value="1969">1969年</option><option value="1968">1968年</option><option value="1967">1967年</option><option value="1966">1966年</option><option value="1965">1965年</option><option value="1964">1964年</option><option value="1963">1963年</option><option value="1962">1962年</option><option value="1961">1961年</option><option value="1960">1960年</option><option value="1959">1959年</option><option value="1958">1958年</option><option value="1957">1957年</option><option value="1956">1956年</option><option value="1955">1955年</option><option value="1954">1954年</option><option value="1953">1953年</option><option value="1952">1952年</option><option value="1951">1951年</option><option value="1950">1950年</option><option value="1949">1949年</option><option value="1948">1948年</option><option value="1947">1947年</option><option value="1946">1946年</option><option value="1945">1945年</option><option value="1944">1944年</option><option value="1943">1943年</option><option value="1942">1942年</option><option value="1941">1941年</option><option value="1940">1940年</option><option value="1939">1939年</option><option value="1938">1938年</option><option value="1937">1937年</option><option value="1936">1936年</option><option value="1935">1935年</option><option value="1934">1934年</option><option value="1933">1933年</option><option value="1932">1932年</option><option value="1931">1931年</option><option value="1930">1930年</option><option value="1929">1929年</option><option value="1928">1928年</option><option value="1927">1927年</option><option value="1926">1926年</option><option value="1925">1925年</option><option value="1924">1924年</option><option value="1923">1923年</option><option value="1922">1922年</option><option value="1921">1921年</option><option value="1920">1920年</option><option value="1919">1919年</option><option value="1918">1918年</option><option value="1917">1917年</option><option value="1916">1916年</option><option value="1915">1915年</option><option value="1914">1914年</option><option value="1913">1913年</option><option value="1912">1912年</option><option value="1911">1911年</option><option value="1910">1910年</option><option value="1909">1909年</option><option value="1908">1908年</option><option value="1907">1907年</option><option value="1906">1906年</option><option value="1905">1905年</option><option value="1904">1904年</option><option value="1903">1903年</option><option value="1902">1902年</option><option value="1901">1901年</option><option value="1900">1900年</option></select>
					<select name="month" id="month" class="select2 left">
						<option value="">选择月份</option>
					</select>
					<select id="days" class="day select2 left" style="margin-right: 0;">
						<option value="">选择日期</option>
					</select>
				</div>
			</div>
		</div>
		<div class="com_div clearfix">
			<div class="left"><div class="left"><span class="left s1">地区：</span><input type="text" name="" class="input2"></div></div>
			<div class="right"><div class="left"><span class="left s1">学校：</span><input type="text" name="" class="input2"></div></div>
		</div>
		<div class="com_div clearfix">
			<div class="left"><span class="left s1">爱好：</span><input type="text" name="" class="input3"></div>
		</div>
		<button type="button" class="sub left">确认发布</button>
	</form>
	<img src="{{loadEdition('/home/image/img50.png')}}" class="close_zl">
</div>-->
<script type="text/javascript" src="{{loadEdition('/home/js/select.js')}}"></script>
<script type="text/javascript">
    $(function(){
	$("#date").selectDate();
})
</script>
<div class="container ">
    <header class="clearfix">
        <a href="https://www.bangyuanjiaoyu.com/">
            <img src="{{$sysconfig['logo']}}" class="logo fadeInDownBig wow animated animated" data-wow-delay="1s" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 1s; animation-name: fadeInDownBig;"></a>
        <ul class="text-left">
            <li class="left">
                <a href="https://www.bangyuanjiaoyu.com/" class="header_on">首页</a>
            </li>
            <li class="left">
                <a href="https://www.bangyuanjiaoyu.com/rank.aspx">排名</a>
            </li>
            <li class="left">
                <a href="https://www.bangyuanjiaoyu.com/login.aspx">闯关</a>
            </li>
            <li class="right"  style="display:none;">
                <a href="https://www.bangyuanjiaoyu.com/register.aspx">注册</a>
            </li>
            <li class="right"  style="display:none;">
                <a href="https://www.bangyuanjiaoyu.com/login.aspx">登录</a>
            </li>
            <li class="right user">
                <div class="user_menu">
                    <div class="user_tx">
                        <img src="/home/image/img30.png"></div>
                    <a href="logout" class="left quit">退出 <br>
                        登录</a>
                    <p style="margin-top:12px;">亲爱的&nbsp;<i>{{$userinfo['userName']}}</i>&nbsp;同学<br>
                    您的截止学习时间为：{{$userinfo['updated_at']}}</p>
                    <div class="clear"></div>
                    <div class="ship">
                        <a href="javascript:void(0)" class="a1 study_btn" data-id="253870" data-name="17688863703">学习</a>
                        <a href="javascript:void(0)" class="a2">锟斤拷锟斤拷</a>
                        <a href="javascript:void(0)" class="a3 qrcode_btn" data-id="253870">锟斤拷</a>
                    </div>
                </div>
            </li>
            <li class="right" >
                <a href="https://www.bangyuanjiaoyu.com/enroll.aspx">我要报名</a>
            </li>
           
        </ul>

    </header>
    <div id="qiandao"></div>
</div>
<div class="clear"></div>
@yield('content')
<div class="clear"></div>
@yield('js')
 <p style="margin:20px; position:inherit;"class="copyright">{{$sysconfig['copyright']}}</p>
<script type="text/javascript" src="{{loadEdition('/home/js/wow.min.js')}}"></script>
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
    <script type="text/javascript" src="{{loadEdition('/Home/js/jquery.fullPage.min.js')}}"></script>
    <script type="text/javascript" src="{{loadEdition('/Home/js/android.js')}}"></script>
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