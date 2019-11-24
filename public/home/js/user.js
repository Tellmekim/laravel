$(function () {
    $(".sec_login").css("height", $(window).height());
    GetUser();
});

function GetUser() {
    $.ajax({
        type: "POST",
        url: "/ajax/ajaxUser.aspx",
        data: { "action": "getuser" },
        async: false,
        success: function (data) {
            if (data != "") {
                if (data.indexOf("|")) {
                    $("#username").val(data.split('|')[0]);
                    $("#password").val(data.split('|')[1]);
                    $("#reme").attr("checked", "checked");
                } else {
                    $("#username").val("");
                    $("#password").val("");
                    $("#reme").removeAttr("checked");
                }
            } else {
                $("#username").val("");
                $("#password").val("");
                $("#reme").removeAttr("checked");
            }
        }
    });
}

function CheckMobile() {
    var forusermobile = $("#forusermobile").val();
    if (forusermobile != "") {
        var isMob = /^0?(11|12|13|14|15|16|17|18|19)[0-9]{9}$/;
        if (isMob.test(forusermobile)) {
            return true;
        } else {
            alert("手机号码输入不正确");
            return false;
        }
    } else {
        alert("请输入您的手机号码");
        return false;
    }
}

//手机验证码倒计时
var mobile_count = 60;
var mobile_intervalDiv;
function mobile_trigger() {
    mobile_intervalDiv = setInterval("mobile_loadTime()", 1000);
}
function mobile_loadTime() {
    $("#ForMobileForm").html("<p>" + mobile_count + "&nbsp;S</p>");
    mobile_count--;
    if (mobile_count == 0) {
        clearInterval(mobile_intervalDiv);
        $("#ForMobileForm").html("<a href=\"javascript:void(0)\" onclick=\"GetForMobileCode()\">获取验证码</a>");
        mobile_count = 60;
    }
}

//获取手机验证码
function GetForMobileCode() {
    if (CheckMobile()) {
        var forusermobile = $("#forusermobile").val();
        if (forusermobile != "") {
            $.ajax({
                type: "POST",
                url: "/ajax/ajaxUser.aspx",
                data: { "forusermobile": forusermobile, "action": "forgetmobilecode" },
                async: false,
                success: function (data) {
                    if (data != "") {
                        if (data == "true") {
                            mobile_trigger();
                        } else {
                            alert(data);
                        }
                    }
                }
            });
        }
    }
}