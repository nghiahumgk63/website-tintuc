
var nav = document.getElementById("navb")
var height = nav.offsetTop;
document.onscroll = function () {
    var heightPage = window.pageYOffset;
    if (heightPage > height)
        nav.classList.add("fix")
    else
        nav.classList.remove("fix")

}


document.addEventListener("DOMContentLoaded", function () {
    var scale = (($(window).width() / 1366.0) + ($(window).height() / 768.0)) / 2;
    $('body').css({
        '-webkit-transform': 'translate(-50%,-50%) scale(' + scale + ')',
        '-moz-transform': 'translate(-50%,-50%) scale(' + scale + ')',
        '-ms-transform': 'translate(-50%, -50%) scale(' + scale + ')',
        '-o-transform': 'translate(-50%, -50%) scale(' + scale + ')',
        'transform': 'translate(-50%, -50%) scale(' + scale + ')'
    })

    //console.log(scale);
    //console.log($('body').css('transform'));
})
