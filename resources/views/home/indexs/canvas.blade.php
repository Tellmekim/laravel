<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>大思英语学习网站登录入口</title>
    <link rel="icon" type="image/GIF" href="res/favicon.ico?v=1.0"/>

    <meta name="viewport"
        content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>
    <!--https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">

    <!-- force webkit on 360 -->
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <!-- force edge on IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    <!-- force full screen on some browser -->
    <meta name="full-screen" content="yes"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <!-- force screen orientation on some browser -->
    <!-- <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-orientation" content="portrait"> -->

    <meta name="browsermode" content="application">
    <meta name="x5-page-mode" content="app">
    <meta name="screen-orientation" content="landscape"/>

<style type="text/css">

html {
  -ms-touch-action: none;
}

body, canvas, div {
  margin: 0;
  padding: 0;
  outline: none;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  -khtml-user-select: none;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

body {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 0;
  border: 0;
  margin: 0;

  cursor: default;
  color: #888;
  background-color: #333;

  text-align: center;
  font-family: Helvetica, Verdana, Arial, sans-serif;

  display: flex;
  flex-direction: column;
}

#Cocos2dGameContainer {
  position: absolute;
  margin: 0;
  overflow: hidden;
  left: 0px;
  top: 0px;

  display: -webkit-box;
  -webkit-box-orient: horizontal;
  -webkit-box-align: center;
  -webkit-box-pack: center;
}


canvas {
  background-color: rgba(0, 0, 0, 0);
}

</style>
</head>
<!-- <div id="sound" class="sound" style=""></div> -->
<body>
<script src="/home/js/jquery.js"></script>
<script src="/home/js/mshare.js"></script>
<script src="/home/js/audio.min.js"></script>
<script type="text/javascript" src="{{loadEdition('/home/js/loading.js')}}"></script>
<div style="margin-top:25px;"></div>
<script>
var weburl="{{route('canvasData')}}";
</script>
<div id="mian" style="transform: rotate(0deg); padding: 104px 0px;">
  <canvas id="gameCanvas" width="480" height="720">
      您的浏览器不支持游戏
  </canvas>
</div>
<script cocos src="{{loadEdition('/home/js/game.js')}}"></script>
</body>

</html>
