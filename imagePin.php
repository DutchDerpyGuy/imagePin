<canvas id="image" width="800" height="600">You don't have Javascript enabled! <a href="http://www.enable-javascript.com/">Click here to find out how to turn it on!</a></canvas>
<script type="text/javascript">
  window.onload = init();
  function init() {
    img = "img.jpg"; // I don't have the rights to this image. it's just a placeholder!
    width = 800;
    height = 600;

    cv = document.getElementById('image');
    cv.innerHTML = "";
    ctx = cv.getContext('2d');
    ctx.width = width;
    ctx.height = height;
    ctx.drawImage(getBackground(img),0,0);

  }

  function getBackground(url) {
    bg = new Image();
    bg.src = url;
    return bg;
  }
</script>

<?php

?>
