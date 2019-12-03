@extends('home.layouts.layoutlogin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}">
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
@endsection
@section('content')
    <div class="main_box">
        <div class="tab_box clearfix text-center">
            <a href="{{route('userLogin')}}" class="left tab_on">登录</a>
            <a href="{{route('register')}}" class="right">注册</a>
        </div>
        <form action="{{route('postLogin')}}" method="post" id="registerForm">
      
            <div class="com_div clearfix">
                <input type="text" id="username" name="username" class="input1" placeholder="手机 / 用户名">
            </div>
            <div class="com_div clearfix">
                <input type="password" id="password" name="password" class="input1" placeholder="登录密码">
            </div>
            <div class="com_div clearfix">
                <input type="text" name="validateCode" id="validateCode" class="input1" maxlength="5" style="width: 180px;" placeholder="图片验证码">
                <img alt="验证码" name="randImage" id="randImage" onclick="loadimage()" style="cursor:pointer;" src="{{route('getCaptcha')}}" border="0">
            </div>
            <div class="clear"></div>
            <button class="sub" type="submit">立即登录</button> 
        </form>
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
                histroy.go(-1);
              }else{
                  alert(data.msg);
              }
        },'json')
        return false;
    })
    </script>
    @endsection
   