function drawClock() {
    drawFace(ctx, radius);
    drawNumbers(ctx, radius);
    drawTime(ctx, radius);
}
function drawClock2() {
    drawFace(ctx2, radius2);
    drawNumbers(ctx2, radius2);
    drawTime(ctx2, radius2);
}

function drawFace(ctx, radius) {
    var grad;

    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, 2 * Math.PI);
    ctx.fillStyle = 'white';
    ctx.fill();

    grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
    grad.addColorStop(0, '#333');
    grad.addColorStop(0.5, 'white');
    grad.addColorStop(1, '#333');
    ctx.strokeStyle = grad;
    ctx.lineWidth = radius * 0.1;
    ctx.stroke();

    ctx.beginPath();
    ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
    ctx.fillStyle = '#400';
    ctx.fill();
}

function drawNumbers(ctx, radius) {
    var ang;
    var num;
    ctx.font = radius * 0.15 + "px arial";
    ctx.textBaseline = "middle";
    ctx.textAlign = "center";
    for (num = 1; num < 13; num++) {
        ang = num * Math.PI / 6;
        ctx.rotate(ang);
        ctx.translate(0, -radius * 0.85);
        ctx.rotate(-ang);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(ang);
        ctx.translate(0, radius * 0.85);
        ctx.rotate(-ang);
    }
}

function drawTime(ctx, radius) {
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    var minutes = pad(minute);
    var seconds = pad(second);

    //hour
    hour = hour % 12;
    var hour2 = hour.toString() + ":" + minutes + ":" + seconds;
    
    hour = (hour * Math.PI / 6) + (minute * Math.PI / (6 * 60)) + (second * Math.PI / (360 * 60));
    drawHand(ctx, hour, radius * 0.5, radius * 0.07, hour2);
    //minute
    minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
    drawHand(ctx, minute, radius * 0.8, radius * 0.07, hour2);
    // second
    second = (second * Math.PI / 30);
    drawHand(ctx, second, radius * 0.9, radius * 0.02, hour2);

}

function pad(d) { return (d < 10) ? "0" + d.toString() : d.toString(); }
function test(d) { return (d == 0) ? "12" : d.toString(); }

function drawHand(ctx, pos, length, width, time) {
    // var hourStr = hour.toString();

    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0, 0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.strokeStyle = "#800";
    ctx.stroke();
    ctx.rotate(-pos);
    ctx.fillText(time, 10, -80);
}

function printTime() {

    var canvas4 = document.getElementById("dClock");
    var Ctx4 = canvas4.getContext("2d");

    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    var minutes = pad(minute);
    var seconds = pad(second);

    hour = hour % 12;

    var hour2 = hour.toString() + ":" + minutes + ":" + seconds;
    
    console.log(test(hour) )

    Ctx4.clearRect(0, 0, canvas4.width, canvas4.height);

    Ctx4.font = "bold 36px arial";
    Ctx4.fillStyle = "#f00";
    Ctx4.textAlign = "center";
    Ctx4.fillText(hour2, canvas4.width / 2, canvas4.height - 15 );
}
