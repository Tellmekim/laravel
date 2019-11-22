@extends('home.layouts.layout')
@section('css')
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}" />
@endsection
@section('content')
<div class="container">
        <div class="cho_box clearfix" style="margin-top: 47.5px;">
            <div class="title_box clearfix">
                <img src="/home/image/img8.png" class="left rollIn wow animated animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: rollIn;"><div class="left wow animated fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"><p class="p1" style="color: #c96811;">金星初体验</p><p class="p2" style="color: #ffaf3b;">Initial experience of Venus</p></div>
            </div>
            <div class="ul_box">
                <ul class="clearfix">
                    
                            <li>
                                <a href=""><img  src="/home/image/img103.png"></a>
                                <p>动物&nbsp;013</p>
                            </li>
                        
                            <li>
                                <a href="javascript:void(0)"><img src="/home/image/img104.png" class="star"><i>014</i></a>
                                <p>动物&nbsp;014</p>
                            </li>
                        
                            <li>
                                <a href="javascript:void(0)"><img src="/home/image/img104.png" class="star"><i>015</i></a>
                                <p>动物&nbsp;015</p>
                            </li>
                        
                            <li>
                                <a href=""><img src="/home/image/img103.png"></a>
                                <p>动物&nbsp;001</p>
                            </li>
                        
                            <li>
                                <a href=""><img src="/home/image/img103.png"></a>
                                <p>动物&nbsp;002</p>
                            </li>
                        
                            <li>
                                <a href=""><img src="/home/image/img103.png"></a>
                                <p>动物&nbsp;003</p>
                            </li>
                        
                            <li>
                                <a href=""><img src="/home/image/img103.png"></a>
                                <p>动物&nbsp;004</p>
                            </li>
                        
                            <li>
                                <a href=""><img src="/home/image/img103.png"></a>
                                <p>动物&nbsp;005</p>
                            </li>
                        
                </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div id="pagers" class="page">
                <a href="">首页</a>
                <a href="">上一页</a>
                <a href="" class="page_active">1</a>
                <a href="">2</a>
                <a href="">下一页</a>
                <a href="">尾页</a>
                <b>1&nbsp;/&nbsp;2&nbsp;页</b>
                <p class="page_sel">跳到第&nbsp;<select id="gotopage" onchange="gotopage()">
                <option value="1" selected="selected">1</option><option value="2">2</option>
                </select>&nbsp;页</p>
                <script type="text/javascript">
                    function gotopage() {var topage=$("#gotopage").val();
                      window.location.href='/checkpoint2.aspx?id=113d5af2bed9431a8e23d8d448eec82d&typeid=6&page='+ topage;
                   }
                </script>
            </div>
        </div>
    </div>
    @endsection
    @section('footer-js')
    <script type="text/javascript" src="/wow.js"></script>
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


<script type="text/javascript">
    $(function () {
        var height = parseInt($("body").height());
        var h = parseInt($(".cho_box").height());
        var mar = ((height - h) / 2) - 100;
        $(".cho_box").css("margin-top", mar);
    });
</script>
    @endsection
