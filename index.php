<?php

function showITunesData() {
  $json_data = file_get_contents("../output-itunes.json");

  $itunes_array = json_decode($json_data, true);

  foreach ($itunes_array as $k => $val) {
    echo "<b>Name: " . $k . "</b><br />";
    $keys = array_keys($val);
    foreach ($keys as $key) {
      echo "&nbsp;" . ucfirst($key) . " = " . $val[$key] . "<br />";
    }
  }
}


function showGPlayData() {
  $json_data = file_get_contents("../output-gplay.json");

  $itunes_array = json_decode($json_data, true);

  foreach ($itunes_array as $k => $val) {
    echo "<b>Name: " . $k . "</b><br />";
    $keys = array_keys($val);
    foreach ($keys as $key) {
      echo "&nbsp;" . ucfirst($key) . " = " . $val[$key] . "<br />";
    }
  }
}

?>

<!DOCTYPE html>
  <head>
    <title>ASO Viewer</title>
  </head>

  <body>
    <h1>ASO Viewer by Jared York</h1>

    <h3>iTunes Data</h3>
    <?php

    showITunesData();

    ?>
    <br /><br /><br />
    <h3>Google Play Data</h3>
    <?php

    showGPlayData();

    ?>
  </body>
</html>