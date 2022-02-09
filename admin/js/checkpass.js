var check = function () {
    var a = document.querySelector('#newpass');
    var b = document.querySelector('#confirmpass');
    var c = document.querySelector("#message");
    var d = document.querySelector(".btn-save");
    if (a.value == "" && b.value == "") {
        c.innerHTML = "";
    }
    else {
        if (a.value == b.value) {
            c.innerHTML = "OK";
            c.style.color = 'green';
            d.disabled = false;
        }
        else {
            c.innerHTML = "Mật khẩu không khớp!!!";
            c.style.color = 'red';
            d.disabled = true;
        }
    }
}