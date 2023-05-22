var currWidth = $(window).width();
console.log(currWidth);

var startPos = -100;
var endPos = (currWidth / 2) + (startPos / 2);
console.log(endPos);

$('#flyin').animate({bottom: endPos}, 1000);