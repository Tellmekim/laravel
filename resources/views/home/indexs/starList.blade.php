@extends('home.layouts.layout')
@section('css')
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}" />
@endsection
@section('content')
<div class="container">
        <div class="sec4" style="margin-top: 100px;">
            <div class="title_box" style="margin-bottom: 50px;">
                <img src="{{$star_info['img']}}" class="left rollIn wow animated animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: rollIn;"><div class="left wow animated fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"><p class="p1" style="color: #c96811;">{{$star_info['star_title']}}</p><p class="p2" style="color: #ec8b2c;">{{$star_info['english']}}</p></div>
            </div>
            <div class="box">
                @foreach($son_list as $k => $item)
                <div class="img_box wow animated fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <img src="{{$item['img']}}" class="img-responsive com_img">
                <a href="{{route('courseLise',['id'=>$item['id']])}}">
                    <p class="text-center">{{$item['star_title']}}</p>
                    <img src="/home/image/img11.png">
                </a>
                </div>
                @endforeach
                </div>
            <div class="clear"></div>
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
