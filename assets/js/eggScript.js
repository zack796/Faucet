// Created by Xaz from the TurtleCoin Discord for Mufalo
// @Zack796 on Github

var window, document, imageArr;
window = document.getElementById("page");
imageArr = [
	"assets/eggpics/1.png",
	"assets/eggpics/2.png",
	"assets/eggpics/3.png",
	"assets/eggpics/4.png",
	"assets/eggpics/5.png",
	"assets/eggpics/6.png",
]

function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

function swolePapi() {
var randomHeight, randomWidth, test;
height = window.innerHeight;
width = window.innerWidth;

randomHeight = getRandomInt(height);
randomWidth = getRandomInt(width);

var image = document.getElementById("papi")

image.style.top = randomWidth + "px";
image.style.left = randomHeight + "px";
image.src = imageArr[getRandomInt(6)]
}


window.onload = () => {
  swolePapi();
  setInterval(swolePapi, 3000);
}
