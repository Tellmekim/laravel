
function getPgjs() {
    var from = false;
    var agent = navigator.userAgent.toLowerCase();
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if (typeof (u[1]) == "string") {
        u = u[1].split("&");
        if (u.indexOf("from=wap") >= 0) {
            from = true;
        }
    }
    if (!from) {
        var SiteDomain = $("#SiteDomain").val();
        var res = agent.match(/android/);
        if (res == "android")
            window.location.href = SiteDomain + "/m/";
        res = agent.match(/iphone/);
        if (res == "iphone")
            window.location.href = SiteDomain + "/m/";
       

    }

}
getPgjs();
