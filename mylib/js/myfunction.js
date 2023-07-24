function isMobile() {
    if (Math.min(window.screen.width, window.screen.height) < 500 || navigator.userAgent.indexOf("Mobi") > -1) {
        return true;
    }
    return false;
}

function setScreenResolution() {
    let width = $(window).width();
    let height = $(window).height();

    $.ajax({
        url: "example.php",
        data: {
            screenwidth: width, screenheight: height
        }
    }).done(function () {
        console.log('width : ' + width + " height : " + height);
    });
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function numberOnly(el) {
    $(el).keypress(function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
    });
}

function getDate(input) {
    $(input).datepicker({
        format: 'dd-M-yyyy',
        autoclose: true,
        clearBtn: true
    });
}