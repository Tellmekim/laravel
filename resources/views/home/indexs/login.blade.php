@extends('home.layouts.layoutlogin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}">
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
@endsection
@section('content')
    <div class="main_box">
        <div class="tab_box clearfix text-center">
            <a href="https://www.bangyuanjiaoyu.com/login.aspx" class="left tab_on">登录</a>
            <a href="https://www.bangyuanjiaoyu.com/register.aspx" class="right">注册</a>
        </div>
        <form action="/login.aspx?action=login" method="post" id="registerForm">
            <div class="com_div clearfix">
                <input type="text" id="username" name="username" class="input1" placeholder="手机 / 用户名">
            </div>
            <div class="com_div clearfix">
                <input type="password" id="password" name="password" class="input1" placeholder="登录密码">
            </div>
            <div class="com_div clearfix">
                <input type="text" name="validateCode" class="input1" maxlength="5" style="width: 180px;" placeholder="图片验证码">
                <img alt="验证码" name="randImage" id="randImage" onclick="loadimage()" style="cursor:pointer;" src="={{loadEdition('/home/image/checkcode.gif')}}" border="0">
            </div>
            <div class="clear"></div>
            <button class="sub" type="submit">立即登录</button>
        </form>
    </div>
    @endsection
   