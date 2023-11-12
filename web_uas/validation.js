const c = document.getElementById("tcher");
var b = document.getElementById("pencet");
var k = document.getElementById("uname");
var s = document.getElementById("pw");
localStorage.setItem('coba', "asd")
    log = document.querySelector("h1")
    log.innerHTML == localStorage.getItem('coba')
function valid() {
    let cval = c.value;
    if (cval == "B2QQR") {
        alert("voucher is valid");
    }
    else {
        alert("voucher is invalid");
    }
}

