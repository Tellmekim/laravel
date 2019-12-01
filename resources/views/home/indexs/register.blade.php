@extends('home.layouts.layoutlogin')
@section('css')
<link rel="stylesheet" type="text/css" href="{{loadEdition('/home/css/login.css')}}">
<script type="text/javascript" src="{{loadEdition('/home/js/user.js')}}"></script>
@endsection
@section('content')
        <div class="main_box">
            <div class="tab_box clearfix text-center">
                <a href="{{route('userLogin')}}" class="left">登录</a>
                <a href="{{route('register')}}" class="right tab_on">注册</a>
            </div>
            <form id="register" action="{{route('postRegister')}}" method="post" name="uploadForm">
                <div class="com_div2 clearfix">
                    <input type="text" name="username" id="username" class="input1" placeholder="请输入注册名">
                </div>
                <div class="com_div2 clearfix">
                    <input type="text" name="mobile" id="mobile" class="input1" placeholder="请输入手机号码">
                </div>
                <div class="com_div2 clearfix">
                    <div class="get_code right" id="ForMobileForm"><a href="javascript:void(0)" onclick="GetRegMobileCode()">点击获取验证码</a></div>
                    <input type="text" name="mescode" id="mescode" class="input1" style="width: 170px;" placeholder="请输入验证码">
                </div>
                <div class="com_div2 clearfix">
                    <input type="password" name="pass" id="pass" class="input1" placeholder="请设置6~16位字符密码">
                </div>
                <div class="com_div2 clearfix">
                    <input type="password" name="repass" id="repass" class="input1" placeholder="请再次确认密码">
                </div>
                <label class="rem clearfix no_user left" for="rem">
                    <input type="checkbox" value="true" name="rem" id="rem" class="left">已阅读并同意<a href="javascript:void(0)" onclick="ShowDiv(&#39;xieyi&#39;, &#39;700&#39;, &#39;480&#39;);">《平台用户注册协议》</a></label>
                <button class="sub" type="button" onclick="SubmitForm()">立即注册</button>
            </form>
        </div>
    @endsection
    @section('js')
    <script>
    function loadimage(){
        $("#randImage").attr('src',"{{route('getCaptcha')}}?t={{rand(10000,15615156)}}");
    }
    function GetRegMobileCode() {
        
    }
    function SubmitForm() {
        username= $("#username").val();
        if(!username){
          alert('请填写用户名')
          return false;
        }
        mescode= $("#mescode").val();
        if(!mescode){
            alert('请填写验证码')
            return false;
        }
        mobile=$("#mobile").val();
        if(!mobile){
            alert('同学请填写手机号')
            return false;
        }
        pass=$("#pass").val();
        if(!pass||pass==''){
            alert('同学请填写密码')
            return false;
        }
        repass=$("#repass").val();
        if(repass!=pass){
            alert('两个密码不相同')
            return false;
        }

        if(!$("#rem:checked").val()){
            alert('请查看平台用户注册协议，并同意');
            return false;
        }
        let data={
            userName: username,
            pass:pass,
            mescode:mescode,
            mobile:mobile,
        }
       // console.log(data)
        $.post($('#register').attr('action'),data,function(data){
              if(data.code=='1'){
                histroy.go(-1);
              }else{
                  alert(data.msg);
              }
        },'json')
    }
    </script>
    @endsection
   