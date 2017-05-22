<canvas id="image">You don't have Javascript enabled! <a href="http://www.enable-javascript.com/">Click here to find out how to turn it on!</a></canvas>
<div class="addPlace">
  <label for="name" >Name</label><input onkeyup="changePin(this)" type="text" name='name'>
  <label for="x">X</label><input onkeyup="changePin(this)" type="number" name='x'>
  <label for="y">Y</label><input onkeyup="changePin(this)" type="number" name='y'>
</div>
<script type="text/javascript">
  bgImg = "";
  ctx = "";
  pins = [];
  pins.push(['',100,1000],['spawn',-7,178]);
  window.onload = init();
  function init() {
    /*
    mapsize:
    top y: -1424
    right x: 6505
    bottom y: 2642
    left x: -5399
    */
    bgImg = getBackground("img.png"); //pic made by mineatlast
    bgImg
    width = bgImg.width;
    height = bgImg.height;
    cv = document.getElementById('image');
    cv.width = width;
    cv.height = height;
    cv.innerHTML = "";
    ctx = cv.getContext('2d');
    ctx.width = width;
    ctx.height = height;

    reloadCanvas();


  }

  function reloadCanvas() {
    ctx.clearRect(0,0,ctx.width,ctx.height);
    ctx.drawImage(bgImg,0,0);
    loadPins(ctx);

  }

  function getBackground(url) {
    bg = new Image();
    bg.src = url;
    return bg;
  }

  function loadPins(ctx) {
    for (var i = 0; i < pins.length; i++) {
      createPin(pins[i][1],pins[i][2]);
    }
    //TODO:
    //php ajax call to get the pins from a text file and convert it to json.
  }

  function createPin(mcX,mcY) {
    //TODO:
    //make pin
    mapWidth=11904;
    mapHeight=4066;
    xRatio = mapWidth/ctx.width;
    yRatio = mapHeight/ctx.height;
    cvX = ctx.width/2 + mcX/xRatio;
    cvY = ctx.height/2 + mcY/yRatio;
    var pinImg = new Image();
    pinImg.src = "pin.png";
    ctx.drawImage(pinImg,cvX-(pinImg.width/2),cvY-pinImg.height);
  }

  function  changePin(el) {
    inputs = el.parentElement.querySelectorAll('input');
    pins[0][0] = inputs[0].value;
    pins[0][1] = inputs[1].value;
    pins[0][2] = inputs[2].value;
    reloadCanvas();
    console.log(inputs[1].value);
  }
</script>
<?php

?>
