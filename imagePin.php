<style>
  body {margin:0}
</style>
<canvas id="image">You don't have Javascript enabled! <a href="http://www.enable-javascript.com/">Click here to find out how to turn it on!</a></canvas>
<script type="text/javascript">
  window.onload = init();
  function init() {
    /*
    mapsize:
    top y: -1424
    right x: 6505
    bottom y: 2642
    left x: -5399
    */


    img = getBackground("img.png"); //pic made by mineatlast
    width = img.width;
    height = img.height;

    cv = document.getElementById('image');
    cv.width = width;
    cv.height = height;
    cv.innerHTML = "";
    ctx = cv.getContext('2d');
    ctx.width = width;
    ctx.height = height;
    ctx.drawImage(img,0,0);

    createPin(ctx,-7,178); // spawn
    loadPins(ctx);


  }

  function getBackground(url) {
    bg = new Image();
    bg.src = url;
    return bg;
  }

  function loadPins(ctx) {
    //TODO:
    //php ajax call to get the pins from a text file and convert it to json.
  }

  function createPin(ctx, mcX,mcY) {
    //TODO:
    //make pin
    mapWidth=11904;
    mapHeight=4066;
    xRatio = mapWidth/ctx.width;
    yRatio = mapHeight/ctx.height;
    cvX = ctx.width/2 + mcX/xRatio;
    cvY = ctx.height/2 + mcY/yRatio;
    console.log(cvX);
    var pinImg = new Image();
    pinImg.src = "pin.png";
    ctx.drawImage(pinImg,cvX-(pinImg.width/2),cvY-pinImg.height);
  }
</script>
<?php

?>
