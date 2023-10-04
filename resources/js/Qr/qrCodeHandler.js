var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 550,
    height : 550
});
/*---------------Blank Code Handler--------------*/
function makeCode () {
    var elText = document.getElementById("text");
    if (!elText.value) {
        alert("Input a text");
        elText.value = CodeGenerator();
        return;
    }
    qrcode.makeCode(elText.value);
}
makeCode();
$("#text").
    on("blur", function () {
        makeCode();
    }).
    on("keydown", function (e) {
        if (e.keyCode == 13) {
            makeCode();
        }
    });
/*------------------------------------------------*/
