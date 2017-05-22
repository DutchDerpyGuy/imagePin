<canvas id="image">You don't have Javascript enabled! <a href="http://www.enable-javascript.com/">Click here to find out how to turn it on!</a></canvas>
<div id="addPlace">
  <label for="name" >Name</label><input onkeyup="reloadCanvas()" id='pinName' type="text" name='name'>
  <label for="x">X</label><input onkeyup="reloadCanvas()" id='pinX' type="number" name='x'>
  <label for="y">Y</label><input onkeyup="reloadCanvas()" id='pinY' type="number" name='y'>
</div>
<script type="text/javascript">
  bgImg = "";
  ctx = "";
  pins = [];

  window.onload = init();
  function init() {
    bgImg = getBackground("img.png"); //pic made by mineatlast
    width = bgImg.width;
    height = bgImg.height;
    cv = document.getElementById('image');
    cv.width = width;
    cv.height = height;
    cv.innerHTML = "";
    ctx = cv.getContext('2d');
    ctx.width = width;
    ctx.height = height;

    reloadCanvas();//loads canvas items
    //reloads canvas every 10 secs.
    setInterval(function() {
      reloadCanvas();
    }, 10000);
  }

  function reloadCanvas() {
    ctx.clearRect(0,0,ctx.width,ctx.height);
    ctx.drawImage(bgImg,0,0);
    loadPins();
  }

  function getBackground(url) {
    bg = new Image();
    bg.src = url;
    return bg;
  }

  function loadPins() {

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        inputs = document.getElementById('addPlace').querySelectorAll('input');
        pins = [[inputs[0].value,inputs[1].value,inputs[2].value]];

        jsonString = this.responseText;
        places = JSON.parse(jsonString);
        pins = pins.concat(places);

        createPins();
      }
    };
    xhttp.open("GET", 'places.txt', true);
    xhttp.send();
    //TODO:
    //php ajax call to get the pins from a text file and convert it to json.

  }

  function savePins(){
    loadPins();
    text = JSON.stringify(pins)
    console.log(text);
    //TODO:
    //save this to the file! (full replace)
  }

  function createPins() {
    for (var i = 0; i < pins.length; i++) {
      createPin(pins[i][1],pins[i][2]);
    }
  }

  function createPin(mcX,mcY) {
    mapWidth=1952;
    mapHeight=1980;
    xRatio = mapWidth/ctx.width;
    yRatio = mapHeight/ctx.height;
    cvX = ctx.width/2 + mcX/xRatio;
    cvY = ctx.height/2 + mcY/yRatio;
    var pinImg = new Image();
    pinImg.src = "pin.png";
    ctx.drawImage(pinImg,cvX-(pinImg.width/2),cvY-pinImg.height);
  }
</script>
<?php

?>
