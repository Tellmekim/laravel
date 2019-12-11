@extends('home.layouts.layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}">
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
@endsection
@section('content')

<div class="container">
		<div class="apply_box clearfix" style="margin-top: 107px;">
			<div class="img_box left"><img src="/home/image/img34.png" class="img-responsive"></div>
			<div class="cont left">
				<p class="p1">报名说明事项：</p>
				<p class="p2">1、家长交完学费后，请立刻联系试学老师，加入班级微信群。</p>
				<p class="p2">2、学习帐号请用孩子的真实姓名注册，确保入班级后孩子和班主任的真实互动。</p>
				<p class="p2">3、报名时间内，课程24小时开放，学习内容不受限。</p>
				<p class="p1">购买时长：</p>
				<form method="post">
                    <input id="action" type="hidden" size="30" name="action" value="shop">
                    <input id="loginId" name="loginId" type="hidden" value="2359">
                    <label class="label clearfix" for="id1">
						<input type="radio" class="left" id="year" name="year" value="3" checked="">三学年（36个月）原价14250元 限时优惠价8046元
					</label>
                    <label class="label clearfix" for="id2">
						<input type="radio" class="left" id="year" name="year" value="2" checked="">两学年（24个月）原价9500元 限时优惠价5960元
					</label>
					<label class="label clearfix" for="id3">
						<input type="radio" class="left" id="year" name="year" value="1" checked="">一学年（12个月）原价4750元 限时优惠价2980元
					</label>
					<label class="label clearfix" for="id4">
						<input type="radio" class="left" id="year" name="year" value="0.5">一学期（6个月 ）原价2380元 限时优惠价1980元
					</label>
					<button class="sub" type="submit">立即购买</button>
				</form>
			</div>
		</div>
	</div>
    @endsection
    @section('footer-js')
    <script>
    function loadimage(){
        $("#randImage").attr('src',"{{route('getCaptcha')}}?t={{rand(10000,15615156)}}");
    }
    $('#registerForm').submit(function(){
        username= $("#username").val();
        if(!username){
          alert('请填写用户名')
          return false;
        }
        password= $("#password").val();
        if(!password){
            alert('请填写用户密码')
            return false;
        }
        randImage= $("#validateCode").val();
        if(!randImage){
            alert('请填写验证码')
            return false;
        }
        let data={
           userName: username,
           password:password,
           randImage:randImage,
        }
        $.post($('#registerForm').attr('action'),data,function(data){
            if(data.code=='1'){
                history.go(-1);
              }else{
                  alert(data.msg);
              }
        },'json')
        return false;
    })
    </script>
    @endsection
   