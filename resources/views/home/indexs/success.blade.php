@extends('home.layouts.layout')
@section('css')
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/score.css')}}" />
@endsection
@section('content')
<section class="sec_score">
	<div class="container">
		<div class="score_box text-center" style="margin-top: 70px;">
            <img src="/home/image/star1_1.png" class="star1 wow animated zoomInDown animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomInDown;">
			<img src="/home/image/star2_1.png" class="star2 wow animated zoomInDown animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: zoomInDown;">
			<img src="/home/image/star3_1.png" class="star3 wow animated zoomInDown animated" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: zoomInDown;">
			<img src="/home/image/star4_1.png" class="star4 wow animated zoomInDown animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: zoomInDown;">
			<img src="/home/image/star5_0.png" class="star5 wow animated zoomInDown animated" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: zoomInDown;">
			<p class="p1 wow animated bounceIn animated" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s; animation-name: bounceIn;">score</p>
			<p class="p2 wow animated bounceIn animated" data-wow-delay="1.4s" style="margin-bottom: 0px; visibility: visible; animation-delay: 1.4s; animation-name: bounceIn;">88</p>
            
			<p class="p3 clearfix wow animated bounceIn animated" data-wow-delay="1.6s" style="visibility: visible; animation-delay: 1.6s; animation-name: bounceIn;">
				<span class="left s1">Right :  7</span>
				<span class="right s2">Wrong :  1</span>
			</p>
            

			<a href="" class="back left wow animated flipInX animated" data-wow-delay="2s" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 2s; animation-name: flipInX;"
            ><img src="/home/image/img39.png" alt=""></a>
			<a href="" class="next wow animated flipInX animated" data-wow-delay="2s" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 2s; animation-name: flipInX;">
            <img src="/home/image/img41.png" alt=""></a>
			<a href="javascript:void(0)" class="show_qr right wow animated flipInX animated" data-wow-delay="2s" data-id="2359" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 2s; animation-name: flipInX;">
            <img src="/home/image/img40.png" alt=""></a>
		</div>
	</div>
</section>
    @endsection
    @section('js')
    <script type="text/javascript" src="/home/image/wow.js"></script>
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
