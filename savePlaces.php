<?php
  $file = fopen("places.txt", "w+") or die("Error! Go back and try again! :)");
  $txt = $_POST['json'];
  fwrite($file, $txt);
  fclose($file);
  header("Location: index.php");
?>
