<canvas id="image" width="800" height="600">You don't have Javascript enabled! <a href="http://www.enable-javascript.com/">Click here to find out how to turn it on!</a></canvas>
<script type="text/javascript">
  window.onload = init();
  function init() {
    img = "img.png"; //made by mineatlast
    width = 800;
    height = 600;

    cv = document.getElementById('image');
    cv.innerHTML = "";
    ctx = cv.getContext('2d');
    ctx.width = width;
    ctx.height = height;
    ctx.drawImage(getBackground(img),0,0);
    loadPins(ctx);

    cv.addEventListener('click', function(e) {
      creatPin(e);
    });
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

  function creatPin(event) {
    //TODO:
    //make pin
    console.log(event);
  }
</script>

<?php

?>
