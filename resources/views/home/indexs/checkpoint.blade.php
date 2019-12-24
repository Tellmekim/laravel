@extends('home.layouts.layout')
@section('css')
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}" />
@endsection
@section('content')
<div class="container">
        <div class="cho_box clearfix" style="margin-top: 100px;">
                <div class="title_box" style="margin-bottom: 50px;">
                    <img src="{{$star_info['img']}}" class="left rollIn wow animated animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: rollIn;"><div class="left wow animated fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"><p class="p1" style="color: #c96811;">{{$star_info['star_title']}}</p><p class="p2" style="color: #ec8b2c;">{{$star_info['english']}}</p></div>
                </div>
            <div class="ul_box">
            <ul class="clearfix">
               @foreach($page['list'] as $key => $item)
                <li>
                    <a href="{{route('courseDeatail',['id'=>$item->course_id])}}">
                        <img  src="/home/image/img103.png"></a>
                    <p>{{$item->title}}&nbsp;{{$item->number}}</p>
                </li>
                @endforeach
            </ul>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <?php echo $page['pg'];  ?>
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
