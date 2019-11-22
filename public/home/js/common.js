$(function () {
    var height = $(window).height();
    $('.zz').css('height', height);

    $('.study_btn').click(function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        GetLearningList(id, name);
    });
    $('.close_study').click(function () {
        $('.study_box').hide();
        $('.zz').hide();
    })

    $('.qrcode_btn').click(function () {
        var id = $(this).data("id");
        CheckSignin(id);
    })

    $('.sec_score .show_qr').click(function () {
        var id = $(this).data("id");
        CheckSignin(id);
    })

    $('.qrcode_box .close_qrcode').click(function () {
        $('.qrcode_box').hide();
        $('.zz').hide();
    })

    $('.after_log .user_tx').click(function () {
        $('.zl_box').show();
        $('.zz').show();
    })
    $('.close_zl').click(function () {
        $('.zl_box').hide();
        $('.zz').hide();
    })

    $("header li .user_menu").hover(function () {
        $("header li .user_menu .ship").stop().fadeIn();
    }, function () {
        $("header li .user_menu .ship").stop().fadeOut();
    });
});

function CloseStudy() {
    $('.study_box').hide();
    $('.zz').hide();
}

function GetLearningList(sid, sname) {
    if (sid != "" && sname != "") {
        $.ajax({
            type: "POST",
            url: "/ajax/ajaxUser.aspx",
            data: { "userid": sid, "usernmae": sname, "action": "getlearning" },
            async: false,
            success: function (data) {
                if (data != "") {
                    $(".study_box").html("");
                    $(".study_box").html(data);
                    $('.study_box').show();
                    $('.zz').show();
                }
            }
        });
    }
}


function CheckSignin(id) {
    if (id != "") {
        $.ajax({
            type: "POST",
            url: "/ajax/ajaxUser.aspx",
            data: { "userid": id, "action": "checksign" },
            async: false,
            success: function (data) {
                if (data == "true") {
                    $('.qrcode_box').show();
                    $('.zz').show();
                } else {
                    alert(data);
                }
            }
        });
    }
}